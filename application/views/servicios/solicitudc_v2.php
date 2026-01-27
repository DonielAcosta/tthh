<body class="hold-transition login-page">
<div id="divCapture" name="divCapture" class="row">
		<div class="form-group col-md-6">
			<label class="control-label"><span class='label-red'>*</span> Asunto</label>
			<input id='asuntoSol' name='asuntoSol' class='form-control input-sm' type='text' value='<?php echo $asuntoSol;?>' readonly disabled>
		</div>
		<div class="form-group col-md-6">
			<label class="control-label">Dirigido a:</label>			
			<?php echo $cmb_destino;?>
		</div>
		<div class="form-group col-md-12">
			<label class="control-label"><span class='label-red'>*</span> Descripción</label>
			<textarea id='descSol' name='descSol' class='form-control input-sm' rows="8" readonly disabled><?php echo $descSol;?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label class="control-label"><span class='label-red'>*</span> Respuesta</label>
			<textarea id='obsArc_EdoSolicitud' name='obsArc_EdoSolicitud' class='form-control input-sm' rows="8" readonly disabled><?php echo $obsArc_EdoSolicitud;?></textarea>
		</div>
		<div class="form-group col-md-6">
			<label class="control-label">Correo alternativo (Para recibir notificación sobre su solicitud)</label>
			<input id='emailaltsolicitud' name='emailaltsolicitud' class='form-control input-sm' type='text' value='<?php echo $emailaltsolicitud;?>' readonly disabled>
		</div>		
		<div class="form-group col-md-6">
			<label class="control-label">Estado de la solicitud:</label>			
			<?php echo $cmb_edoSol;?>
		</div>
		<?php
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
			<a href="<?php echo base_url('Servicios_c/solicitud');?>">
				<button type="button" id="btnVer" class="btn btn-primary btn-lg"></body>Volver</button> 
			</a> 
		</div>
</div>
<div class="upload-msg"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
<input type='hidden' id='optadjsolicitud' name='optadjsolicitud' value='<?php $adjsolicitud;?>' readonly/>
<input type='hidden' id='opt' name='opt' value='<?php echo $opt;?>' readonly/>
<input type='hidden' id='idsolicitud' name='idsolicitud' value='<?php echo $idsolicitud;?>' readonly/>