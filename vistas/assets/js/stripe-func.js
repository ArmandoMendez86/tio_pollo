var stripeKey = document.querySelector("#personalData").dataset.consumerKey;
var createOrderUrl =
  document.querySelector("#personalData").dataset.createOrderUrl;
var returnUrl = document.querySelector("#personalData").dataset.returnUrl;
var currency = document.querySelector("#personalData").dataset.currency;

function confirmGuestOrder(event) {
  event.preventDefault();
  var valid = formValidate();

  if (valid) {
    let itemsArray = [];
    let numeroOrden = $("#numeroOrden").text();

    $("#itemList li").each(function (index) {
      let idProducto = $(this).find(".order-list-img").attr("idProducto");
      let idEspecialidad = $(this)
        .find(".order-list-img")
        .attr("idEspecialidad");
      let cantidad = $(this).find("input[name=qty]").val();

      itemsArray.push({
        id_producto: idProducto,
        id_especialidad: idEspecialidad,
        cantidad: cantidad,
        descuento: 0,
        n_orden: numeroOrden,
        id_empleado: 1,
      });
    });

    $("#submitPayment").html("Processing...").css("text-align", "left");
    $(".spinner-icon").show();

    let datos = new FormData();
    datos.append("items", JSON.stringify(itemsArray));
    datos.append(
      "nombre",
      document.getElementById("userNameOnlinePayment").value
    );
    datos.append(
      "telefono",
      document.getElementById("phoneOnlinePayment").value
    );

    $.ajax({
      url: "ajax/menu.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#submitPayment").html("Orden registrada!");
        $(".spinner-icon").hide();
        /*   $('button[name="submit"]').css("background-color", "#ffa700");
        $('button[name="submit"]').css("color", "#000");
 */
        setTimeout(() => {
          window.location = "venta";
        }, 1000);
      },
    });

    /* $.ajax({
      contentType: "application/json",
      url: createOrderUrl,
      type: "POST",
      data: JSON.stringify({
        items: [itemsArray],
        email: document.getElementById("emailOnlinePayment").value,
        name: document.getElementById("userNameOnlinePayment").value,
        phone: document.getElementById("phoneOnlinePayment").value,
        address: document.getElementById("addressOnlinePayment").value,
        message: document.getElementById("messageOnlinePayment").value,

        totalAmount: totalAmt,
        shippingTotal: shippingPrice,
        currency: currency,
      }),
      success: function (data) {
        if (data != "error") {
          stripe
            .redirectToCheckout({
              sessionId: data,
            })
            .then(function (result) {
              console.log(result.error.message);
            });
        } else {
          console.log("Unable to create a checkout session. Please try again.");
          $("#submitPayment").html("Submit");
          $(".spinner-icon").hide();
        }
      },
    }); */
  }
}

function formValidate() {
  var name = $("#userNameOnlinePayment").parsley();
  var phone = $("#phoneOnlinePayment").parsley();
  var email = $("#emailOnlinePayment").parsley();
  var address = $("#addressOnlinePayment").parsley();
  var message = $("#messageOnlinePayment").parsley();

  if (!name.isValid() || !phone.isValid()) {
    return false;
  }
  return true;
}

/*
 !email.isValid() ||
    !address.isValid() ||
    !message.isValid()

*/
