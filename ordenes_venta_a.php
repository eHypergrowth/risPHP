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
    
    <title>SISTEMA - ADMINISTRACIÓN - ÓRDENES DE VENTA</title>
    
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    
    <!-- Mainly scripts -->
	<script src="js/jquery-3.2.1.js"></script>
    <script src="jquery-ui-1.12.0/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
	<script src="TableTools-2.1.5/media/js/TableTools.js"></script>
    <script src="TableTools-2.1.5/media/js/ZeroClipboard.js"></script>
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
    <script src="funciones/js/cantidad_a_letra.js"></script>
    <script src="funciones/js/calcula_edad.js"></script>
    <script src="funciones/js/stdlib.js"></script>
    <script src="funciones/js/bs-modal-fullscreen.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="DataTables-1.10.5/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="TableTools-2.1.5/media/css/TableTools.css" rel="stylesheet">
    <link href="bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="chosen/chosen-bootstrap.css">
    <link href="jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" rel="stylesheet">
    <link href="c3/c3.css" rel="stylesheet">
</head>
<?php include_once 'partes/header.php'; ?>
<!-- Contenido -->
<div id="div_tabla_pacientes" class="" style="border:1px none red; vertical-align:top; margin-top:0px; font-size: 1.2em;">
<table id="dataTable" width="90%" height="100%" class="table table-striped table-hover">
    <thead>
      <tr class="bg-primary">
        <th width="110px" id="clickme" style="white-space:nowrap;">REFERENCIA</th>
        <th>PACIENTE</th>
        <th width="80px">FECHA</th>
        <th width="100px">SUCURSAL</th>
        <th width="160px">USUARIO</th>
        <th width="10px">SUBTOTAL</th>
        <th width="10px" nowrap style="white-space:nowrap">CARGOS EXTRA</th>
        <th width="10px">DESCUENTO</th>
        <th width="10px">TOTAL</th>
        <th>COMISION</th>
        <th>INGRESO</th>
        <th width="10px">ABONADO</th>
        <th width="10px">SALDO</th>
        <th width="10px">PAGADO</th>
      </tr>
    </thead>
    <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
    <tfoot>
		<tr class="bg-primary">
			<th><input type="hidden"></th>
			<th><input type="text" placeholder="Referencia" class="form-control input-sm"/></th>
			<th><input type="text" placeholder="Paciente" class="form-control input-sm" /></th>
            <th><input type="hidden" class=""></th>
			<th> <input type="hidden" class=""> <input type="text" placeholder="Sucursal" class="form-control input-sm"/> </th>
			<th><input type="text" placeholder="Usuario" class="form-control input-sm" /></th>
            <th><input type="hidden" class="sCalculo" /></th>
            <th><input type="hidden" class="sCalculo" /></th>
            <th><input type="hidden" class="sCalculo" /></th>
            <th><input type="hidden" class="sCalculo" /></th>
			<th><input type="hidden" class="sCalculo" /></th>
			<th><input type="hidden" class="sCalculo" /></th>
            <th><input type="hidden" class="sCalculo" /></th>
            <th><input type="hidden" class="" /></th>
            <th></th>
		</tr>
	</tfoot>
  </table>
  
  <div id="divRangoFechas" style="border:2px none red; display:block; width:100%; float:left;">
  <table width="100%" border="0" class="table-condensed">
  <tr>
    <td width="10px">De </td>
    <td width="1%">
        <input name="fechaDe" class="fechas form-control input-sm" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width:100px;" type="text" id="fechaDe" value="<?php echo date("Y-m-d"); ?>" readonly >
    </td>
    <td width="10px">A </td>
    <td width="1%">
    	<input style="width:100px;" name="fechaA" type="text" class="fechas form-control input-sm" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="fechaA" value="<?php echo date("Y-m-d"); ?>" readonly>
    </td>
    <td id="rangosFechas">
    	<input type="radio" class="rad" id="radio1" name="radio" /><label for="radio1">Hoy</label>
        <input type="radio" class="rad" id="radio2" name="radio" /><label for="radio2">Todos</label>
    </td>
    <td align="right" nowrap> <input type="checkbox" id="saldos" value="" /> <label for="saldos">Saldos</label> </td>
  </tr>
</table>
</div>
</div>
<div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
<!-- FIN Contenido -->  
<?php include_once 'partes/footer.php'; ?>

