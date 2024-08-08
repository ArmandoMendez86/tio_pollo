/*=============================================
	TABLA PARA EXPEDIR NOTAS DE COMPRA
	=============================================*/
$(".reciboVentas").DataTable({
  ajax: "ajax/datatable_recibos.ajax.php",
  language: {
    url: "vistas/assets/js/mx.json",
  },
  columns: [
    { data: "id" },
    {
      data: "productos",
      render: function (data, type, row) {
        try {
          var productos = JSON.parse(data);
          return productos
            .map(
              (item) =>
                `${item.productos} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> (Cantidad: ${item.cantidad})`
            )
            .join("<br>");
        } catch (e) {
          return data;
        }
      },
    },
    { data: "n_orden" },
    { data: "fecha" },
    { data: "metodo_pago" },
    { data: "cliente" },
    { data: "telefono" },
    { data: "status" },
    {
      data: null,
      className: "dt-center",
      defaultContent:
        '<button class="btn btn-success btn-action"><i class="fa fa-print" aria-hidden="true"></i></button>',
      orderable: false,
    },
  ],
});
