<?php
	include_once 'recursos/session.php';
	include_once 'Connections/database.php';
	include_once 'recursos/utilities.php';
	include_once 'recursos/datauser.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SISTEMA DE EXPEDIENTE CLÍNICO ELECTRÓNICO">
    <meta name="author" content="ING EMMANUEL ANZURES BAUTISTA">
    
    <title>SISTEMA - CATÁLOGO LABORATORIO</title>
    
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    
    <!-- Mainly scripts -->
	<script src="js/jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="DataTables-1.10.13/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTables-1.10.13/extensions/Select/js/dataTables.select.min.js"></script>
    <script src="bootstrap-validator/js/validator.js"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.media.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.printElement.min.js" type="text/javascript"></script>
    <script src="funciones/js/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="jQuery-TE_v.1.4.0/uncompressed/jquery-te-1.4.0.js" charset="utf-8"></script>
    <script src='tinymce/tinymce.min.js'></script>
    <script src='c3/c3.min.js'></script>
    <script src='c3/d3/d3.min.js'></script>
    <!-- Input Mask-->
    <script src="jasny-bootstrap/js/jasny-bootstrap.min.js"></script> 
    <!-- Mis funciones -->
    <script src="funciones/js/inicio.js"></script>
    <script src="funciones/js/caracteres.js"></script>
    <script src="funciones/js/calcula_edad.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    <script src="funciones/js/bs-modal-fullscreen.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="DataTables-1.10.13/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Scroller/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="DataTables-1.10.13/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="chosen/chosen-bootstrap.css">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" rel="stylesheet">
    <link href="c3/c3.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php';?>
<!-- Contenido -->
	<div class="hidden" id="dpa_imprimir"></div><div class="hidden" id="dpa_imprimir1"></div>
	
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="dataTablePrincipal" class="table-hover table-bordered table-condensed" role="grid"> 
<thead id="cabecera_tBusquedaPrincipal">
  <tr role="row" class="bg-primary">
    <th id="clickme" style="vertical-align:middle;">#</th>
    <th style="vertical-align:middle; white-space:nowrap;"><button type='button' class='btn btn-success btn-xs' id='btnAddEstudio' onClick='nuevoEstudio()' title='Agregar un nuevo estudio'><i class='fa fa-plus' aria-hidden='true'></i> ESTUDIO</button></th>
    <th style="vertical-align:middle;">ÁREA</th>
	<th style="vertical-align:middle;" nowrap>DÍAS</th>
    <th style="vertical-align:middle;">PRECIO</th>
    <th style="vertical-align:middle;">PRECIO URGENCIA</th>
    <th style="vertical-align:middle;">PRECIO MEMBRESÍA</th>
    <th style="vertical-align:middle;">PRECIO MEMBRESÍA URGENCIA</th>

    <th style="vertical-align:middle;" nowrap>ACTUALIZACIÓN</th>
  </tr>
</thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody> 
	<tfoot>
        <tr class="bg-primary">
            <th></th>
            <th><input type="text" class="form-control input-sm" placeholder="Estudio" style="width:98%;"/></th>
            <th><input type="text" class="form-control input-sm" placeholder="Área" style="width:98%;"/></th>
            <th colspan="5" align="center" style="text-align: center;">
				<?php if($_SESSION['MM_UserGroup']==1){ ?>
					<button type="button" class="btn btn-sm btn-success" onClick="save_all();">GUARDAR TODO</button>
				<?php } ?>
			</th>
            <th></th>
        </tr>
    </tfoot>
</table>
	
</div>
	
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>LABORATORIO</li><li class="active"><strong>CATÁLOGO DE ESTUDIOS DE LABORATORIO</strong></li>');
	
	$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-161-$('#breadc').height();
	var oTableP = $('#dataTablePrincipal').DataTable({
		serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
		"aoColumns": [
			{"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true}, {"bVisible":true}, {"bVisible":true},
			{"bVisible":true },{ "bVisible": true }, {"bVisible":true}
		],
		"sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>', 
		deferRender: true, select: false, "processing": false, 
		"sAjaxSource": "laboratorio/estudios/datatable-serverside/estudios_l.php",
		"fnServerParams": function (aoData, fnCallback) { 
			var nombre = $('#top-search').val();
			var acceso = $('#acc_user').val(); var idU = $('#id_user').val();
			
			aoData.push( {"name": "nombre", "value": nombre } );
			aoData.push(  {"name": "accesoU", "value": acceso } );
			aoData.push(  {"name": "idU", "value": idU } );
		},
		"oLanguage": {
			"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", 
			"sInfo": "ESTUDIOS FILTRADOS: _END_",
			"sInfoEmpty": "NINGÚN ESTUDIO FILTRADO.", "sInfoFiltered": " TOTAL DE ESTUDIOS: _MAX_", "sSearch": "",
			"oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
		},"iDisplayLength": 200, paging: true,
	});
	
	$('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);
	
	//para los fintros individuales por campo de texto
	oTableP.columns().every( function () {
		var that = this;
 
		$( 'input', this.footer() ).on( 'keyup change', function () {
			if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
		} );
	} );
	//fin filtros individuales por campo de texto
	$('#top-search').keyup(function(e) {
        $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup();
    }).focus();
	$('.filtro1Principal').addClass('hidden');
		
});
	