<script>
$(document).ready(function(e) {
	//breadcrumb
	$('#breadc').html('<li><a href="index.php">HOME</a></li><li>ADMINISTRACIÓN</li><li>CORTE DE CAJA</li><li class="active"><strong>ÓRDENES DE VENTA</strong></li>');
	
	$('.fechas').datepicker().on('changeDate', function(e){ $('#clickme').click(); });
	
	//función para la info de detalle de cada registro
	function fnFormatDetails ( oTable, nTr, x) { var aData = oTable.fnGetData( nTr ); var sOut = x; return sOut; }
	//función para la info de detalle de cada registro
	
	//para filtros con cuadro de textos individuales
	var asInitVals = new Array();
	//fin fintros con cuadro de texto indivicuales

	//$('#my_search').removeClass('hidden'); $.fn.datepicker.defaults.autoclose = true; 
	
	/* * Insert a 'details' column to the table */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="imagenes/generales/details_open.png">';
    nCloneTd.className = "center";
     
    $('#dataTable thead tr').each( function () { this.insertBefore( nCloneTh, this.childNodes[0] ); });
     
    $('#dataTable tbody tr').each( function () { this.insertBefore( nCloneTd.cloneNode( true ), this.childNodes[0] ); });
	
	var tam = $('#referencia').height() - 242-$('#breadc').height();
	var wT = $('#referencia').width()*0.9;
	//$('#dataTable').css('width',100);
	var oTable = $('#dataTable').dataTable({
		//funciones para calcular los totales en los campos del pie de página
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			//$('.cambiar_suc').change(function() { alert( "Handler for .change() called." ); });
			
			$( '#rangosFechas' ).buttonset();
			
			$("#miFiltroDeptos").change(function(e){ $('#clickme').click(); });
						
			$('.opcTable').css('float','left');
			$('span.DataTables_sort_icon').remove();
			$("#saldos").button();
            /* Calculate the market share for browsers on this page */
            var iTotal = 0, iDescuento=0, iIngreso = 0, iAbonado = 0, iSaldo = 0, iSubT = 0, iCargosE = 0;
            for ( var i=iStart ; i<iEnd ; i++ )
            {
				iDescuento += aaData[ aiDisplay[i] ][8]*1;
                iTotal += aaData[ aiDisplay[i] ][9]*1;
				iAbonado += aaData[ aiDisplay[i] ][12]*1;
				iSaldo += aaData[ aiDisplay[i] ][13]*1;
				iSubT += aaData[ aiDisplay[i] ][6]*1;
				iCargosE += aaData[ aiDisplay[i] ][7]*1;
            }
             
            /* Modify the footer row to match what we want */
            var nCells = nRow.getElementsByTagName('th');
			nCells[7].innerHTML = '$'+redondear(parseFloat(iDescuento * 100)/100,2);
            nCells[8].innerHTML = '$'+redondear(parseFloat(iTotal * 100)/100,2);
			nCells[9].innerHTML = '$'+redondear(parseFloat(iAbonado * 100)/100,2);
			nCells[10].innerHTML = '$'+redondear(parseFloat(iSaldo * 100)/100,2);
			nCells[5].innerHTML = '$'+redondear(parseFloat(iSubT * 100)/100,2);
			nCells[6].innerHTML = '$'+redondear(parseFloat(iCargosE * 100)/100,2);
			
			window.setTimeout(function(){$('.erase1').each(function(index, element){ $(this).parent().parent().remove(); });},200);
        },
		//fin de funciones para calcular los totales en los campos del pie de página
		"bJQueryUI": false, "sScrollY": tam-60, "bAutoWidth": true, "bPaginate": true, "sPaginationType": "two_button", 
		"bStateSave": false, "bInfo": true, "bFilter": true, ordering: false,
		"aoColumnDefs": [ 
			{"bSortable":false, "aTargets":[0]}, {"bVisible":false, "aTargets":[11] }, { "bVisible": true, "aTargets": [ 9 ] },
			{"bVisible": true, "aTargets": [ 7 ]},{ "bVisible": true, "aTargets": [ 8 ]},{"bVisible": false,"aTargets": [ 3 ] },
			{"sClass":"right1","aTargets":[ 6 ] },{"sClass":"right1", "aTargets":[ 9 ] },{ "bVisible": false, "aTargets":[ 10 ] },
			{"sClass":"right1","aTargets":[ 12 ] }, {"bVisible":true, "aTargets":[5]},{"sClass":"right1", "aTargets":[ 7 ] },
			{"sClass":"right1", "aTargets":[ 11 ] }
		],
		"aaSorting": [[3, "desc"]], "iDisplayLength": 500000000000000, "bLengthChange": false,
		"bProcessing": false, "bServerSide": true,
		"sDom": '<"opcTable"T><"filtro1"><"regis"l>r<"data_t"t><"infoPrincipal"i>',
		"oTableTools": {
			"sSwfPath": "TableTools-2.1.5/media/swf/copy_csv_xls_pdf.swf",
			"aButtons": [ 
				{ "sExtends": "pdf", "sButtonText": "PDF", "sPdfOrientation": "landscape", "sPdfSize": "letter", "sPdfMessage": "Reporte de Ingresos." },
				{ "sExtends": "xls", "sButtonText": "EXCEL" },
				{ "sExtends": "copy", "sButtonText": "COPIAR" },
				{ "sExtends": "print", "sButtonText": "IMPRIMIR", "sInfo": "</br>VISTA DE IMPRESIÓN </br></br></br> Presione SCAPE al terminar." }
			]
		},
		"sAjaxSource": "corte_caja/reportes/datatable-serverside/reportes_ov_a.php",
 		"fnServerParams": function (aoData, fnCallback) {
			   var de = document.getElementById('fechaDe').value+' 00:00:00';
			   var a = $('#fechaA').val()+' 23:59:59';
			   var saldos = $('#saldos').val();
			   var filtroDepto = $('#miFiltroDeptos').val();
			   var usuario = $('#id_user').val();

               aoData.push(  {"name": "min", "value": de /*'2013-02-01 00:00:00'*/ } );
               aoData.push(  {"name": "max", "value": a /*'2013-02-15 23:59:59'*/ } );
			   aoData.push(  {"name": "saldos", "value": saldos /*'2013-02-15 23:59:59'*/ } );
			   aoData.push(  {"name": "depto", "value": filtroDepto /*'2013-02-15 23:59:59'*/ } );
			   aoData.push(  {"name": "usuario", "value": usuario } );
        },
		"aLengthMenu": [[7, 15, 30, 100, -1], [7, 15, 30, 100, "Todos"]],
		"oLanguage": {
			"sLengthMenu": "_MENU_ REGISTROS", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS", "sInfo": "MOSTRADAS: _END_", "sInfoEmpty": "MOSTRADAS: 0",
			"sInfoFiltered": "&nbsp;REGISTROS: _MAX_", "sSearch": "BUSCAR"
		}
	}); $('#clickme').click(function(e) { oTable.fnDraw(); });
	

	
	$('#nuevoVale').button({ icons: { primary: "ui-icon-plusthick" }, text: true });
	$('#nuevoVale').click(function(event) { event.preventDefault(); });
	
	$('#radio1').click(function(e) { 
		$('#fechaDe').val('<?php echo date("Y-m-d"); ?>'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); 
	});
	$('#radio2').click(function(e) { 
		$('#fechaDe').val('2000-01-01'); $('#fechaA').val('<?php echo date("Y-m-d"); ?>'); oTable.fnDraw(); 
	});
	$( "#fechaDe" ).datepicker({ 
		defaultDate: "-1", maxDate: +0, 
		onClose: function( selectedDate ) { $( "#fechaA" ).datepicker( "option", "minDate", selectedDate ); }, 
		"onSelect": function(date) { min = date+' 00:00:00'; oTable.fnDraw(); } 
	}).css('max-width','100px');
	
	$( "#fechaA" ).datepicker({ 
		defaultDate: "+0", maxDate: +0, 
		onClose: function(selectedDate){ $( "#fechaDe" ).datepicker( "option", "maxDate", selectedDate ); }, 
		"onSelect": function(date) { max = date+' 23:59:59'; oTable.fnDraw(); } 
	}).css('max-width','100px');
	
	$('#saldos').click(function(e) {
        if($(this).prop('checked')==true){ $(this).val('SI'); }else{$(this).val('NO');}
		oTable.fnDraw();
    });
	
	$(document).delegate('#dataTable tbody td img','click', function () {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)){ /* This row is already open - close it */
            this.src = "imagenes/generales/details_open.png"; oTable.fnClose( nTr );
        }
        else
        { /* Open this row */
			var aData = oTable.fnGetData( nTr );
			this.src = "imagenes/generales/details_close.png";
			var so = aData[5], so1=aData[8],ref=aData[1], depto = aData[6], area = aData[7], total = aData[9];
			var datoxOV ={ ref:ref }
			$.post('corte_caja/reportes/datatable-serverside/datosAdicionales.php',datoxOV,processDataOV);//salva la OV
			function processDataOV(dataOV) {
		  		console.log(dataOV); var text = dataOV.split('/');
	            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr, dataOV/*text[0], text[1], text[2]*/), 'details' );
       		} // end processDataOV
        }
    } );
	// fin  Add event listener for opening and closing details
	
