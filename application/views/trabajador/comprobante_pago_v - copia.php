<body class="hold-transition login-page">
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
    <!-- anio -->
    <div class="col text-center">
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
      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="buscarComprobante()"><i class="fa fa-fw fa-file-pdf-o"></i> Buscar Comprobante</button>
    </div>
    <!-- nomina -->
    <div class="col text-center">
      <label>Seleccione el comprobante a desacargar</label>
    </div>
    <div class="form-group" id="comboPagos">
      aca estoy
    </div>
    <div class="form-group">
      <?php echo $ddl_nomina;?>
    </div>
    <div class="col text-center">
      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="ver()"><i class="fa fa-fw fa-file-pdf-o"></i> Ver Comprobante</button>
    </div>
  </div>
    </div>
    <!-- /.box -->
  </div>
</div>
<div class="login-box">
  <div class="login-box-body">
    <!-- anio -->
    <div class="col text-center">
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
      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="buscarComprobante()"><i class="fa fa-fw fa-file-pdf-o"></i> Buscar Comprobante</button>
    </div>
    <!-- nomina -->
    <div class="col text-center">
      <label>Seleccione el comprobante a desacargar</label>
    </div>
    <div class="form-group" id="comboPagos">
      aca estoy
    </div>
    <div class="form-group">
      <?php echo $ddl_nomina;?>
    </div>
    <div class="col text-center">
      <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="ver()"><i class="fa fa-fw fa-file-pdf-o"></i> Ver Comprobante</button>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- mensaje de espera -->
<div id="msg_espera" class="row hide">
  <div class="col-xs-12 text-center">
    <div class="box box-danger box-solid">
      <div class="box-header">
        <h3 class="box-title">Procesando solicitud</h3>
      </div>
      <div class="box-body">
        Estamos generando tu Comprobante de Pago...
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
	cargoNomina = $('#cargoNomina').val();
	anio = $('#anioNomina').val();
	mes = $('#mesNomina').val();
//	alert(anio + ' - ' + mes);
	
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/comprobante_pago");?>',
    data: {'idT':cargoNomina,'anio':anio,'mes':mes},
//    xhrFields: {
//      responseType: 'blob'
//    },
    beforeSend : function(xhr) {
      $('#msg_espera').removeClass('hide');
      $('#msg_espera').addClass('show');
    },
    success: function(blob) {
    	$('#comboPagos').html(blob);
//      var link=document.createElement('a');
        
//      $('#msg_espera').removeClass('show');
//      $('#msg_espera').addClass('hide');
//      link.href=window.URL.createObjectURL(blob);
//      link.download="Comprobante de Pago.pdf";
//      document.body.appendChild(link);
//      link.click();
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
	  
}

</script>
