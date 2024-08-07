<!-- Sub Header -->
<div class="sub-header">
    <div class="container text-center">
        <h1>ORDENES PENDIENTES</h1>
    </div>
</div>
<!-- Sub Header End -->

<!-- Main -->
<main>


    <?php

    $item = null;
    $valor = null;
    $pendientes = ControladorPedidos::ctrMostrarPendientes($item, $valor);


    foreach ($pendientes as $key => $pendiente) {

        $productos = json_decode($pendiente["productos"]);

        foreach ($productos as $key => $value) {

            echo ' 
                    <div id="#orderSummarySte" class="col-6">
                    <div class="order-header mt-5">
                    
                    <h3>' . $pendiente["n_orden"] . '</h3>
                    </div>
                    <div class="order-body">
                        <!-- Cart Items -->
                        <div class="row">
                            <div>
                                <div class="order-list">
                                    <ul id="itemList">
                                
                    <li id="cartItem' . $key . '">
                                <div class="order-list-img" idproducto="6" idespecialidad="1"><img src="vistas/assets/img/gallery/grid-items-small/generica.jpg" alt=""></div>
                                <div class="order-list-details">
                                    <h4>' . $value->productos . '</h4>
                                    <div class="qty-buttons"> <input type="button" value="+" class="qtyplus" name="plus"> <input type="text" name="qty" value="1" class="qty form-control"> <input type="button" value="-" class="qtyminus" name="minus"> </div>
                                    <div class="order-list-price format-price">$ 230.00</div>
                                    <div class="order-list-delete"><a href="javascript:;" id="deleteCartItem6"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                                </div>
                    </li>';
        }

        echo '</ul></div></div></div>';
    }

    ?>




</main>
<!-- Main End -->