function save_all(){
	$('.dias_i').each(function() {
		if(parseFloat($(this).val())){
			var datos = {val:$(this).val(), id_to:$(this).prop('lang'), id_su:$('#miSucursal').val(), id_u:$('#id_user').val()}
			$.post('laboratorio/files-serverside/guardar_dias_masivo.php',datos).done(function(data){ if (data==1){ } else{alert(data);} });
		}
	});
	
	$('.precio_p_i').each(function() {
		if(parseFloat($(this).val())){
			var datos = {val:$(this).val(), id_to:$(this).prop('lang'), id_su:$('#miSucursal').val(), id_u:$('#id_user').val()}
			$.post('laboratorio/files-serverside/guardar_precio_p_masivo.php',datos).done(function(data){ if (data==1){ } else{alert(data);} });
		}
	});
	
	$('.precio_p_u_i').each(function() {
		if(parseFloat($(this).val())){
			var datos = {val:$(this).val(), id_to:$(this).prop('lang'), id_su:$('#miSucursal').val(), id_u:$('#id_user').val()}
			$.post('laboratorio/files-serverside/guardar_precio_p_u_masivo.php',datos).done(function(data){ if (data==1){ } else{alert(data);} });
		}
	});
	
	$('.tabu_m_i').each(function() {
		if(parseFloat($(this).val())){
			var datos = {val:$(this).val(), id_to:$(this).prop('lang'), id_su:$('#miSucursal').val(), id_u:$('#id_user').val()}
			$.post('laboratorio/files-serverside/guardar_tabu_m_masivo.php',datos).done(function(data){ if (data==1){ } else{alert(data);} });
		}
	});
	
	$('.tabu_m_u_i').each(function() {
		if(parseFloat($(this).val())){
			var datos = {val:$(this).val(), id_to:$(this).prop('lang'), id_su:$('#miSucursal').val(), id_u:$('#id_user').val()}
			$.post('laboratorio/files-serverside/guardar_tabu_m_u_masivo.php',datos).done(function(data){ if (data==1){ } else{alert(data);} });
		}
	});
		
	swal({title:"ConfirmaciÓN",type:"success",text:"Los datos se han guardado correctamente.",timer:1800,showConfirmButton:false});
}
	
