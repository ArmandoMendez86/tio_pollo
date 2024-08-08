/*=============================================
	TABLA PARA CONTABILIZAR VENTAS
	=============================================*/
$(".contabilidadVentas").DataTable({
  ajax: "ajax/datatable_contabilidad_ventas.ajax.php",
  language: {
    url: "vistas/assets/js/mx.json",
  },
  order: [[9, "desc"]],

  footerCallback: function (row, data, start, end, display) {
    let api = this.api();
    let total = api
      .column(7, {
        page: "current",
      })
      .data()
      .reduce(function (a, b) {
        return parseFloat(a) + parseFloat(b);
      }, 0);
    let api2 = this.api();
    let total2 = api2
      .column(8, {
        page: "current",
      })
      .data()
      .reduce(function (a, b) {
        return parseFloat(a) + parseFloat(b);
      }, 0);

    $(api.column(6).footer()).html("TOTALES");
    $(api.column(7).footer()).html(
      "<p style='width:7rem;margin:0 auto;font-size:1rem'>" +
        total.toFixed(2) +
        "</p>"
    );
    $(api2.column(8).footer()).html(
      "<p style='width:7rem;margin:0 auto;font-size:1rem'><i class='fa fa-usd text-white mr-2' aria-hidden='true'></i>" +
        total2.toFixed(2) +
        "</p>"
    );
  },
});