//para filtros con cuadro de textos individuales
	$("tfoot input").keyup( function () { oTable.fnFilter( this.value, $("tfoot input").index(this) ); });
	 /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
     * the footer
     */
    $("tfoot input").each( function (i) { asInitVals[i] = this.value; });
     
    $("tfoot input").focus(function (){
        if(this.className == "search_init"){ this.className = ""; this.value = ""; }
    } );
     
    $("tfoot input").blur( function (i) {
        if ( this.value == "" ) { this.className = "search_init form-control input-sm"; this.value = asInitVals[$("tfoot input").index(this)]; }
    } );
});
	
function cambiar_suc(val, temp){
	swal({
	  title: "CAMBIAR SUCURSAL",
	  text: "¿Estás seguro de cambiar la sucursal de la orden de venta?", type: "",
	  showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Cambiar", closeOnConfirm: false, cancelButtonText: "Cancelar"
	},
	function(){
		var datos = {id_ns:val, tempo:temp, id_u: $('#id_user').val()}
		$.post('caja/files-serverside/cambiar_sucursal.php',datos).done(function(data){
			if(data==1){ $('#clickme').click();
				swal({ title: "¡CONFIRMACIÓN!", type: "success", text: "La sucursal de la orden ha sido actualizada.", timer: 1800, showConfirmButton: false }); return;
			}else{alert(data);}
		});
	});
}
	
