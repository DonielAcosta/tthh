<?php echo br(0);?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Modifica tu Correo Electrónico</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Correo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="correo" placeholder="Nuevo Correo Electrónico">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      
      <div class="box-footer">
        <button type="button" id="cambiar" class="btn btn-info pull-right">Cambiar</button>
      </div>
      <!-- /.box-footer -->

      <!-- mensaje de espera -->
    <div id="msg_espera" class="row hide">
      <div class="col-xs-12 text-center">
        <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">Procesando solicitud</h3>
          </div>
          <div class="box-body">
            Estamos procesando tu solicitud de cambio de correo...
          </div>
          <!-- /.box-body -->
          <!-- Loading (remove the following to stop the loading)-->
          <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
          <!-- end loading -->
        </div>
      </div>
    </div>

    </div>
    <!-- /.box -->
  </div>
</div>

<script type="text/javascript">
// valida los campos
function valida_campos() 
{
  // valido que los campos tengan datos
  if (is_empty($("#correo").val())) {
      alert('Error: El campo Correo Electrónico debe tener datos.');
      return false;
  }
  return true;
}

//
$(document).ready(function () {
  // simulo un submit
  $('#cambiar').click(function(event) {
    event.preventDefault();
    if (valida_campos()) {
       $.ajax({
         url    : '<?php echo base_url("Usuario_c/cambia_correo");?>',
         data   : { 'correo' : $("#correo").val() }, 
         type   : 'post',
         dataType : 'json',
         beforeSend : function(xhr) {
            $('#msg_espera').removeClass('hide');
            $('#msg_espera').addClass('show');
         },
         success  : function(resp) {
            $('#msg_espera').removeClass('show');
            $('#msg_espera').addClass('hide');
            alert(resp.mensaje);
            if (resp.success) 
              $(location).attr("href","<?php echo base_url('Usuario_c/logout');?>");
         }
       })
    }
  });
});
</script>
