(function ($) {
  "use strict";

  // =====================================================
  // PRELOADER
  // =====================================================
  $(window).on("load", function () {
    "use strict";
    $('[data-loader="circle-side"]').fadeOut();
    $("#preloader").delay(250).fadeOut("slow");
    var $hero = $(".hero-home .content");
    var $hero_v = $("#hero_video .content ");
    $hero.find("h3, p, form").addClass("fadeInUp animated");
    $hero.find(".btn-1").addClass("fadeIn animated");
    $hero_v.find(".h3, p, form").addClass("fadeInUp animated");
    $(window).scroll();
  });

  // =====================================================
  // SCROLL ANIMATIONS
  // =====================================================
  window.sr = ScrollReveal();

  sr.reveal(".animated-element", {
    interval: 300,
    distance: "250px",
  });

  // =====================================================
  // LAZY LOAD
  // =====================================================
  if ($(".lazy").length > 0) {
    new LazyLoad({
      elements_selector: ".lazy",
    });
  }

  // =====================================================
  // BACK TO TOP BUTTON
  // =====================================================
  function scrollToTop() {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      500,
      "easeInOutExpo"
    );
  }

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      $("#toTop").fadeIn("slow");
    } else {
      $("#toTop").fadeOut("slow");
    }
  });

  $("#toTop").on("click", function () {
    scrollToTop();
    return false;
  });

  // =====================================================
  // NAVBAR
  // =====================================================
  $(window).on("scroll load", function () {
    if ($(window).scrollTop() >= 1) {
      $(".main-header").addClass("active");
    } else {
      $(".main-header").removeClass("active");
    }
  });

  // Sticky nav
  $(".sticky-nav").stick_in_parent({
    offset_top: 0,
  });

  // =====================================================
  // STICKY SIDEBAR SETUP
  // =====================================================
  $("#mainContent, #sidebar").theiaStickySidebar({
    additionalMarginTop: 90,
    updateSidebarHeight: false,
  });

  // =====================================================
  // WIZARD STEPS
  // =====================================================

  $("#sidebar").wizard({
    stepsWrapper: "#orderContainer",
    submit: ".submit",

    // Prevent moving forward if total is zero
    beforeForward: function (event, state) {
      if ($(".total").val() == "$ 0.00") {
        validateTotal();
        return false; // prevent moving forward
      }
    },

    // Reset validation and remove error notifications from the form
    beforeBackward: function (event, state) {
      $("#orderForm").parsley().reset();
      $("ul.parsley-errors-list").not(":has(li)").remove();
    },
  });

  // Go to "Order Summary" step if "Modify Order" is clicked
  $(".modify-order").on("click", function () {
    $("#sidebar").wizard("select", "#orderSummaryStep");
  });

  // =====================================================
  // ISOTOPE
  // =====================================================
  if ($(".isotope-item").length > 0) {
    // Quick search regex
    var qsRegex;
    var filterValue;

    // Init Isotope
    var $grid = $(".grid").isotope({
      itemSelector: ".isotope-item",
      filter: function () {
        var $this = $(this);
        var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
        var selectResult = filterValue ? $this.is(filterValue) : true;
        return searchResult && selectResult;
      },
    });

    // Bind filter on select change
    $("#category").on("change", function () {
      // Get filter value from option value
      filterValue = $(this).val();
      $grid.isotope();
    });

    // Use value of search field to filter
    var $quicksearch = $("#search").keyup(
      debounce(function () {
        qsRegex = new RegExp($quicksearch.val(), "gi");
        $grid.isotope();
      })
    );

    // Debounce so filtering doesn't happen every millisecond
    function debounce(fn, threshold) {
      var timeout;
      return function debounced() {
        if (timeout) {
          clearTimeout(timeout);
        }
        function delayed() {
          fn();
          timeout = null;
        }
        setTimeout(delayed, threshold || 100);
      };
    }

    // Reset filters
    $(".isotope-reset").on("click", function () {
      qsRegex = "";
      filterValue = "";

      $("#search").val("");
      $("#category").prop("selectedIndex", 0).niceSelect("update");

      $grid.isotope();
    });
  }

  // =====================================================
  // MOBILE MENU
  // =====================================================
  var $menu = $("nav#menu").mmenu(
    {
      extensions: ["pagedim-black", "theme-white"], // "theme-dark" can be changed to: "theme-dark"
      counters: true,
      keyboardNavigation: {
        enable: true,
        enhance: true,
      },
      navbar: {
        title: "MENU",
      },
      navbars: [
        {
          position: "bottom",
          content: ['<a href="#">© 2021 FoodBoard</a>'],
        },
      ],
    },
    {
      // configuration
      clone: true,
    }
  );
  var $icon = $("#hamburger");
  var API = $menu.data("mmenu");
  $icon.on("click", function () {
    API.open();
  });
  API.bind("open:finish", function () {
    setTimeout(function () {
      $icon.addClass("is-active");
    }, 100);
  });
  API.bind("close:finish", function () {
    setTimeout(function () {
      $icon.removeClass("is-active");
    }, 100);
  });

  // =====================================================
  // NICE SCROLL
  // =====================================================
  var position;

  $("a.nice-scroll").on("click", function (e) {
    e.preventDefault();
    position = $($(this).attr("href")).offset().top - 125;
    $("body, html").animate(
      {
        scrollTop: position,
      },
      500,
      "easeInOutExpo"
    );
  });

  $("#stickyNavItems a.sticky-nice-scroll").on("click", function (e) {
    e.preventDefault();
    position = $($(this).attr("href")).offset().top - 85;
    $("body, html").animate(
      {
        scrollTop: position,
      },
      500,
      "easeInOutExpo"
    );
  });

  // =====================================================
  // FAQ ACCORDION
  // =====================================================
  function toggleChevron(e) {
    $(e.target)
      .prev(".card-header")
      .find("i.indicator")
      .toggleClass("icon-minus icon-plus");
  }
  $(".faq-accordion").on("hidden.bs.collapse shown.bs.collapse", toggleChevron);

  // =====================================================
  // GALLERY
  // =====================================================
  $(".menu-gallery").each(function () {
    $(this).magnificPopup({
      delegate: "figure a",
      type: "image",
      preloader: true,
      gallery: {
        enabled: true,
      },
    });
  });

  // =====================================================
  // MODAL
  // =====================================================
  function resetModalOptions() {
    $(':radio[value="Medium: 32cm"]').prop("checked", true);
    $(".modal-popup .inp-cbx").prop("checked", false);
  }

  $(".modal-opener").magnificPopup({
    type: "inline",
    fixedContentPos: true,
    fixedBgPos: true,
    closeOnBgClick: false,
    overflowY: "auto",
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    closeMarkup: "",
    mainClass: "my-mfp-zoom-in",
    callbacks: {
      close: function () {
        resetModalOptions();
      },
    },
  });

  $(".btn-modal-close").on("click", function () {
    $.magnificPopup.close();
  });

  $(".modal-opener").on("click", function (e) {
    let id = $(this).parent().parent().parent().parent().attr("id");
    let idItem = $("#modalOptionsItem").attr("idItem", id);
    let datos = new FormData();
    datos.append("especialidades", "ok");

    $.ajax({
      url: "ajax/menu.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        let template = "";
        respuesta.forEach((element) => {
          template += `
			
			<div class="row">
			<div class="col-md-12 col-sm-12">
				<label class="cbx radio-wrapper">
					<input type="radio" value="${element.id}" name="size-options-item-${id}">
					<span class="checkmark"></span>
					<span class="radio-caption">${element.sabor}</span>
				</label>
			</div>
		</div>
			
			`;
        });

        $("#especialidades").html(template);
      },
    });
  });

  // =====================================================
  // INIT DROPDOWNS
  // =====================================================
  $("#category").niceSelect();

  // =====================================================
  // FORM LABELS
  // =====================================================
  new FloatLabels("#orderForm", {
    style: 1,
  });

  // =====================================================
  // FORM INPUT VALIDATION
  // =====================================================

  // Quantity inputs
  $(".qty-input").on("keypress", function (event) {
    if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
      event.preventDefault();
    }
  });

  // Add custom empty order validation
  window.Parsley.addValidator("emptyOrder", {
    validateString: function (value) {
      return value !== "$ 0.00";
    },
    messages: {
      en: "Orden vacia!.",
    },
  });

  // Clear parsley empty elements
  if ($("#orderForm").length > 0) {
    $("#orderForm")
      .parsley()
      .on("field:success", function () {
        $("ul.parsley-errors-list").not(":has(li)").remove();
      });
  }

  // =====================================================
  // HELPER FUNCTIONS
  // =====================================================

  // Function to format item prices usign priceFormat plugin
  function formatPrice() {
    $(".format-price").priceFormat({
      prefix: "$ ",
      centsSeparator: ".",
      thousandsSeparator: ",",
    });
  }

  // Function to reset total price
  function resetTotal() {
    $(".totalTitle").val("Total");
    $(".total").val("0.00");
    formatPrice();
  }

  // Function to call warning popup
  function callWarningPopup(popupId) {
    $.magnificPopup.open({
      items: {
        src: popupId,
      },
      type: "inline",
      fixedContentPos: false,
      fixedBgPos: true,
      closeOnBgClick: false,
      overflowY: "auto",
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      closeMarkup:
        '<button title="%title%" type="button" class="mfp-close"></button>',
      mainClass: "my-mfp-zoom-in",
    });
  }

  // Function to show a popup essage that item is added to cart
  function showItemAddedMessage() {
    // Only show this message when there is no popup opened
    if (!$.magnificPopup.instance.isOpen) {
      // Show added to cart message
      $(".addedToCartMsg").fadeIn("slow", function () {
        $(".addedToCartMsg").fadeOut();
      });
    } else if ($.magnificPopup.instance.isOpen) {
      // Only show this message when a popup is opened
      $(".addedToCartMsgInModal").fadeIn("slow", function () {
        $(".addedToCartMsgInModal").fadeOut();
      });
    }
  }

  // Function to show a popup essage that item is added to cart
  function showItemAlreadyInCartMessage() {
    // Only show this message when there is no popup opened
    if (!$.magnificPopup.instance.isOpen) {
      // Show already in cart message
      $(".alreadyInCartMsg").fadeIn("slow", function () {
        $(".alreadyInCartMsg").fadeOut();
      });
    } else if ($.magnificPopup.instance.isOpen) {
      // Only show this
      // message when a popup
      // is opened
      $(".alreadyInCartMsgInModal").fadeIn("slow", function () {
        $(".alreadyInCartMsgInModal").fadeOut();
      });
    }
  }

  // Function to validate total price
  function validateTotal() {
    $("#totalOrderSummary").parsley().validate();
  }

  // =====================================================
  // CART FUNCTIONS
  // =====================================================
  var id = "";
  var rowId = "";
  var size = "";
  var thumbnailPath = "";
  var itemTitle = "";
  var description = "";
  var itemPrice = "";
  var extraTitle = "";
  var extraPrice = "";
  var extraIsChecked = false;
  var qtyInput = 0;
  var actualQty = 0;
  var maxQty = 10;
  var subSum = 0;
  var deliveryFee = 10;
  var total = 0;

  // Function to set empty cart image
  function setEmptyCart() {
    // Create the dedicated row for the empty cart element
    $("#itemList").append('<li id="emptyCart"></li>');

    // Fill the dedicated row
    $("#emptyCart").html(
      '<div class="order-list-img"><img src="vistas/assets/img/bg/lazy-placeholder.jpg" alt="Your cart is empty"/></div><div class="order-list-details"> <h4>Orden vacia!</a><br/><small>Agrega alimentos</small></h4> <div class="order-list-price format-price">0.00</div></div>'
    );
    formatPrice();
  }

  // Function to check if the cart is empty
  function isCartEmpty() {
    if ($("ul#itemList li").length == 0) {
      return true;
    }
  }

  // Function to update sub summary
  function updateSubSum(id, rowId, itemPrice, actualQty) {
    // Calculate subSum
    subSum = itemPrice * 1 * (actualQty * 1);

    // Update subSum
    $("#cartItem" + id + rowId + " .order-list-details .order-list-price").text(
      subSum.toFixed(2)
    );
  }

  // Function to update total summary
  function updateTotal() {
    total = 0;

    // Update total with prices in order list
    $(".order-list-price").each(function () {
      total +=
        $(this)
          .text()
          .match(/[0-9.]+/g) * 1;
    });
    //Add delivery fee
    total = total + deliveryFee * 1;

    // Set total
    $(".total").val(total.toFixed(2));
    $(".totalValue").text(total.toFixed(2));

    // If cart is empty do not calculate any cost
    if ($("ul#itemList li#emptyCart").length > 0) {
      total = 0;
      $(".total").val(total.toFixed(2));
      $(".totalValue").text(total.toFixed(2));
    }

    formatPrice();
  }

  // Function to insert item into its dedicated cart row based on: id, rowId, itemSubtitle, thumbnailPath, itemTitle, extraTitle, itemPrice
  function insertItemIntoCartRow(
    id,
    rowId,
    itemSubtitle,
    thumbnailPath,
    itemTitle,
    extraTitle,
    itemPrice,
    size
  ) {
    // Create the dedicated row for the cart element
    $("#itemList").append('<li id="cartItem' + id + rowId + '"></li>');

    // Insert item into its dedicated row in the cart
    $("#cartItem" + id + rowId).html(
      '<div class="order-list-img" idProducto="'+id+'" idEspecialidad="'+size +'"><img src="' +
        thumbnailPath +
        '" alt=""></div><div class="order-list-details"><h4>' +
        itemTitle +
        "<br/> <small>" +
        itemSubtitle +
        " " +
        extraTitle +
        '</small> </h4> <div class="qty-buttons"> <input type="button" value="+" class="qtyplus" name="plus"> <input type="text" name="qty" value="1" class="qty form-control"> <input type="button" value="-" class="qtyminus" name="minus"> </div><div class="order-list-price format-price">' +
        itemPrice.toFixed(2) +
        '</div><div class="order-list-delete"><a href="javascript:;" id="deleteCartItem' +
        id +
        rowId +
        '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></div>'
    );

    // Handle if an added item will be deleted
    $("#deleteCartItem" + id + rowId).on("click", function () {
      // Fade out the deleted item
      $("#cartItem" + id + rowId).fadeOut("slow", function () {
        // Remove item from cart
        $("#cartItem" + id + rowId).remove();

        // Handle if cart is empty
        if (isCartEmpty()) {
          setEmptyCart();
        }

        // Update total
        updateTotal();
      });
    });

    // Handle qty plus
    $(
      "#cartItem" + id + rowId + " .order-list-details .qty-buttons .qtyplus"
    ).on("click", function () {
      qtyInput = $(this).parent(".qty-buttons").find(".qty");
      actualQty = parseInt(qtyInput.val(), 10);

      // If qty number is less than the max.limit
      if (actualQty < maxQty) {
        // Increment
        qtyInput.val(actualQty + 1);
        actualQty = qtyInput.val();

        // Update subSum
        updateSubSum(id, rowId, itemPrice, actualQty); // actualQty is the increased value

        // Update total
        updateTotal();
      } else {
        // Warning popup
        callWarningPopup("#modalWarningQtyMaxLimit");
      }
    });

    // Handle qty minus
    $(
      "#cartItem" + id + rowId + " .order-list-details .qty-buttons .qtyminus"
    ).on("click", function () {
      qtyInput = $(this).parent(".qty-buttons").find(".qty");
      actualQty = parseInt(qtyInput.val(), 10);

      if (actualQty > 1) {
        // Decrement
        qtyInput.val(actualQty - 1);
        actualQty = qtyInput.val();

        // Update subSum
        updateSubSum(id, rowId, itemPrice, actualQty); // actualQty is the decreased value

        // Calculate total
        updateTotal();
      } else {
        // Warning popup
        callWarningPopup("#modalWarningQtyMinLimit");
      }
    });

    // Validation of quantity inputs: min and max limit handling on keyup
    $("#cartItem" + id + rowId + " .order-list-details .qty-buttons .qty").on(
      "keyup",
      function () {
        // If qty number is more than the max.limit
        if ($(this).val() > maxQty) {
          // Warning popup
          callWarningPopup("#modalWarningQtyMaxLimit");

          // Set max limit into input
          $(this).val(maxQty);

          // Update subSum
          updateSubSum(id, rowId, itemPrice, maxQty); // actualQty is the maxQty

          // Update total
          updateTotal();
        } else if ($(this).val() < 1) {
          // If qty number is less
          // than the min.limit

          // Warning popup
          callWarningPopup("#modalWarningQtyMinLimit");

          // Set min limit into input
          $(this).val(1);

          // Update subSum
          updateSubSum(id, rowId, itemPrice, 1); // actualQty is
          // 1

          // Update total
          updateTotal();
        } else {
          // Get actual quantity
          actualQty = parseInt($(this).val(), 10);

          // Update subSum
          updateSubSum(id, rowId, itemPrice, actualQty); // actualQty is the retrieved qty

          // Update total
          updateTotal();
        }
      }
    );

    // Validation of quantity inputs: exclude letters and spec chars on keypress
    $(".qty").on("keypress", function (event) {
      if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
        event.preventDefault();
      }
    });

    // Update total
    updateTotal();

    // Show item is added into the cart message
    showItemAddedMessage(id);
  }

  // Function to add item into cart
  function addOptionsItemToCart(id) {
    // Remove empty cart image and notifications
    $("#emptyCart").remove();

    // Collect item data
    size = $('input[name="size-options-item-' + id + '"]:checked').val();

    itemTitle = $("#" + id + " .item-title h3").text();
    let itemPrice = $("#" + id + " .item-price").text();
    let itemPorcion = $("#" + id + " .ribbon-size span").text();

    itemPrice = itemPrice.match(/[0-9.]+/g) * 1;
    thumbnailPath = "vistas/assets/img/gallery/grid-items-small/generica.jpg";

    // Capture row where the item will be inserted
    if (size == "1") {
      // If extra is NOT checked

      let itemSubtitle = "Natural";

      rowId = "N";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "2") {
      // If extra is NOT checked

      let itemSubtitle = "Habanero";

      rowId = "H";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "3") {
      // If extra is NOT checked

      let itemSubtitle = "Adobado";

      rowId = "A";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "4") {
      // If extra is NOT checked

      let itemSubtitle = "Enchilado";

      rowId = "E";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "5") {
      // If extra is NOT checked

      let itemSubtitle = "BBQ";

      rowId = "B";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "6") {
      // If extra is NOT checked

      let itemSubtitle = "BBQ Picante";

      rowId = "BP";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "7") {
      // If extra is NOT checked

      let itemSubtitle = "Piña habanero";

      rowId = "PH";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "8") {
      // If extra is NOT checked

      let itemSubtitle = "Mango habanero";

      rowId = "MH";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "9") {
      // If extra is NOT checked

      let itemSubtitle = "Tamarindo chipotle";

      rowId = "TC";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
    if (size == "10") {
      // If extra is NOT checked

      let itemSubtitle = "A la mayonesa";

      rowId = "MS";
      extraTitle = itemPorcion;

      // Check if item already exists in cart or not
      if ($("#cartItem" + id + rowId).length > 0) {
        showItemAlreadyInCartMessage();
      } else {
        // If not: put it into the cart

        insertItemIntoCartRow(
          id,
          rowId,
          itemSubtitle,
          thumbnailPath,
          itemTitle,
          extraTitle,
          itemPrice,
          size
        );
      }
    }
  }

  // Function to add item into cart
  function addItemToCart(id) {
    // Remove empty cart image and notifications
    $("#emptyCart").remove();

    // Collect and set item data
    let rowId = "";
    let extraTitle = "";
    let description = $("#" + id + " .item-title small").text();

    let size = "1";

    let itemTitle = $("#" + id + " .item-title h3").text();
    let itemPrice = $("#" + id + " .item-price").text();
    itemPrice = itemPrice.match(/[0-9.]+/g) * 1; // Find digits, dot and convert to number

    //thumbnailPath = "../img/gallery/grid-items-small/" + id + ".jpg";
    thumbnailPath = "vistas/assets/img/gallery/grid-items-small/generica.jpg";

    // Check if item already exists in cart or not
    if ($("#cartItem" + id + rowId).length > 0) {
      showItemAlreadyInCartMessage();
    } else {
      // If not: put it into the cart

      insertItemIntoCartRow(
        id,
        rowId,
        description,
        thumbnailPath,
        itemTitle,
        extraTitle,
        itemPrice,
		size
      );
    }
  }

  function generarIdVenta() {
    const randomPart = Math.floor(Math.random() * 1000)
      .toString()
      .padStart(3, "0");

    const timePart = Date.now().toString().slice(-2);
    const numeroOrden = randomPart + timePart;

    $("#numeroOrden").text(numeroOrden);
  }

  // Item having options is added to cart
  $(".add-options-item-to-cart").on("click", function () {
    generarIdVenta();
    //let id = $(this).parent().parent().parent().parent().attr("id");
    let idItem = $("#modalOptionsItem").attr("idItem");
    addOptionsItemToCart(idItem);
    validateTotal();
  });

  // Pure item without options is added to cart
  $(".add-item-to-cart").on("click", function () {
    generarIdVenta();
    let id = $(this).parent().parent().parent().parent().attr("id");
    addItemToCart(id);
    validateTotal();
  });

  setEmptyCart();
  resetTotal();
})(window.jQuery);
