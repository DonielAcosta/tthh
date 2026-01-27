<body class="hold-transition login-page">
<!-- mensaje de espera -->
<div id="msg_espera" class="row hide">
  <div class="col-xs-12 text-center">
    <div class="box box-danger box-solid">
      <div class="box-header">
        <h3 class="box-title">Procesando solicitud</h3>
      </div>
      <div class="box-body">
        Estamos buscando los Comprobantes de Pago para el año y mes seleccionado, por favor espere...
      </div>
      <!-- /.box-body -->
      <!-- Loading (remove the following to stop the loading)-->
      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
      <!-- end loading -->
    </div>
  </div>
</div> <!-- mensaje de espera -->
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
    <!-- anio -->
    <div class="box-header with-border">
    <!-- <div class="col text-center"> -->
         <?php 
//          echo '---'.$this->session->persona_id;
//          if($this->session->persona_id==18474 and $pathRecibo!=''){
//              echo "Constancias Disponibles:<br>";
//              echo "<br><a href='http://$pathRecibo' target='_blank'>".$etiRecibo."</a><br><br>";
//              echo "<a href='".base_url('Trabajador_c/visualizarConprobante')."' target='_blank'>".$etiRecibo." Seguro </a><br><br>";
//          }
//         	var_dump($lista);
//          	echo $lista;
//         	foreach ($lista as $item):
         ?>    
      <label>Seleccione el Cargo</label>
    </div>
    <div class="form-group">
         <?php 
//         	var_dump($lista);
         	echo $lista;
//         	foreach ($lista as $item):
         ?>
           		<!--<div class="col text-center">
            		<?php echo $item['cargo'] ?><br>
            		<button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="ver(<?php echo $item['id_trabajador'] ?>)">
            		<i class="fa fa-fw fa-file-pdf-o"></i> Generar</button> 
            	</div>
         --><?php 
//         	endforeach; 
         ?>
    </div>
    <!-- anio -->
    <div class="col text-center">
      <label>Seleccione el año</label>
    </div>
    <div class="form-group">
      <?php echo $ddl_anios;?>
    </div>
    <!-- mes -->
    <div class="col text-center">
      <label>Seleccione el mes</label>
    </div>
    <div class="form-group">
      <?php echo $ddl_mes;?>
    </div>
    <div class="form-group">
<!--      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="buscarComprobante()"><i class="fa fa-fw fa-file-pdf-o"></i> Buscar Comprobante</button>-->
<!--      <button type="button" id="btnVer" class="btn btn-primary" onclick="buscarComprobante()"><i class="fa fa-fw fa-file-pdf-o"></i> Buscar Comprobante</button> -->
      <button type="button" id="btnVer" class="btn btn-primary" onclick="buscarComprobanteV2()"><i class="fa fa-fw fa-file-pdf-o"></i> Buscar Comprobante</button>
    </div>
    <!-- nomina -->
    <div class="col text-center">
      <label>Seleccione el comprobante a desacargar</label>
    </div>
    <div class="form-group" id="resBusqueda">
    </div>
    <div class="form-group">
      <?php echo $ddl_nomina;?>
    </div>
    <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="window.history.back();">Volver</button>
<!--    <div class="col text-center">-->
<!--      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="ver()"><i class="fa fa-fw fa-file-pdf-o"></i> Ver Comprobante</button>-->
<!--    </div>-->
  </div>
    </div>
    <!-- /.box -->
  </div>
</div>

<script type="text/javascript">
// ver
function ver() {
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/comprobante_pago");?>',
    data: {'nomina_id':$('#nomina').val()},
    xhrFields: {
      responseType: 'blob'
    },
    beforeSend : function(xhr) {
      $('#msg_espera').removeClass('hide');
      $('#msg_espera').addClass('show');
    },
    success: function(blob) {
      var link=document.createElement('a');
        
      $('#msg_espera').removeClass('show');
      $('#msg_espera').addClass('hide');
      link.href=window.URL.createObjectURL(blob);
      link.download="Comprobante de Pago.pdf";
      document.body.appendChild(link);
      link.click();
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
}
function generar(idNomina) {
	cargoNomina = $('#cargoNomina').val();
//	alert(idNomina +' - '+cargoNomina);
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/generar_comprobante_pago");?>',
    data: {'nomina_id':idNomina,'idT':cargoNomina},
    xhrFields: {
      responseType: 'blob'
    },
    beforeSend : function(xhr) {
      $('#msg_espera').removeClass('hide');
      $('#msg_espera').addClass('show');
    },
    success: function(blob) {
      var link=document.createElement('a');
        
      $('#msg_espera').removeClass('show');
      $('#msg_espera').addClass('hide');
      link.href=window.URL.createObjectURL(blob);
      link.download="Comprobante de Pago.pdf";
      document.body.appendChild(link);
      link.click();
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
}
function buscarComprobante() {
	$('#resBusqueda').html('');
	cargoNomina = $('#cargoNomina').val();
	anio = $('#anioNomina').val();
	mes = $('#mesNomina').val();
//	alert(anio + ' - ' + mes);
	
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/comprobante_pago");?>',
    data: {'idT':cargoNomina,'anio':anio,'mes':mes},
    beforeSend : function(xhr) {
      $('#msg_espera').removeClass('hide');
      $('#msg_espera').addClass('show');
    },
    success: function(blob) {
        $('#msg_espera').removeClass('show');
        $('#msg_espera').addClass('hide');        
    	$('#resBusqueda').html(blob);
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
	  
}
function buscarComprobanteV2() { // no genera el pdf sino que lo busca en el directorio
	$('#resBusqueda').html('');
	cargoNomina = $('#cargoNomina').val();
	anio = $('#anioNomina').val();
	mes = $('#mesNomina').val();
//	alert(anio + ' - ' + mes);
	
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/visualizarComprobante");?>',
    data: {'idT':cargoNomina,'anio':anio,'mes':mes},
    beforeSend : function(xhr) {
      $('#msg_espera').removeClass('hide');
      $('#msg_espera').addClass('show');
    },
    success: function(blob) {
        $('#msg_espera').removeClass('show');
        $('#msg_espera').addClass('hide');        
    	$('#resBusqueda').html(blob);
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
	  
}
function limpiarComprobante() {
	$('#resBusqueda').html('');
}

</script>
