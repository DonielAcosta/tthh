<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Assets Helper
 * 
 * Helper para generar rutas a recursos estáticos (CSS, JS, imágenes)
 * 
 * @package App\Helpers
 * @author Ing. Doniel Acosta
 */

if (!function_exists('asset_url')) {
    /**
     * Genera la URL completa de un asset
     * 
     * @param string $path Ruta relativa del asset desde assets/
     * @return string URL completa del asset
     */
    function asset_url($path = '')
    {
        $CI =& get_instance();
        return rtrim($CI->config->item('base_url'), '/') . '/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('css_url')) {
    /**
     * Genera la URL de un archivo CSS
     * 
     * @param string $file Nombre del archivo CSS
     * @return string URL completa del CSS
     */
    function css_url($file)
    {
        return asset_url('css/' . ltrim($file, '/'));
    }
}

if (!function_exists('js_url')) {
    /**
     * Genera la URL de un archivo JavaScript
     * 
     * @param string $file Nombre del archivo JS
     * @return string URL completa del JS
     */
    function js_url($file)
    {
        return asset_url('js/' . ltrim($file, '/'));
    }
}

if (!function_exists('img_url')) {
    /**
     * Genera la URL de una imagen
     * 
     * @param string $file Nombre del archivo de imagen
     * @return string URL completa de la imagen
     */
    function img_url($file)
    {
        return asset_url('img/' . ltrim($file, '/'));
    }
}

if (!function_exists('asset_path')) {
    /**
     * Obtiene la ruta física de un asset
     * 
     * @param string $path Ruta relativa del asset desde assets/
     * @return string Ruta física completa del asset
     */
    function asset_path($path = '')
    {
        return FCPATH . 'assets/' . ltrim($path, '/');
    }
}
