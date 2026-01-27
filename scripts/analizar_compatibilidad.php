<?php
/**
 * Script para analizar compatibilidad con PHP 8.3
 * 
 * Este script busca:
 * - Modelos que necesitan #[\AllowDynamicProperties]
 * - Drivers de sesión que necesitan tipos de retorno
 * - Consultas SQL potencialmente inseguras
 * 
 * Uso: php scripts/analizar_compatibilidad.php
 */

$basePath = dirname(__DIR__);
$issues = [
    'models' => [],
    'session_drivers' => [],
    'sql_queries' => [],
    'libraries' => []
];

echo "=== Análisis de Compatibilidad PHP 8.3 ===\n\n";

// 1. Buscar modelos
echo "1. Analizando modelos...\n";
$models = glob($basePath . '/application/models/*_m.php');
foreach ($models as $model) {
    $content = file_get_contents($model);
    $className = basename($model, '.php');
    
    // Verificar si ya tiene el atributo
    if (strpos($content, '#[\AllowDynamicProperties]') === false) {
        // Verificar si crea propiedades dinámicamente
        if (preg_match('/\$this->[a-zA-Z_]+\s*=/', $content)) {
            $issues['models'][] = [
                'file' => $model,
                'class' => $className,
                'line' => $this->getClassLine($content)
            ];
        }
    }
}

echo "   Encontrados " . count($issues['models']) . " modelos que necesitan #[\AllowDynamicProperties]\n";

// 2. Buscar drivers de sesión
echo "\n2. Analizando drivers de sesión...\n";
$sessionDrivers = glob($basePath . '/system/libraries/Session/drivers/*.php');
foreach ($sessionDrivers as $driver) {
    $content = file_get_contents($driver);
    $className = basename($driver, '.php');
    
    $methods = ['open', 'close', 'read', 'write', 'destroy', 'gc'];
    $needsFix = false;
    $missingMethods = [];
    
    foreach ($methods as $method) {
        if (preg_match("/public function $method\(/", $content)) {
            // Verificar si tiene tipo de retorno
            if (!preg_match("/#\\\\\[ReturnTypeWillChange\]/", $content) || 
                !preg_match("/public function $method\([^)]*\):\s*(bool|string\|false|int\|false)/", $content)) {
                $needsFix = true;
                $missingMethods[] = $method;
            }
        }
    }
    
    if ($needsFix) {
        $issues['session_drivers'][] = [
            'file' => $driver,
            'class' => $className,
            'methods' => $missingMethods
        ];
    }
}

echo "   Encontrados " . count($issues['session_drivers']) . " drivers que necesitan corrección\n";

// 3. Buscar consultas SQL inseguras
echo "\n3. Analizando consultas SQL...\n";
$controllers = glob($basePath . '/application/controllers/*.php');
foreach ($controllers as $controller) {
    $content = file_get_contents($controller);
    
    // Buscar patrones inseguros
    if (preg_match_all('/->query\(["\']([^"\']*\$[^"\']*)["\']/', $content, $matches)) {
        foreach ($matches[0] as $index => $match) {
            $line = substr_count(substr($content, 0, strpos($content, $match)), "\n") + 1;
            $issues['sql_queries'][] = [
                'file' => $controller,
                'line' => $line,
                'query' => trim($matches[1][$index])
            ];
        }
    }
}

echo "   Encontradas " . count($issues['sql_queries']) . " consultas potencialmente inseguras\n";

// 4. Buscar librerías personalizadas
echo "\n4. Analizando librerías personalizadas...\n";
$libraries = glob($basePath . '/application/libraries/MY_*.php');
foreach ($libraries as $library) {
    $content = file_get_contents($library);
    $className = basename($library, '.php');
    
    if (strpos($content, '#[\AllowDynamicProperties]') === false) {
        if (preg_match('/\$this->[a-zA-Z_]+\s*=/', $content)) {
            $issues['libraries'][] = [
                'file' => $library,
                'class' => $className
            ];
        }
    }
}

echo "   Encontradas " . count($issues['libraries']) . " librerías que necesitan #[\AllowDynamicProperties]\n";

// Mostrar resumen
echo "\n=== RESUMEN ===\n\n";

if (count($issues['models']) > 0) {
    echo "MODELOS QUE NECESITAN #[\AllowDynamicProperties]:\n";
    foreach ($issues['models'] as $model) {
        echo "  - {$model['file']} (clase: {$model['class']})\n";
    }
    echo "\n";
}

if (count($issues['session_drivers']) > 0) {
    echo "DRIVERS DE SESIÓN QUE NECESITAN CORRECCIÓN:\n";
    foreach ($issues['session_drivers'] as $driver) {
        echo "  - {$driver['file']} (clase: {$driver['class']})\n";
        echo "    Métodos: " . implode(', ', $driver['methods']) . "\n";
    }
    echo "\n";
}

if (count($issues['sql_queries']) > 0) {
    echo "CONSULTAS SQL POTENCIALMENTE INSEGURAS:\n";
    foreach (array_slice($issues['sql_queries'], 0, 10) as $query) {
        echo "  - {$query['file']}:{$query['line']}\n";
        echo "    " . substr($query['query'], 0, 80) . "...\n";
    }
    if (count($issues['sql_queries']) > 10) {
        echo "  ... y " . (count($issues['sql_queries']) - 10) . " más\n";
    }
    echo "\n";
}

if (count($issues['libraries']) > 0) {
    echo "LIBRERÍAS QUE NECESITAN #[\AllowDynamicProperties]:\n";
    foreach ($issues['libraries'] as $library) {
        echo "  - {$library['file']} (clase: {$library['class']})\n";
    }
    echo "\n";
}

// Función auxiliar para obtener línea de clase
function getClassLine($content) {
    if (preg_match('/class\s+\w+/', $content, $matches, PREG_OFFSET_CAPTURE)) {
        return substr_count(substr($content, 0, $matches[0][1]), "\n") + 1;
    }
    return 0;
}

echo "=== Análisis completado ===\n";
