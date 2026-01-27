<?php echo br(0);?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Modifica tu Clave de Usuario</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Actual</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="clavea" placeholder="Clave Actual">
          </div>
        </div>
        <?php echo br(2);?>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Nueva</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="claven1" placeholder="Clave Nueva">
          </div>
        </div>
        <?php echo br(2);?>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Repite</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="claven2" placeholder="Repite Clave Nueva">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      
      <div class="box-footer">
        <button type="button" id="cambiar" class="btn btn-info pull-right">Cambiar</button>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
</div>

<script type="text/javascript">
// valida los campos
function valida_campos() 
{
  // valido que los campos tengan datos
  if (is_empty($("#clavea").val())) {
      alert('Error: El campo Clave Actual debe tener datos.');
      return false;
  }

  if ($("#claven1").val().length < 5 || $("#claven1").val().length > 10) {
      alert('Error: El campo Nueva Clave debe tener al menos 5 caracteres y máximo 10.');
      return false;
  }

  if ($("#claven2").val() != $("#claven1").val()) {
      alert('Error: Las claves no coinciden.');
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
         url    : '<?php echo base_url("Usuario_c/cambia_clave");?>',
         data   : { 'clavea' : $("#clavea").val(),
                    'claven' : $("#claven1").val()
                  }, 
         type   : 'post',
         dataType : 'json',
         success  : function(resp) {
            alert(resp.mensaje);
            if (resp.success) 
              $(location).attr("href","<?php echo base_url('Home_c');?>");
         }
       })
    }
  });
});
</script>

