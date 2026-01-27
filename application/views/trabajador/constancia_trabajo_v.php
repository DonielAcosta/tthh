<body class="hold-transition login-page">
<!-- mensaje de espera -->
<div id="msg_espera" class="row hide">
  <div class="col-xs-12 text-center">
    <div class="box box-danger box-solid">
      <div class="box-header">
        <h3 class="box-title">Procesando solicitud</h3>
      </div>
      <div class="box-body">
        Estamos generando tu Constancia de Trabajo, por favor espere...
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
    <div class="box box-info">
    <div class="box-header with-border">
    <!-- <div class="col text-center"> -->
      <label>Pulse el boton "Generar" para elaborar su Constancia</label>
    </div>
    </div>
    <?php 
	//echo $page_encabezado;
    ?>
         <?php
	    //var_dump($lista);
        if ($sinInfo==1){
	    foreach ($lista as $item):
	    //echo $item['id'] ."***<br>";
         ?>

              <div class="col text-center" style="border: 1px solid black;background: aliceblue;">
                   <?php echo $item['cargo'] ?><br><br>
                   <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="ver(<?php echo $item['id'] ?>)">
                   <i class="fa fa-fw fa-file-pdf-o"></i> Generar</button><br><br>
              </div><br>
         <?php 
            endforeach;
         
         } else{
             echo "Estimado Usuario, no podemos generar su constancia, por favor ingrese a Solicitudes varias y realice el requerimiento colocando en 
                el campo asunto: 'Constancia de Trabajo inactiva'.<br><br>";
         }
         ?>
         <button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="window.history.back();">Volver</button>   
  </div>
</div>
<script type="text/javascript">
// ver
function ver(id) {
//	alert(id);
  $.ajax({
    dataType: 'native',
    url: '<?php echo base_url("Trabajador_c/constancia_trabajo2");?>',
    data: { id: id } ,
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
      link.download="Constancia de Trabajo.pdf";
      document.body.appendChild(link);
      link.click();

    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert(errorThrown);
    }
  })  
}

</script>