function pagar(ref, tot, sal, abo, pac, noTemp, indicador, tCo, tIm, tLab, tFar){
	//alert(ref+";"+tot+";"+sal+";"+abo+";"+pac+";"+noTemp+";"+indicador+";"+tCo+";"+tIm+";"+tLab+";"+tFar);
	$("#myModal").load("corte_caja/reportes/htmls/dialogPagarOV.php",function(response,status,xhr){if (status == "success"){
		//Si indicador = 2 mostrar anucio de que el monto de los pagos anteriores se debe incluir en este pago actual.
		if(indicador == 2){
			$('#t').html('<i class="fa fa-info-circle"></i> Debido a los cambios realizados en la plataforma, es necesario que el monto anterior de los pagos realizados a esta Orden de Venta se incluyan junto que éste pago actual. Así que el monto mínimo a pagar es de $'+abo+' repartidos en la forma posible indicada. Esta acción es con el fin de repartir los pagos en los departamentos de la Orden. Por su comprensión GRACIAS!');
		}else{$('#texto_money').remove();}
		
		$('#titulo_modal').text('PAGO A LA ORDEN DE VENTA '+ref+' DEL PACIENTE '+pac); $('#alerta_new_pago').hide();
		$('#totalOVP').val(tot); $('#abonadoOVP').val(abo); $('#saldoP').val(redondear(sal,2)); $('#opcion_pa').val(indicador);
		
		var montoPagar = 0;
		
		$('.montoPagarP').keyup(function(e){
			montoPagar = parseFloat($('#pago_ov_c').val())+parseFloat($('#pago_ov_i').val())+parseFloat($('#pago_ov_l').val())+parseFloat($('#pago_ov_f').val());
			
			if(indicador != 2){ if( parseFloat(montoPagar) > parseFloat($('#saldoP').val()) ){ montoPagar = $('#saldoP').val(); } }
			
			$('#monto_t_p').text(parseFloat(montoPagar)); $('#pagaConP, #cambioP').val('');
		});
		
		$('#1total_c1').text(tCo); $('#1total_i').text(tIm); $('#1total_l').text(tLab); $('#1total_p').text(tFar);
		if(tCo==0){$('#pago_ov_c').val(0);} if(tIm==0){$('#pago_ov_i').val(0);} if(tLab==0){$('#pago_ov_l').val(0);} if(tFar==0){$('#pago_ov_f').val(0);}
		
		$('#btn_liquidar_ov').click(function(e){
			$('#pago_ov_c').val($('#1total_c1').text()); $('#pago_ov_i').val($('#1total_i').text()); $('#pagaConP, #cambioP').val('');
			$('#pago_ov_l').val($('#1total_l').text()); $('#pago_ov_f').val($('#1total_p').text()); $('#form-pagar').validator('update');
			montoPagar = parseFloat($('#pago_ov_c').val())+parseFloat($('#pago_ov_i').val())+parseFloat($('#pago_ov_l').val())+parseFloat($('#pago_ov_f').val());
			$('#monto_t_p').text(parseFloat(montoPagar));
		});
		
		$('#pagaConP').keyup(function(e) {
			if( $(this).val() > parseFloat(montoPagar) ){ $('#cambioP').val(redondear(parseFloat($('#pagaConP').val())-parseFloat(montoPagar),2) );}
			else{$('#cambioP').val('')}
		});
		
		$('#formaPagoP').load("corte_caja/reportes/genera/formas_pago.php",function(response,status,xhr){ if(status=="success"){
			$(this).val(1); //window.setTimeout(function(){$('#montoPagarP').focus();},400);
			$('#formaPagoP').change(function(e) { 
				$('#pagaConP, #cambioP').val(''); $('#pago_ov_c, #pago_ov_i, #pago_ov_l, #pago_ov_f').val(0);
				
				if($(this).val()!=''){ $('.montoPagarP').prop('readonly',false); }
				else{ $('.montoPagarP').prop('readonly',true); $('#ivaP').val(0); }
				//if($(this).val()==4){$('#numeroCheque').show();$('#noChequeP').focus();} else{$('#numeroCheque').hide();}
				if($(this).val()==1){ $('#pagaConP').prop('readonly',false); }else{$('#pagaConP').prop('readonly',true);}
			});
		} }); var permite = 1;
		
		$('#form-pagar').validator().on('submit', function (e) {
		  if (e.isDefaultPrevented()) { // handle the invalid form...
			$("#alerta_new_pago").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_pago").slideUp(600); });
		  }else { // everything looks good!
			if(indicador == 2){e.preventDefault();
				if(montoPagar<abo){ $("#alerta_new_pago").fadeTo(2000,500).slideUp(500,function(){ $("#alerta_new_pago").slideUp(600); }); permite = 0; }
			}else{permite = 1;}
			if(permite==1){
				e.preventDefault(); var $btn = $('#btn_pago_ov').button('loading'); $('#btn_cancel_pago_ov').hide();

				var datosP={
					ref:ref,user:$('#id_user').val(),pago_ov_c:$('#pago_ov_c').val(),noTemp:noTemp,formaPagoP:$('#formaPagoP').val(),
					pago_ov_i:$('#pago_ov_i').val(), pago_ov_l:$('#pago_ov_l').val(), pago_ov_f:$('#pago_ov_f').val(), opcion_pa:$('#opcion_pa').val()
				}
				$.post('corte_caja/reportes/files-serverside/savePago.php',datosP).done(function(data){ var data1 = data.split('{]*}');
					if(data1[0]==1){
						$('#clickme').click(); $btn.button('reset'); $('#btn_cancel_pago_ov').show(); $('#myModal').modal('hide');

						swal({
						  title: "PAGO REALIZADO", text: "¿Deseas imprimir el ticket?", type: "success", showCancelButton: true,
						  confirmButtonText: "Imprimir", cancelButtonText: "Salir", closeOnConfirm: false
						},
						function(){
							swal.close();
							$("#myModal1").load('pacientes/htmls/ticket_nuevo.php', function( response, status, xhr ){ if(status=="success"){
								var datosTi = {noAleatorio:data1[1]}
								$.post('pacientes/files-serverside/cargar_ticket.php',datosTi).done(function(data){
									$('#cuerpo_modal').html(data); $('#imprimirTic').click(function(e){ $('#tablaTicket').printElement();});
								});

								$('#myModal1').modal('show');
								$('#myModal1').on('shown.bs.modal',function(e){ });
								$('#myModal1').on('hidden.bs.modal',function(e){ $(".modal-content").remove(); $("#myModal1").empty(); });
							}});					
						});
						//
					}else{alert(data);}
				});
			}
		  }
		});
		
		$('#myModal').modal('show');
		$('#myModal').on('shown.bs.modal', function (e) { $('#form-pagar').validator(); });
		$('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
	} }); //fin de load
}

function su_pago_a(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_c1').text())){$('#'+id).val(parseFloat($('#1total_c1').text()));}
}
function su_pago_i(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_i').text())){$('#'+id).val(parseFloat($('#1total_i').text()));}
}
function su_pago_l(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_l').text())){$('#'+id).val(parseFloat($('#1total_l').text()));}
}
function su_pago_p(v,id){
	if(parseFloat(v)=='' || parseFloat(v)<0){$('#'+id).val(0);} if(!parseFloat(v)){if(parseFloat(v)==''){}else{$('#'+id).val('');}}
	if(parseFloat(v)>parseFloat($('#1total_p').text())){$('#'+id).val(parseFloat($('#1total_p').text()));}
}
</script>