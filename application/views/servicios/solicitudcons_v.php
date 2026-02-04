<?php
// Vista usa dhtmlxGrid (grid_gpl), no phpGrid_Lite. conf.php de phpGrid_Lite no existe en el proyecto.
?>

<!-- DHTMLX Suite (Grid) - CDN porque vendor/tecnickcom/grid_gpl no existe en el proyecto -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dhx-suite@6.5.1/codebase/suite.min.css">
<script src="https://cdn.jsdelivr.net/npm/dhx-suite@6.5.1/codebase/suite.min.js"></script>
<style>
.btnGrid{
    /*background-color:blue;*/
    border:0px solid;
    margin:5px 2px;
    display: inline-flex;
}
.imgGrid{
    width:20px;
}
/*
.dhx_header-row:first-child .dhx_grid-footer-cell, .dhx_header-row:first-child .dhx_grid-header-cell {
    border-top: none;
    text-align: center;
}
*/
section {
    max-width: 1250px;
}
</style>		
<body class="hold-transition login-page">
<div class="row" style="width:1250px;">
		<header class="dhx_sample-header">
    		<div class="form-group col-md-12">
    			<a href="<?php echo base_url('Servicios_c/solicitud_ing');?>">
    				<button type="button" id="btnVer" class="btn btn-primary btn-lg">Nueva Solicitud</button>
    			</a>
    			<button type="button" id="btnVer" class="btn btn-primary btn-lg" onclick="window.history.back();">Volver</button>
    		</div>
    		<form id="form" action="consultar_solicitudes_param" method="post" target="_self">
    		<input id="valId" name="valId" type="hidden" readonly>
    		<input id="valOp" name="valOp" type="hidden" readonly>
    		</form>
		</header>
		<div id='solicitudes-msg' name='solicitudes-msg'>
		</div>
		<section class="dhx_sample-container">
			<div class="dhx_sample-container__widget" id="grid"></div>
		</section>
		<script>
		function consultar(opcion,id){
// 	 		alert(opcion+'**'+id);

			$("#valOp").val(opcion);
			$("#valId").val(id);
			$( "#form" ).submit();
	 		return;
			  $.ajax({
			    dataType: 'native',
			    url: '<?php echo base_url("Servicios_c/consultar_solicitudes_id");?>',
			    data: { opr:opcion,id: id } ,
			    dataType : 'json',
			    success: function(blob) {
					alert("regrese: "+ blob);
			    },
			    error: function( jqXHR, textStatus, errorThrown ) {
			      alert(errorThrown);
			    }
			  })  
			}
		ver(16);
		function ver(id) {
		  $.ajax({
		    dataType: 'native',
		    url: '<?php echo base_url("Servicios_c/consultar_solicitudes");?>',
		    data: { id: id } ,
		    dataType : 'json',
		    success: function(blob) {
			    if (blob == null) {
			    	jQuery("#solicitudes-msg").text('No hay solicitudes realizadas.');
			    	return;
			    }
			    if (typeof dhx === 'undefined') {
			    	jQuery("#solicitudes-msg").html('<p class="text-danger">No se pudo cargar la librería del grid. Compruebe la conexión.</p>');
			    	return;
			    }
				var datacollection = new dhx.DataCollection();
				datacollection.parse(blob);
				var grid = new dhx.Grid("grid", {
					columns: [					
						{ width: 120, id: "idsolicitud", header: [{text: "Opciones", align: "center"}],
							htmlEnable: true,
							template: function (text, row, col) {
					return	"<label onClick='consultar(1,"+text+")' class='btnGrid' ><img class='imgGrid' src='<?php echo base_url('img/consultar.gif');?>'></label>"+
							"<label class='btnGrid' ><img class='imgGrid' src='<?php echo base_url('img/vacio.png');?>'></label>"+
							"<label onClick='consultar(2,"+text+")' class='btnGrid' ><img class='imgGrid' src='<?php echo base_url('img/editar.png');?>'></label>"+
							"</div>";
							}
						},
						{ width: 120, id: "numcomunicacion", header: [{ text: "N°" }, { content: "inputFilter" }] },
						{ width: 120, id: "cedula", header: [{ text: "Cédula" }, { content: "inputFilter" }] },
						{ width: 210, id: "array_to_string", header: [{ text: "Código" }, { content: "inputFilter" }] },
						{ width: 250, id: "nom_completo", header: [{ text: "Nombre y Apellido", align: "center" }, { content: "inputFilter"}] },
						{ width: 250, id: "asuntosolicitud", header: [{ text: "Asunto", align: "center" }, { content: "inputFilter"}] },
						{ width: 180, id: "nomdestsolicitud", header: [{ text: "Destinatario", align: "center" }, { content: "selectFilter"}] },
						{ width: 140, id: "fecregsolicitud", header: [{ text: "Fecha registro", align: "center",type:"date" }, { content: "inputFilter" }] },
						{ width: 120, id: "nomedosolicitud", header: [{ text: "Estado", align: "center" }, { content: "selectFilter" }] }
					],
					autoWidth: true, 
				    type: "date", dateFormat: "%d/%m/%Y",
					data: blob
				});
		    },
		    error: function( jqXHR, textStatus, errorThrown ) {
		      alert(errorThrown);
		    }
		  })  
		}
		</script>
</div>