function subirMuestra(muestra, noAleatorio, idU){ //alert(muestra);
	var datosSMNB = {muestra:muestra, noAleatorio:noAleatorio, idU:idU}
	$.post('laboratorio/bases/files-serverside/guardarMuestraNB.php',datosSMNB).done(function(data){ 
		if (data==1){$('#clickmeMu').click();$('#s_add_muestra').val('');$("#s_add_muestra").trigger("chosen:updated");} else{alert(data);}
	});
}
function borrarMuestraNB(idMuestra){
	swal({
	  title: "ELIMINAR LA MUESTRA", text: "¿Estás seguro de eliminar la muestra de la base?", type: "",
	  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false
	},
	function(){
		var datosMuestraNB = {idMuestra:idMuestra}
		$.post('laboratorio/bases/files-serverside/eliminarMuestraNB.php',datosMuestraNB).done(function(data){ 
			if(data==1){ $('#clickmeMu').click();} else{alert(data);} 
		});
		swal({ title:"MUESTRA ELIMINADA",type: "",text:"La muestra se ha eliminado de la base.",timer:1800,showConfirmButton:false });
	});
}
function subirMetodo(metodo, noAleatorio, idU){
	var datosSMNB = {metodo:metodo, noAleatorio:noAleatorio, idU:idU}
	$.post('laboratorio/bases/files-serverside/guardarMetodoNB.php',datosSMNB).done(function(data){ 
		if (data==1){ $('#clickmeMet').click();$('#s_add_metodo').val('');$("#s_add_metodo").trigger("chosen:updated");} else{alert(data);} 
	});
}
function borrarMetodoNB(idMetodo){
	swal({
	  title: "ELIMINAR MÉTODO", text: "¿Estás seguro de eliminar el método de la base?", type: "",
	  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false
	},
	function(){
		var datosMetodoNB = {idMetodo:idMetodo}
		$.post('laboratorio/bases/files-serverside/eliminarMetodoNB.php',datosMetodoNB).done(function(data){ 
			if (data==1){ $('#clickmeMet').click(); } else{alert(data);} 
		});
		swal({ title:"MÉTODO ELIMINADO",type: "",text:"El método se ha eliminado de la base.",timer:1800,showConfirmButton:false });
	});
}
function agregar_ncom(nombre){
	var datos = {nombre:nombre, id_u:$('#id_user').val()}
	$.post('laboratorio/bases/files-serverside/agregarNcondicionMuestra.php',datos).done(function(data){
		if(data==1){
			$('#condicion_n_mue').load('laboratorio/bases/files-serverside/generaCondicionesMuestras.php',function(response,status,xhr){});
			$('#cancelCondicion').click();
			swal({title:"CONDICIÓN AGREGADA",type:"success",text:"La condición se dió de alta correctamente.",timer:1800,showConfirmButton:false});
		} else{alert(data);}
	});
}
function agregar_nmue(nombre, id_con){
	var datos = {nombre:nombre, id_con:id_con, id_u:$('#id_user').val()}
	$.post('laboratorio/bases/files-serverside/agregarNmuestra.php',datos).done(function(data){
		if(data==1){
			$('#s_add_muestra').load('laboratorio/bases/genera/muestras.php',function(response,status,xhr){if(status=="success"){
				$("#s_add_muestra").trigger("chosen:updated");
			}}); $('#cancelMuestra').click();
			swal({title:"MUESTRA AGREGADA",type:"success",text:"La muestra se dió de alta correctamente.",timer:1800,showConfirmButton:false});
		} else{alert(data);}
	});
}
function agregar_nmet(nombre){
	var datos = {nombre:nombre, id_u:$('#id_user').val()}
	$.post('laboratorio/bases/files-serverside/agregarNmetodo.php',datos).done(function(data){
		if(data==1){
			$('#s_add_metodo').load('laboratorio/bases/genera/metodos.php',function(response,status,xhr){if(status=="success"){
				$("#s_add_metodo").trigger("chosen:updated");
			}}); $('#cancelMetodo').click();
			swal({title:"MÉTODO AGREGADO",type:"success",text:"El método se dió de alta correctamente.",timer:1800,showConfirmButton:false});
		} else{alert(data);}
	});
}
function subirIndicacion(indicacion, noAleatorio, idU){ 
	var datosSINB = {indicacion:indicacion, noAleatorio:noAleatorio, idU:idU}
	$.post('laboratorio/bases/files-serverside/guardarIndicacionNB.php',datosSINB).done(function(data){ 
		if (data==1){ $('#clickmeIn').click();$('#s_add_indicacion').val('');$("#s_add_indicacion").trigger("chosen:updated");} else{alert(data);}
	});
}
function borrarIndicacionNB(idIndicacion){
	swal({
	  title: "ELIMINAR LA INDICACIÓN", text: "¿Estás seguro de eliminar la indicación de la base?", type: "",
	  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Eliminar", cancelButtonText: "Cancelar", closeOnConfirm: false
	},
	function(){
		var datosIndicacionNB = {idIndicacion:idIndicacion}
		$.post('laboratorio/bases/files-serverside/eliminarIndicacionNB.php',datosIndicacionNB).done(function(data){
			if (data==1){ $('#clickmeIn').click(); } else{alert(data);}
		});
		swal({ title:"INDICACIÓN ELIMINADA",type: "",text:"La indicación se ha eliminado de la base.",timer:1800,showConfirmButton:false });
	});
}

