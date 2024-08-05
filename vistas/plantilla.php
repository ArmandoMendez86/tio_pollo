<?php

date_default_timezone_set('America/Mexico_City');
/* session_start(); */

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de pedidos del Tio pollo">
    <meta name="author" content="UWS">
    <title>Pedidos | Tio pollo</title>
    <!-- Favicon -->
    <link href="vistas/assets/img/favicon.png" rel="shortcut icon">

    <!-- Google Fonts - Jost -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Font Icons -->
    <link href="https://cdn.jsdelivr.net/npm/iconfont@0.4.1/+esm" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vistas/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vistas/assets/vendor/dmenu/css/menu.css" rel="stylesheet">
    <link href="vistas/assets/vendor/hamburgers/css/hamburgers.min.css" rel="stylesheet">
    <link href="vistas/assets/vendor/mmenu/css/mmenu.min.css" rel="stylesheet">
    <link href="vistas/assets/vendor/magnific-popup/css/magnific-popup.css" rel="stylesheet">
    <link href="vistas/assets/vendor/float-labels/css/float-labels.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="vistas/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="page">

        <?php

        /*=============================================
        CABEZOTE
        =============================================*/
        include "modulos/cabezote.php";

        /*=============================================
        CONTENIDO
        =============================================*/

        if (isset($_GET["ruta"])) {

            if (
                $_GET["ruta"] == "venta" ||
                $_GET["ruta"] == "reportes" ||
                $_GET["ruta"] == "salir"
            ) {

                include "modulos/" . $_GET["ruta"] . ".php";
            } else {

                include "modulos/404.php";
            }
        } else {

            include "modulos/inicio.php";
        }


        include "modulos/footer.php";



        ?>







        <!--=====================================
        PLUGINS DE JAVASCRIPT
        ======================================-->
        <!-- Vendor Javascript Files -->
        <script src="vistas/assets/vendor/jquery/jquery.min.js"></script>
        <script src="vistas/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vistas/assets/vendor/easing/js/easing.min.js"></script>
        <script src="vistas/assets/vendor/parsley/js/parsley.min.js"></script>
        <script src="vistas/assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vistas/assets/vendor/price-format/js/jquery.priceformat.min.js"></script>
        <script src="vistas/assets/vendor/theia-sticky-sidebar/js/ResizeSensor.min.js"></script>
        <script src="vistas/assets/vendor/theia-sticky-sidebar/js/theia-sticky-sidebar.min.js"></script>
        <script src="vistas/assets/vendor/mmenu/js/mmenu.min.js"></script>
        <script src="vistas/assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="vistas/assets/vendor/float-labels/js/float-labels.min.js"></script>
        <script src="vistas/assets/vendor/jquery-wizard/js/jquery-ui-1.8.22.min.js"></script>
        <script src="vistas/assets/vendor/jquery-wizard/js/jquery.wizard.js"></script>
        <script src="vistas/assets/vendor/isotope/js/isotope.pkgd.min.js"></script>
        <script src="vistas/assets/vendor/scrollreveal/js/scrollreveal.min.js"></script>
        <script src="vistas/assets/vendor/lazyload/js/lazyload.min.js"></script>
        <script src="vistas/assets/vendor/sticky-kit/js/sticky-kit.min.js"></script>

        <!-- Stripe Javascript Files -->
        <script src="https://js.stripe.com/v3/"></script>
        <script src="vistas/assets/js/stripe-func.js"></script>

        
        
        <!-- Main Javascript File -->
        <script src="vistas/assets/js/venta.js"></script>


    </div>
</body>

</html>