<body class="hold-transition login-page">
<div id="divCapture" name="divCapture" class="row">
		<div class="form-group col-md-6">
			<label class="control-label"><span class='label-red'>*</span> Asunto</label>
			<input id='asuntoSol' name='asuntoSol' class='form-control input-sm' type='text' value='<?php echo $asuntoSol;?>'>
		</div>
		<div class="form-group col-md-6">
			<label class="control-label">Dirigido a:</label>			
			<?php echo $cmb_destino;?>
		</div>
		<div class="form-group col-md-12">
			<label class="control-label"><span class='label-red'>*</span> Descripción</label>
			<textarea id='descSol' name='descSol' class='form-control input-sm' rows="8"><?php echo $descSol;?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label class="control-label"><span class='label-red'>*</span> Respuesta</label>
			<textarea id='obsArc_EdoSolicitud' name='obsArc_EdoSolicitud' class='form-control input-sm' rows="8"><?php echo $obsArc_EdoSolicitud;?></textarea>
		</div>
		<div class="form-group col-md-6">
			<label class="control-label">Correo alternativo (Para recibir notificación sobre su solicitud)</label>
			<input id='emailaltsolicitud' name='emailaltsolicitud' class='form-control input-sm' type='text' value='<?php echo $emailaltsolicitud;?>'>
		</div>		
		<div class="form-group col-md-6">
			<label class="control-label">Estado de la solicitud:</label>			
			<?php echo $cmb_edoSol;?>
		</div>
		<?php 
		if ($opt=='ing') {
		?>		
		<form id="formCapture" name="formCapture">
			<div id="divCapture" name="divCapture" class="form-group col-lg-12">
			<br>
			Por favor pulse en examinar para seleccionar la imagen que desea subir.<br><br>
				<label class="col-lg-3 control-label">Adjuntar archivo</label>
				<div class="col-lg-3">
				  	<div class="form-group">
						<center><input type="file"  id="fileToUpload"></center>
				  	</div>
				</div>
			</div>
		</form>
		<?php
		}
// 		echo "[$adjsolicitud][$opt]";
		if ($adjsolicitud!="") {
		?>
		    <div class="form-group col-md-12">
    		    <a href="<?php echo base_url('public/adjuntos/').$adjsolicitud;?>" target="_blank">
    		    	<img src="<?php echo base_url('img/imgAdjunto.jpg');?>" class="iconoDesktop"><br>
    		    </a>
		    </div>
		<?php
		  }
		 ?>
		<div class="form-group col-md-12">
			<button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="upload_image();">
			Enviar</button>
			<a href="<?php echo base_url('Servicios_c/solicitud');?>">
				<button type="button" id="btnVer" class="btn btn-primary btn-lg"></body>Volver</button> 
			</a> 
		</div>
</div>
<div class="upload-msg"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
<input type='hidden' id='optadjsolicitud' name='optadjsolicitud' value='<?php $adjsolicitud;?>' readonly/>
<input type='hidden' id='opt' name='opt' value='<?php echo $opt;?>' readonly/>
<input type='hidden' id='idsolicitud' name='idsolicitud' value='<?php echo $idsolicitud;?>' readonly/>
<script>
	function upload_image(){//Funcion encargada de enviar el archivo via AJAX
				jQuery(".upload-msg").text('Por favor espere...');

				var opt = document.getElementById("opt").value;
				var idsolicitud = document.getElementById("idsolicitud").value;
//  				alert(opt +' id = '+idsolicitud);
				if(opt=='ing'){
    				var inputFileImage = document.getElementById("fileToUpload");
    				var file = inputFileImage.files[0];
    				destino = '<?php echo base_url("ingresar_solicitud");?>';
				}else{
					destino = '<?php echo base_url("actualizar_solicitud");?>';
					var file = '';
				}
 				destino = '<?php echo base_url("Servicios_c/ingresar_solicitud");?>';
//  				alert(destino);
// 				var inputFileImage = document.getElementById("fileToUpload");
// 				var file = inputFileImage.files[0];

				
// 				var idsolicitud = document.getElementById("idsolicitud").value;
				var asuntoSol = document.getElementById("asuntoSol").value;
				var destSol = document.getElementById("destSol").value;
				var descSol = document.getElementById("descSol").value;
				var edoSol = document.getElementById("idedosolicitud").value;
				var emailaltsolicitud = document.getElementById("emailaltsolicitud").value;
				var obsArc_EdoSolicitud = document.getElementById("obsArc_EdoSolicitud").value;

				nameTmp = '';
				datos = nameTmp +':'+asuntoSol +':'+destSol +':'+descSol +':'+edoSol;
				var data = new FormData();
				data.append('idsolicitud',idsolicitud);
				data.append('file',file);
				data.append('asuntoSol',asuntoSol);
				data.append('destSol',destSol);
				data.append('descSol',descSol);
				data.append('edoSol',edoSol);		
				data.append('emailaltsolicitud',emailaltsolicitud);		
				data.append('obsArc_EdoSolicitud',obsArc_EdoSolicitud);		
				jQuery.ajax({
					url: destino,
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						if(data.success){
							//alert('en if success');
							mensaje = '<div class="alert alert-success alert-dismissible" role="alert">'+
						  '<strong>Resultado!</strong><p>'+data.message+'</p><br>'+
						  '<a href="solicitud"><button id="buyButton" type="button" class="btn btn-primary">Continuar</button></a>'+
						  '</div>';					
 							jQuery(".upload-msg").html(mensaje);
//							jQuery(".upload-msg").html( mensaje);
							jQuery("#divCapture").css("display", "none");
						
	//						window.setTimeout(function() {
	//						jQuery(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
	//						jQuery(this).remove();
	//						});	}, 5000);
						}else{
							//alert('en else success');
							//mensaje = 'Error';
							mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">'+
						  '<strong>Resultado!</strong><p>'+data.message+'</p></div>';								
							jQuery(".upload-msg").html(mensaje);
						}


						/*
					mensaje = '<div class="alert alert-success alert-dismissible" role="alert">'+
					  '<strong>Resultado!</strong><p>Su solicitud se ha ingresado correctamente, responderemos por este medio a la brevedad posible.</p>'+
					  '<a href="'+'solicitud"><button id="buyButton" type="button" class="btn btn-primary">Continuar</button></a>'+
					  '</div>';					
						jQuery(".upload-msg").html(mensaje);
						*/
// 						jQuery("#divCapture").css("display", "none");
//						window.setTimeout(function() {
//						jQuery(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
//						jQuery(this).remove();
//						});	}, 5000);
					}
				});				
			}
</script>