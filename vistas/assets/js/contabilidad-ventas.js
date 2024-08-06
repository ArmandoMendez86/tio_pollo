/*=============================================
	TABLA PARA CONTABILIZAR VENTAS
	=============================================*/
$(".contabilidadVentas").DataTable({
  ajax: "ajax/datatable_contabilidad_ventas.ajax.php",
  language: {
    url: "vistas/assets/js/mx.json",
  },
  order: [[0, "desc"]],
});