function nuevoEstudio(){
	$("#myModal").load("laboratorio/estudios/htmls/ficha_estudio_l.php",function(response,status,xhr){ if(status=="success"){ tinymce.remove("#input");
		$(".insers").load('genera/inserciones.php', function( response, status, xhr ) { if ( status == "success" ) { } });
		
		var datosFts ={idU:$('#id_user').val()}
		$.post('imagen/estudios/files-serverside/check_formato_lab.php',datosFts).done(function(data1){ $('#input').val(data1);
																								   
			tinymce.init({
				selector:'#myModal #input',resize:false,height:$('#referencia').height()*0.48,theme: "modern",
				plugins: 
					"table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, code, importcss",
				relative_urls: true, image_advtab: true, menubar: false, plugin_preview_width: $('#referencia').width()*0.8,
				toolbar:
					"undo redo | insert | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent1 indent1 | link unlink anchor | forecolor backcolor  | print_ preview_ code_ | emoticons_ | table | responsivefilemanager_ | mybuttonVP |",
				insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
				paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
				setup: function(editor){
					editor.addButton( 'mybuttonVP', {
						text: 'VPI', icon: false, tooltip: 'Vista previa de impresión',
						onclick:function(){
							var res = tinyMCE.get("input").getContent().replace(/<p/g, "<div"); res = res.replace(/<\/p>/g, "</div>"); //alert(res);
							$('#dpa_imprimir1').html(res).css('background-image','url(imagenes/vista_previa.png)').css('background-size','65%');
							$('#dpa_imprimir1').html(res); $('#dpa_imprimir1').printElement();
						}
					});
				}
			});
																								   
			$('#alerta_muestra, #alerta_metodo, .alerta_altas, .alerta_altas1, #alerta_indicacion').hide(); $('.tabulacion, #tabi_3, #tabi_2').remove();
			$('#condicion_n_mue').load('laboratorio/bases/files-serverside/generaCondicionesMuestras.php',function(response,status,xhr){});
			$('#btn-new_metodo').click(function(e) { $('#new_metodo').removeClass('hidden'); });
			$('#cancelMetodo').click(function(e){ $('.campos_met').val(''); $('#new_metodo').addClass('hidden'); });
			$('#addMetodo').click(function(e) {
				if($('#nombre_n_met').val()!=''){ agregar_nmet($('#nombre_n_met').val()); }
				else{$(".alerta_altas").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas").slideUp(600); });}
			});

			$('#btn-addCondicion').click(function(e) { $('#new_condicion').removeClass('hidden'); });
			$('#cancelCondicion').click(function(e){ $('.campos_ncm').val(''); $('#new_condicion').addClass('hidden'); });
			$('#addCondicion').click(function(e) {
				if($('#nombre_n_cm').val()!=''){ agregar_ncom($('#nombre_n_cm').val());}
				else{$(".alerta_altas1").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas1").slideUp(600); });}
			});

			$('#btn-new_muestra').click(function(e) { $('#new_muestra').removeClass('hidden'); });
			$('#cancelMuestra').click(function(e){ $('.campos_nmue').val(''); $('#new_muestra').addClass('hidden'); });
			$('#addMuestra').click(function(e) {
				if($('#nombre_n_mue').val()!='' & $('#condicion_n_mue').val()!=''){ agregar_nmue($('#nombre_n_mue').val(),$('#condicion_n_mue').val()); }
				else{$(".alerta_altas").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas").slideUp(600); });}
			});
			$("#s_add_muestra").load('laboratorio/bases/genera/muestras.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_muestra').chosen(); window.setTimeout(function(){$('#s_add_muestra_chosen').width(100+'%'); },100); },500);
			} });
			$("#s_add_metodo").load('laboratorio/bases/genera/metodos.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_metodo').chosen(); window.setTimeout(function(){$('#s_add_metodo_chosen').width(100+'%'); },100); },500);
			} });
			$("#s_add_indicacion").load('laboratorio/bases/genera/indicaciones.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_indicacion').chosen(); window.setTimeout(function(){$('#s_add_indicacion_chosen').width(100+'%'); },100); },500);
			} });

			$('#idUsuarioE').val($('#id_user').val());
			$('#areaE').load('laboratorio/estudios/genera/areasEstudios.php', function( response, status, xhr ){ });

			var now = new Date().getTime(); var d = new Date(); $('#aleatorioB').val(d.format('Y-m-d-H-i-s-u').substring(0,22));

			$('#btn-add_muestra').click(function(e){
				if($('#s_add_muestra').val()!==''){subirMuestra($('#s_add_muestra').val(), $('#aleatorioB').val(), $('#id_user').val());}
				else{$("#alerta_muestra").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_muestra").slideUp(600); });}
			});
			$('#btn-add_metodo').click(function(e){
				if($('#s_add_metodo').val()!==''){subirMetodo($('#s_add_metodo').val(), $('#aleatorioB').val(), $('#id_user').val());}
				else{$("#alerta_metodo").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_metodo").slideUp(600); });}
			});
			$('#btn-add_indicacion').click(function(e){
				if($('#s_add_indicacion').val()!==''){ subirIndicacion($('#s_add_indicacion').val(),$('#aleatorioB').val(),$('#id_user').val()); }
				else{$("#alerta_indicacion").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_indicacion").slideUp(600); });}
			});

			var heB = $('#myModal').height(); //alert($('#aleatorioB').val());
			var oTableMB;
			oTableMB = $('#dataTableMuestras').DataTable({
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
				"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
				"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
				"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
				"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
				"sAjaxSource": "laboratorio/bases/datatable-serverside/muestras_seleccionadas_base.php",
				"fnServerParams": function (aoData, fnCallback){ var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); },
				"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
				"oLanguage": { 
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "El ESTUDIO NO CUENTA CON MUESTRAS",
					"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered":"<br/>CONVENIOS: _MAX_","sSearch": "BUSCAR"
				}
			});
			$('#clickmeMu').click(function(e){oTableMB.draw();}); $('#t_tMuestras').click(function(e) { oTableMB.draw(); });

			var oTableMeB;
			oTableMeB = $('#dataTableMetodos').DataTable({
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
				"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
				"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
				"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
				"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
				"sAjaxSource": "laboratorio/bases/datatable-serverside/metodos_seleccionados_base.php",
				"fnServerParams": function (aoData, fnCallback) { var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); },
				"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
				"oLanguage": { 
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "EL ESTUDIO NO CUENTA CON MÉTODOS", 
					"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>CONVENIOS: _MAX_", "sSearch": "BUSCAR" 
				}
			});
			$('#clickmeMet').click(function(e){oTableMeB.draw();}); $('#t_tMetodos').click(function(e) { oTableMeB.draw(); });

			var oTableIeB;
			oTableIeB = $('#dataTableIndicaciones').DataTable({
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
				"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
				"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
				"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
				"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
				"sAjaxSource": "laboratorio/bases/datatable-serverside/indicaciones_seleccionadas_base.php",
				"fnServerParams": function (aoData, fnCallback) { var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); },
				"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
				"oLanguage": { 
					"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "EL ESTUDIO NO CUENTA CON INDICACIONES", 
					"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>CONVENIOS: _MAX_", "sSearch": "BUSCAR" 
				}
			});
			$('#clickmeIn').click(function(e){oTableIeB.draw();}); $('#t_tIndicaciones').click(function(e) { oTableIeB.draw(); });

			$('#formEstudio').validator().on('submit', function (e) {
			  if (e.isDefaultPrevented()) { // handle the invalid form...
				//$("#alerta1").fadeTo(2000,500).slideUp(500,function(){ $("#alerta1").slideUp(600); });
			  } else { // everything looks good!
				e.preventDefault(); 
				var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
				var datosP = $('#myModal #formEstudio').serialize();
				$.post('laboratorio/estudios/files-serverside/addEstudio_l.php',datosP).done(function( data ) {
					if (data==1){//si el paciente se Actualizó 
						$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal').modal('hide');
						swal({ title: "", type: "success", text: "El estudio se ha creado.", timer: 2000, showConfirmButton: false }); return;
					}else{alert(data);}
				});
			  }
			});
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} });
}
function fichaEstudio(idE, na){
	$("#myModal1").load("laboratorio/estudios/htmls/ficha_estudio_l.php",function(response,status,xhr){ if(status=="success"){
		$(".insers").load('genera/inserciones.php', function( response, status, xhr ) { if ( status == "success" ) { } });
		
		var datosFts ={idU:$('#id_user').val(), idSucursal:$('#miSucursal').val(), idE:idE}
		$.post('laboratorio/estudios/files-serverside/check_formato_individual.php',datosFts).done(function(data1x){ tinymce.remove("#input");
			$('#input').val(data1x);
			tinymce.init({ 
				selector:'#myModal1 #input',resize:false,height:$('#referencia').height()*0.48,theme: "modern",
				plugins: 
					"table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, code, importcss",
				relative_urls: true, image_advtab: true,
				menubar: false, plugin_preview_width: $('#referencia').width()*0.8,
				toolbar: 
					"undo redo | insert | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent1 indent1 | link unlink anchor | forecolor backcolor  | print_ preview_ code_ | emoticons_ | table | responsivefilemanager_ | mybuttonVP |",
				insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
				paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
				setup: function(editor){
					editor.addButton( 'mybuttonVP', {
						text: 'VPI', icon: false, tooltip: 'Vista previa de impresión',
						onclick:function(){
							var res = tinyMCE.get("input").getContent().replace(/<p/g, "<div"); res = res.replace(/<\/p>/g, "</div>"); //alert(res);
							$('#dpa_imprimir1').html(res).css('background-image','url(imagenes/vista_previa.png)').css('background-size','65%');
							$('#dpa_imprimir1').html(res); $('#dpa_imprimir1').printElement();
						}
					});
				}
			});//setTimeout(function(){ tinymce.get("input").execCommand('mceInsertContent', false, data1x); }, 900);
																													
			$('#alerta_muestra, #alerta_metodo, .alerta_altas, .alerta_altas1, #alerta_indicacion').hide(); //$('.tabulacion, #tabi_3, #tabi_2').remove();
			$('#condicion_n_mue').load('laboratorio/bases/files-serverside/generaCondicionesMuestras.php',function(response,status,xhr){});
			$('#btn-new_metodo').click(function(e) { $('#new_metodo').removeClass('hidden'); });
			$('#cancelMetodo').click(function(e){ $('.campos_met').val(''); $('#new_metodo').addClass('hidden'); });
			$('#addMetodo').click(function(e) {
				if($('#nombre_n_met').val()!=''){ agregar_nmet($('#nombre_n_met').val());}
				else{$(".alerta_altas").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas").slideUp(600); });}
			});

			$('#btn-addCondicion').click(function(e) { $('#new_condicion').removeClass('hidden'); });
			$('#cancelCondicion').click(function(e){ $('.campos_ncm').val(''); $('#new_condicion').addClass('hidden'); });
			$('#addCondicion').click(function(e) {
				if($('#nombre_n_cm').val()!=''){ agregar_ncom($('#nombre_n_cm').val()); }
				else{$(".alerta_altas1").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas1").slideUp(600); });}
			});

			$('#btn-new_muestra').click(function(e) { $('#new_muestra').removeClass('hidden'); });
			$('#cancelMuestra').click(function(e){ $('.campos_nmue').val(''); $('#new_muestra').addClass('hidden'); });
			$('#addMuestra').click(function(e) {
				if($('#nombre_n_mue').val()!='' & $('#condicion_n_mue').val()!=''){ agregar_nmue($('#nombre_n_mue').val(),$('#condicion_n_mue').val());}
				else{$(".alerta_altas").fadeTo(2000,500).slideUp(500,function(){ $(".alerta_altas").slideUp(600); });}
			});
			$("#s_add_muestra").load('laboratorio/bases/genera/muestras.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_muestra').chosen(); window.setTimeout(function(){$('#s_add_muestra_chosen').width(100+'%'); },100); },500);
			} });
			$("#s_add_metodo").load('laboratorio/bases/genera/metodos.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_metodo').chosen(); window.setTimeout(function(){$('#s_add_metodo_chosen').width(100+'%'); },100); },500);
			} });
			$("#s_add_indicacion").load('laboratorio/bases/genera/indicaciones.php',function(response,status,xhr){ if(status=="success"){
				window.setTimeout(function(){ $('#s_add_indicacion').chosen(); window.setTimeout(function(){$('#s_add_indicacion_chosen').width(100+'%'); },100); },500);
			} });

			$('#btn_save1').text('Actualizar');
			var datos ={idE:idE}
			$.post('laboratorio/estudios/files-serverside/fichaEstudio_l.php',datos).done(function(data1){
				var datosI = data1.split('*}'); $('#titulo_modal').text('FICHA DEL ESTUDIO '+datosI[0]);

				$("#miSucursalNS").load('pacientes/genera/genera_sucursales_ov.php?idU='+$('#id_user').val(),function(response,status,xhr){
					if (status = "success"){ $("#miSucursalNS").val($('#miSucursal').val()); }
				});

				$('#idUsuarioE').val($('#id_user').val()); $('#idEstudioE').val(idE);
				$('#areaE').load('laboratorio/estudios/genera/areasEstudios.php', function( response, status, xhr ){ $(this).val(datosI[1]); });
				$('#nombreE').val(datosI[0]); $('#precioE').val(datosI[2]); $('#precioUrgenciaE').val(datosI[3]);
				$('#precioME').val(datosI[6]); $('#precioUrgenciaME').val(datosI[7]);$('#dEntregaE').val(datosI[5]);
				
				var now = new Date().getTime(); var d = new Date();

				if(na==undefined || na==''){//No hay numero aleatorio
					$('#aleatorioB').val(d.format('Y-m-d-H-i-s-u').substring(0,22));
					// Y guardamos en la tabla del estudio(concepto) el número aleatorio
					var datosNA = {nAl:$('#aleatorioB').val(), idEstu:idE}
					$.post('laboratorio/estudios/files-serverside/updateNA.php',datosNA).done(function( data ) {
						$('#clickme').click(); if (data==1){}//si el na se Actualizó 
						else{alert(data);}
					});	
				}else{$('#aleatorioB').val(na)}

				$('#btn-add_muestra').click(function(e){
					if($('#s_add_muestra').val()!==''){subirMuestra($('#s_add_muestra').val(), $('#aleatorioB').val(), $('#id_user').val());}
					else{$("#alerta_muestra").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_muestra").slideUp(600); });}
				});
				$('#btn-add_metodo').click(function(e){
					if($('#s_add_metodo').val()!==''){subirMetodo($('#s_add_metodo').val(), $('#aleatorioB').val(), $('#id_user').val());}
					else{$("#alerta_metodo").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_metodo").slideUp(600); });}
				});
				$('#btn-add_indicacion').click(function(e){
					if($('#s_add_indicacion').val()!==''){ subirIndicacion($('#s_add_indicacion').val(),$('#aleatorioB').val(),$('#id_user').val()); }
					else{$("#alerta_indicacion").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_indicacion").slideUp(600); });}
				});

				var heB = $('#myModal').height(); //alert($('#aleatorioB').val());
				var oTableMB;
				oTableMB = $('#dataTableMuestras').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
					"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
					"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
					"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
					"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
					"sAjaxSource": "laboratorio/bases/datatable-serverside/muestras_seleccionadas_base.php",
					"fnServerParams": function (aoData, fnCallback) { 
						var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); 
					},
					"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', 
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage": { 
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "LA BASE NO CUENTA CON MUESTRAS",
						"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered":"<br/>CONVENIOS: _MAX_","sSearch": "BUSCAR"
					}
				});
				$('#clickmeMu').click(function(e){oTableMB.draw();}); $('#t_tMuestras').click(function(e) { oTableMB.draw(); });

				var oTableMeB;
				oTableMeB = $('#dataTableMetodos').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
					"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
					"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
					"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
					"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
					"sAjaxSource": "laboratorio/bases/datatable-serverside/metodos_seleccionados_base.php",
					"fnServerParams": function (aoData, fnCallback) { 
						var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); 
					},
					"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', 
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage": { 
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "LA BASE NO CUENTA CON MÉTODOS", 
						"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>CONVENIOS: _MAX_", "sSearch": "BUSCAR" 
					}
				});
				$('#clickmeMet').click(function(e){oTableMeB.draw();}); $('#t_tMetodos').click(function(e) { oTableMeB.draw(); });

				var oTableReB;
				oTableReB = $('#dataTableBBE').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
					"bJQueryUI":false, "bRetrieve": true, "sScrollY": $('#myModal1').height()*0.5, "bAutoWidth": true, "bStateSave": false,
					"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
					"aoColumns": [ { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false } ],
					"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
					"sAjaxSource": "laboratorio/estudios/datatable-serverside/bases_seleccionadas_estudio.php",
					"fnServerParams": function (aoData, fnCallback) { 
						var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); 
					},
					"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', 
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage": { 
						"sLengthMenu": "MONSTRANDO _MENU_ records per page",
						"sZeroRecords": "EL ESTUDIO NO CUENTA CON BASES ASIGNADAS","sInfo": "MOSTRADAS: _END_", 
						"sInfoEmpty": "MOSTRADAS: 0", "sInfoFiltered": "<br/>BASES: _MAX_", "sSearch": "BUSCAR" 
					}
				});
				$('#clickmeBBE').click(function(e){oTableReB.draw();}); $('#tab_formato').click(function(e){oTableReB.draw(); });

				var oTableIeB;
				oTableIeB = $('#dataTableIndicaciones').DataTable({
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
					"bJQueryUI": false,  "bRetrieve": true, "sScrollY": heB*0.4, "bAutoWidth": true, "bStateSave": false, 
					"bInfo": true, "bFilter": false, "aaSorting": [[0, "asc"]], ordering: false,
					"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }],
					"iDisplayLength": 50, "bLengthChange": false, "bProcessing": true, "bServerSide": true, 
					"sAjaxSource": "laboratorio/bases/datatable-serverside/indicaciones_seleccionadas_base.php",
					"fnServerParams": function (aoData, fnCallback) { var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); },
					"sDom": '<"filtroC">l<"infoC">r<"data_tC"t>', "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
					"oLanguage": { 
						"sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "EL ESTUDIO NO CUENTA CON INDICACIONES", 
						"sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>CONVENIOS: _MAX_", "sSearch": "BUSCAR" 
					}
				});
				$('#clickmeIn').click(function(e){oTableIeB.draw();}); $('#t_tIndicaciones').click(function(e) { oTableIeB.draw(); });

				//para los fintros individuales por campo de texto
				oTableReB.columns().every( function () {
					var that = this;
					$( 'input', this.footer() ).on( 'keyup change', function () { if ( that.search() !== this.value ) { that .search( this.value ) .draw(); } } );
				} );
				//fin filtros individuales por campo de texto

				$('#bBaseE').click(function(e) {
					$('.no_base').addClass('hidden'); $('.si_base').removeClass('hidden'); $('#tab_bases').click();
					window.setTimeout(function(){$('#clickmeBasesE, #clickmeBBasB').click();},200);
				});
				$('#btn_salir_bases').click(function(e) { $('.no_base').removeClass('hidden'); $('.si_base').addClass('hidden'); $('#tab_formato').click(); });

				var oTableReB1;
				oTableReB1 = $('#dataTableBbasesE').dataTable({
					"bJQueryUI": false, "bRetrieve": true, "sScrollY": $('#myModal1').height()*0.18, "bStateSave": false, "bInfo": true,
					"bFilter": true, "aaSorting": [[1, "asc"]],
					"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }], "iDisplayLength": 30, "bLengthChange": false, "bProcessing": false, "bServerSide": true, ordering: false,
					"sDom": '<"toolbarBMB input-sm"f><"filtroBMB">lr<"data_tBMB"t><"infoBMB">S', "sAjaxSource": "laboratorio/estudios/datatable-serverside/buscar_bases_estudios.php","aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
					"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADOS: _END_", "sInfoEmpty": "MOSTRADOS: 0", "sInfoFiltered": "<br/>MÉTODOS: _MAX_", "sSearch": "" }
				}); $('#clickmeBasesE').click(function(e) { oTableReB1.fnDraw(); });
				$('.dataTables_filter input').attr('placeholder','Buscar base');		

				$(".pieTablaBbaseE input").keyup(function(){oTableReB1.fnFilter(this.value,$(".pieTablaBbaseE input").index(this)); });

				var tableBBE = $('#dataTableBbasesE').DataTable();
				$('#dataTableBbasesE tbody').on('click','tr',function(){
					if($(this).hasClass('selected2')){$(this).removeClass('selected2');}
					else{tableBBE.$('tr.selected2').removeClass('selected2');$(this).addClass('selected2');$('#errorSeleccionBases').hide();}
				});

				$('#dataTableBbasesE tbody').on( 'click', 'tr', function () { 
					var nTdsMNB = $('td', this); 
					subirBase($(nTdsMNB[0]).text(), $('#aleatorioB').val(), $('#id_user').val(), idE); 
				});

				var oTableReB2;
				oTableReB2 = $('#dataTableBasesSE').dataTable({
					"bJQueryUI": false, "bRetrieve": true, "sScrollY": $('#myModal1').height()*0.2, "bStateSave": false,
					"bInfo": false, "bFilter": false, "aaSorting": [[0, "asc"]],
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { },
					"aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }], "iDisplayLength": 30, "bLengthChange": false, "bProcessing": false, "bServerSide": true, ordering: false,
					"sDom": '<"toolbarBMB1"><"filtroBMB1"f>lr<"data_tBMB1"t><"infoBMB1"i>S', "sAjaxSource": "laboratorio/estudios/datatable-serverside/bases_seleccionadas_estudio.php", 
					"fnServerParams": function (aoData, fnCallback) { 
						var aleatorio = $('#aleatorioB').val(); aoData.push(  {"name": "aleatorio", "value": aleatorio } ); 
					},
					"aLengthMenu": [[9, 25, 50, 100, -1], [9, 25, 50, 100, "Todos"]],
					"oLanguage": { "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADAS: _END_", "sInfoEmpty": "MOSTRADAS: 0", "sInfoFiltered": "<br/>BASES: _MAX_", "sSearch": "" }
				});/*fin datatable*/ $('#clickmeBBasB').click(function(e) { oTableReB2.fnDraw(); });
			});

			$('#formEstudio').validator().on('submit', function (e) {
			  if (e.isDefaultPrevented()) { // handle the invalid form...
			  } else { // everything looks good!
				e.preventDefault(); 
				var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
				var datosP = $('#myModal1 #formEstudio').serialize();
				$.post('laboratorio/estudios/files-serverside/updateEstudio_l.php',datosP).done(function( data ) {
					if (data==1){//si el paciente se Actualizó 
						$('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal1').modal('hide');
						swal({ title: "", type: "success", text: "El estudio se ha actualizado.", timer: 2000, showConfirmButton: false }); return;
					} else{alert(data);}
				});
			  }
			});
		});
		
		$('#myModal1').modal('show');
		$('#myModal1').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
		$('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
	} });
}
function borrarBaseE(idAsiBase){
	var datosBaseAB = {idAB:idAsiBase}
	$.post('laboratorio/estudios/files-serverside/eliminarBaseE.php',datosBaseAB).done(function( data ) { if (data==1){ 
		$('#clickmeBasesE, #clickmeBBasB, #clickmeBBE').click(); 
	} else{alert(data);} });
}

function subirBase(base, noAleatorio, idU, idE){
	if(base != 'SIN COINCIDENCIAS - LO SENTIMOS'){ var datosSMNB = {base:base, noAleatorio:noAleatorio, idU:idU, idE:idE}
		$.post('laboratorio/estudios/files-serverside/guardarBaseNE.php',datosSMNB).done(function( data ) { if (data==1){ 
			$('#clickmeBBasB').click(); $('#clickmeBasesE, #clickmeBBE').click(); 
		} else{alert(data);} });
	}
}
	
function insertAtCaret(text){ 
	tinymce.get("input").execCommand('mceInsertContent', false, text); 
}
</script>