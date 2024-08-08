<!-- Sub Header -->
<div class="sub-header">
    <div class="container text-center">
        <h1>ORDENES PENDIENTES</h1>
    </div>
</div>
<!-- Sub Header End -->

<!-- Main -->
<main>

    <div class="container bootstrap snippets bootdeys">
        <div class="row justify-content-around">

            <?php

            $item = null;
            $valor = null;
            $pendientes = ControladorPedidos::ctrMostrarPendientes($item, $valor);

            foreach ($pendientes as $key => $pendiente) {

                echo '<div class="content-card">
                        <div class="card-big-shadow">
                        <div class="card card-just-text" data-background="color" data-color="yellow" data-radius="none">
                    <div class="content">';

                $productos = json_decode($pendiente["productos"]);

                echo '<h6 class="category"> Orden N°. ' . $pendiente["n_orden"] . '</h6>
                        <h6 class="title"><a href="#">' . $pendiente["cliente"] . '</a></h6>';


                foreach ($productos as $key => $value) {

                    echo '<p class="description">' . $value->productos . ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' . $value->cantidad . '</p>';
                }

                echo ' </div></div></div></div>';
            }

            ?>

        </div>
    </div>


</main>
<!-- Main End -->