/*=============================================
	TABLA PARA EXPEDIR NOTAS DE COMPRA
	=============================================*/
$(".reciboVentas").DataTable({
  ajax: "ajax/datatable_recibos.ajax.php",
  language: {
    url: "vistas/assets/js/mx.json",
  },
  order: [[3, "desc"]],
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
    {
      data: "status",
      render: function (data, type, row) {
        if (data == "pagado") {
          return `<span class="badge badge-success">${data}</span>`;
        } else {
          return `<span class="badge badge-danger">${data}</span>`;
        }
      },
    },
    {
      data: null,
      className: "dt-center",
      defaultContent:
        '<button class="btn btn-print"><i class="fa fa-print" aria-hidden="true"></i></button><button class="btn btn-editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>',
      orderable: false,
    },
  ],
  columnDefs: [
    { targets: 0, className: "text-center" },
    { targets: 2, className: "text-center" },
    { targets: 3, className: "text-center" },
    { targets: 4, className: "text-center" },
    { targets: 6, className: "text-center" },
    { targets: 7, className: "text-center" },
    { targets: 0, className: "align-middle" },
    { targets: 2, className: "align-middle" },
    { targets: 3, className: "align-middle" },
    { targets: 4, className: "align-middle" },
    { targets: 5, className: "align-middle" },
    { targets: 6, className: "align-middle" },
    { targets: 7, className: "align-middle" },
    { targets: 8, className: "align-middle" },
  ],
});

// Manejo del evento click en el botón
$(".reciboVentas tbody").on("click", ".btn-editar", function () {
  var data = $(".reciboVentas").DataTable().row($(this).parents("tr")).data();
  console.log(data.n_orden);
  return;
  alert("Botón de acción clickeado para el ID: " + data.id);
  // Aquí puedes agregar el código para la acción que quieras realizar
});
