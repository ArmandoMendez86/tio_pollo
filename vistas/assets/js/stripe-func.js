var stripeKey = document.querySelector("#personalData").dataset.consumerKey;
var createOrderUrl =
  document.querySelector("#personalData").dataset.createOrderUrl;
var returnUrl = document.querySelector("#personalData").dataset.returnUrl;
var currency = document.querySelector("#personalData").dataset.currency;
var stripe = Stripe(stripeKey);
var elements = stripe.elements();

function confirmGuestOrder(event) {
  event.preventDefault();
  var valid = formValidate();

  if (valid) {
    let itemsArray = [];
    let shippingPrice = $(".transfer").text();
    shippingPrice = shippingPrice.replace("$", "");
    let totalAmt = $("#totalOrderSummary").val();
    totalAmt = totalAmt.replace("$", "");

    $("#itemList li").each(function (index) {
      let imagePath = $(this).find(".order-list-img img").attr("src");
      let idProducto = $(this).find(".order-list-img").attr("idProducto");
      let idEspecialidad = $(this)
        .find(".order-list-img")
        .attr("idEspecialidad");

      let title = $(this).find(".order-list-details h4").html();
      let quantity = $(this).find("input[name=qty]").val();
      let itemTotalPrice = $(this).find(".order-list-price").text();
      itemTotalPrice = itemTotalPrice.match(/[0-9.]+/g) * 1;
      let itemPrice = itemTotalPrice / quantity;
      let arr = title.split("<br>");
      let productName = arr[0];

      itemsArray.push({
        id_producto: idProducto,
        id_especialidad: idEspecialidad,
        cantidad: quantity,
        descuento: 0,
      });
    });

    $("#submitPayment").html("Processing...").css("text-align", "left");
    $(".spinner-icon").show();

    let datos = new FormData();
    datos.append("items", JSON.stringify(itemsArray));
    $.ajax({
      url: "ajax/menu.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log(respuesta);
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

  if (
    !name.isValid() ||
    !phone.isValid() ||
    !email.isValid() ||
    !address.isValid() ||
    !message.isValid()
  ) {
    return false;
  }
  return true;
}
