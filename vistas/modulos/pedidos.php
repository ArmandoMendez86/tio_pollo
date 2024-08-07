   <!-- Sub Header -->
  <div class="sub-header">
      <div class="container text-center">
          <h1>P E D I D O S</h1>
      </div>
  </div>
  <!-- Sub Header End -->
   
   
   
   <!-- Main -->
   <main>
       <!-- Order -->
       <div class="order">
           <!-- Container -->
           <div class="container">
               <!-- Row -->
               <div class="row">
                   <!-- Left Sidebar -->
                   <div class="col-lg-8" id="mainContent">
                       <!-- Filter Area -->
                       <div class="row filter-box filters">
                           <div class="filter-box-header">
                               <h3>Filtros</h3>
                               <span class="filter-box-link isotope-reset">Todos</span>
                           </div>
                           <div class="col-md-6 col-sm-6">
                               <select id="category" class="wide price-list" name="category">
                                   <option value="">Mostrar todos</option>
                                   <option value=".carne">Carnes </option>
                                   <!-- <option value=".pollo">Pollos</option> -->
                                   <option value=".extras">Extras</option>
                               </select>
                           </div>
                           <div class="col-md-6 col-sm-6">
                               <div class="search-wrap">
                                   <input id="search" type="text" class="form-control" placeholder="Buscar..." />
                                   <i class="fa fa-search"></i>
                               </div>
                           </div>
                       </div>
                       <!-- Filter Area End -->
                       <!-- Grid -->
                       <div class="row grid">

                           <?php

                            $item = null;
                            $valor = null;

                            $menu = ControladorMenu::ctrMostrarMenu($item, $valor);

                            foreach ($menu as $key => $value) {

                                $especialidad = $value['producto'] == 'pollo' ? ' <li>
                                <a href="#modalOptionsItem" class="modal-opener">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    Especialidad
                                </a>
                                </li>' : '';

                                $porcion = '';

                                $opciones = $value['producto'] != 'pollo' ? 'add-item-to-cart' : 'd-none';

                                if ($value['porcion'] == '1') {
                                    $porcion = '1';
                                }
                                if ($value['porcion'] == '0.75') {
                                    $porcion = '3/4';
                                }
                                if ($value['porcion'] == '0.50') {
                                    $porcion = '1/2';
                                }
                                if ($value['porcion'] == '0.25') {
                                    $porcion = '1/4';
                                }

                                echo '
                                <div id="' . $value['id'] . '" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 isotope-item ' . $value['categoria'] . '">
                                <div class="item-body">
                                    <figure>
                                        <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/' . $value['img'] . '" class="img-fluid lazy" alt="">
                                        <a href="#modalDetailsItem" class="item-body-link modal-opener">
                                            <div class="item-title">
                                                <h3>' . strtoupper($value['producto']) . '</h3>
                                                <small>' . $value['descripcion'] . '</small>
                                            </div>
                                        </a>
                                        <div class="ribbon-size"><span>' . $porcion . ' ' . strtoupper($value['unidad']) . '</span></div>
                                    </figure>
                                    <ul>
                                        ' . $especialidad . '
                                        <li class="pl-2">
                                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                                            <span class="item-price">$ ' . $value['precio'] . '</span>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="' . $opciones . '"><i class="fa fa-plus text-dark" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

';
                            }

                            ?>


                           <!--  <div id="gridItem01" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item carne">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/carnes/carne_1.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem01" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Aspen</h3>
                                               <small>Bacon, Onion, Mushroom ...</small>
                                           </div>
                                       </a>
                                       <div class="ribbon-size"><span>Size: M</span></div>
                                   </figure>
                                   <ul>
                                       <li>
                                           <a href="#modalOptionsItem01" class=" modal-opener">
                                               <i class="fa fa-bars" aria-hidden="true"></i>
                                               Especialidad
                                           </a>
                                       </li>
                                       <li class="pl-2">
                                           <i class="fa fa-credit-card" aria-hidden="true"></i>
                                           <span class="format-price">8.00</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-options-item-to-cart"><i class="fa fa-plus text-danger" aria-hidden="true"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem02" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  carne">
                               <div class="item-body">
                                   <figure>
                                       <div class="ribbon-discount"><span>- 10%</span></div>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/carnes/carne_2.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem02" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Bolognese</h3>
                                               <small>Ragu, Mozzarella</small>
                                           </div>
                                       </a>
                                       <div class="ribbon-size"><span>Size: M</span></div>
                                   </figure>
                                   <ul>
                                       <li>
                                           <i class="fa fa-bars" aria-hidden="true"></i>
                                           <a href="#modalOptionsItem02" class="item-size modal-opener">Options</a>
                                       </li>
                                       <li class="pl-2">
                                           <i class="fa fa-credit-card" aria-hidden="true"></i>
                                           <span class="item-price format-price">6.80</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-options-item-to-cart"><i class="fa fa-plus text-danger" aria-hidden="true"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem03" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  carne">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/carnes/carne_3.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem03" class="item-body-link modal-opener">
                                           <small class="red">Hot</small>
                                           <div class="item-title">
                                               <h3>Castello</h3>
                                               <small>Bacon, Sausage, Jalapeno ...</small>
                                           </div>
                                       </a>
                                       <div class="ribbon-size"><span>Size: M</span></div>
                                   </figure>
                                   <ul>
                                       <li>
                                           <a href="#modalOptionsItem03" class="item-size modal-opener">Options</a>
                                       </li>
                                       <li>
                                           <span class="item-price format-price">8.65</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-options-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>

                           <div id="gridItem05" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  extra">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/grid-items/15.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem05" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Caesar Salad</h3>
                                               <small>Lettuce, Grilled Chicken ...</small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">5.50</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem06" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  extra">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/grid-items/16.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem06" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Greek Salad</h3>
                                               <small>Tomato, Onion, Olives ... </small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">5.00</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem07" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  extra">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/grid-items/17.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem07" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Grilled Salmon</h3>
                                               <small>With lime and pasta ...</small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">9.00</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                          
                           <div id="gridItem08" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item  extra">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/grid-items/18.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem08" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Sushi</h3>
                                               <small>Rice, Soy Sauce ... </small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">9.50</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem09" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item pollo">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/pollos/pollo_1.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem09" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Beef Burger</h3>
                                               <small>Bacon, Cucumber, Cheese ...</small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">9.20</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           
                           <div id="gridItem10" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item pollo">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/pollos/pollo_2.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem10" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Big Beef Burger</h3>
                                               <small>Double Meat, Bacon, Cheese ... </small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">10.00</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                         
                           <div id="gridItem11" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item pollo">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/pollos/pollo_3.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem11" class="item-body-link modal-opener">
                                           <div class="item-title">
                                               <h3>Chicken Burger</h3>
                                               <small>Double Cheese, Tomato ... </small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">8.70</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                          
                           <div id="gridItem12" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 isotope-item pollo">
                               <div class="item-body">
                                   <figure>
                                       <img src="vistas/assets/img/bg/lazy-placeholder.jpg" data-src="vistas/assets/img/gallery/pollos/pollo_4.jpg" class="img-fluid lazy" alt="">
                                       <a href="#modalDetailsItem12" class="item-body-link modal-opener">
                                           <small class="red">Hot</small>
                                           <div class="item-title">
                                               <h3>Mexican Burger</h3>
                                               <small>Mexican Topping, Onion ... </small>
                                           </div>
                                       </a>
                                   </figure>
                                   <ul>
                                       <li>
                                           <span class="item-price format-price">9.70</span>
                                       </li>
                                       <li>
                                           <a href="javascript:;" class="add-item-to-cart"><i class="icon icon-shopping-cart"></i></a>
                                       </li>
                                   </ul>
                               </div>
                           </div> -->
                       </div>
                       <!-- Grid End -->





                   </div>
                   <!-- Left Sidebar End -->
                   <!-- Right Sidebar -->
                   <!-- Continuar con la orden -->
                   <div class="col-lg-4" id="sidebar">
                       <!-- Order Container -->
                       <div id="orderContainer" class="theiaStickySidebar">
                           <!-- Form -->
                           <form method="POST" id="orderForm" name="orderForm" onsubmit="return confirmGuestOrder(event);">

                               <!-- Step 1: Order Summary -->
                               <div id="#orderSummaryStep" class="step">
                                   <div class="order-header">
                                       <h3>Orden número
                                           <span id="numeroOrden"></span>
                                       </h3>
                                   </div>
                                   <div class="order-body">
                                       <!-- Cart Items -->
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="order-list">
                                                   <ul id="itemList">
                                                       <!-- Cart Items / will be generated by js -->
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- Cart Items End -->
                                       <!-- Delivery Fee -->
                                       <div class="row">
                                           <div class="col-md-12 col-sm-12">
                                               <label class="cbx radio-wrapper no-edges">
                                                   <input type="radio" value="delivery" name="transfer" checked>
                                                   <span class="checkmark"></span>
                                                   <span class="radio-caption">Repartidor</span><span class="option-price format-price transfer">10.00</span>
                                               </label>
                                           </div>
                                       </div>
                                       <!-- Delivery Fee -->
                                       <!-- Total -->
                                       <div class="row total-container">
                                           <div class="col-md-12 p-0">
                                               <span class="totalTitle">Total</span><span class="totalValue format-price float-right">0.00</span>
                                               <input type="hidden" id="totalOrderSummary" class="total format-price" name="total" value="$ 0.00" data-parsley-errors-container="#totalError" data-parsley-empty-order="" disabled />
                                           </div>
                                       </div>
                                       <div id="totalError"></div>
                                       <!-- Total End -->
                                       <!-- Forward Button -->
                                       <div class="row">
                                           <div class="col-md-12">
                                               <button type="button" name="forward" class="btn-form-func forward">
                                                   <span class="btn-form-func-content">Continuar orden</span>
                                                   <span class="icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                               </button>
                                           </div>
                                       </div>
                                       <!-- Forward Button End -->
                                   </div>
                               </div>
                               <!-- Step 1: Order Summary End -->

                               <!-- Step 2: Checkout -->
                               <div class="step">
                                   <div class="order-header">
                                       <h3>Datos del cliente</h3>
                                   </div>
                                   <div id="personalData" data-consumer-key='pk_test_51J7cAgDAWsjxeaA44cjM6Qs88gEWPeHECm9RFsrmdBl1CCd1FKLXuNvLxRedNjFOWUEc345DVNRhzhVDmNa2PU3J00axtzYNYg' data-create-order-url='https://ultimatewebsolutions.net/foodboard/pay-with-card-online/endpoint/ajax/create-stripe-order.php' data-return-url='https://ultimatewebsolutions.net/foodboard/pay-with-card-online/thank-you.php' data-currency='USD'>
                                       <div class="order-body">
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label for="userNameOnlinePayment">Nombre</label>
                                                       <input id="userNameOnlinePayment" class="form-control" name="username" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$" required />
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label for="phoneOnlinePayment">Teléfono</label>
                                                       <input id="phoneOnlinePayment" class="form-control" name="phone" type="text" data-parsley-pattern="^\+{1}[0-9]+$" required />
                                                   </div>
                                               </div>
                                           </div>
                                           <!-- <div class="row">
                                               <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label for="emailOnlinePayment">Email</label>
                                                       <input id="emailOnlinePayment" class="form-control" name="email" type="email" required />
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-12 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="addressOnlinePayment">Dirección</label>
                                                       <input id="addressOnlinePayment" class="form-control" name="address" type="text" data-parsley-pattern="^[,.a-zA-Z0-9\s.]+$" required />
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <div class="form-group">
                                                       <label for="messageOnlinePayment">Nota</label>
                                                       <input id="messageOnlinePayment" class="form-control" name="message" type="text" data-parsley-pattern="^[a-zA-Z0-9\s.:,!?']+$" />
                                                   </div>
                                               </div>
                                           </div> -->
                                           <div class="row total-container">
                                               <div class="col-md-12 p-0">
                                                   <span class="totalTitle">Total</span><span class="totalValue format-price float-right">0.00</span>
                                               </div>
                                           </div>
                                           <div class="row justify-content-end">
                                               <!-- <div class="col-6 pr-0">
                                                   <div class="form-group">
                                                       <input type="checkbox" id="cbxOnlinePayment" class="inp-cbx" name="terms" value="yes" required />
                                                       <label class="cbx terms" for="cbxOnlinePayment">
                                                           <span>
                                                               <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                   <polyline points="1.5 6 4.5 9 10.5 1">
                                                                   </polyline>
                                                               </svg>
                                                           </span>
                                                           <span>Accept<a href="https://ultimatewebsolutions.net/foodboard/pdf/terms.pdf" class="terms-link" target="_blank">Terms</a>.</span>
                                                       </label>
                                                   </div>
                                               </div> -->
                                               <div class="col-6 pl-0">
                                                   <a href="javascript:;" class="modify-order backward">Modificar Orden</a>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <button type="submit" name="submit" id="submitPayment" class="btn-form-func">
                                                       <span class="btn-form-func-content">Reservar orden</span>
                                                       <span class="icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                   </button>
                                                   <div class="spinner-icon">
                                                       <i class="fa fa fa-cog fa-spin"></i>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <button type="button" name="backward" class="btn-form-func btn-form-func-alt-color backward">
                                                       <span class="btn-form-func-content">Regresar</span>
                                                       <span class="icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                                   </button>
                                               </div>
                                           </div>
                                           <div class="row footer">
                                               <div class="col-md-12 text-center">
                                                   <small>Tio pollo.</small>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- Step 2: Checkout End -->

                           </form>
                           <!-- Form End -->
                       </div>
                       <!-- Order Container End -->
                   </div>
                   <!-- Right Sidebar End -->
               </div>
               <!-- Row End -->
           </div>
           <!-- Container End -->
       </div>
       <!-- Order End -->
   </main>


   <!-- Notification Messages -->
   <div class="addedToCartMsg">Agregado!</div>
   <div class="alreadyInCartMsg">Ya esta agregado!</div>

   <!-- Main End -->


   <!-- Modal Warning Qty min. Limit -->
   <div id="modalWarningQtyMinLimit" class="modal-popup zoom-anim-dialog mfp-hide">
       <div class="small-dialog-header">
           <h3>Warning</h3>
       </div>
       <div class="content">
           <h6 class="mb-0">Quantity minimum limit is: 1 !</h6>
       </div>
       <div class="footer">
           <div class="row">
               <div class="col-4 pr-0">
                   <button type="button" class="btn-modal-close">Got it</button>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal Warning Qty min. Limit End -->

   <!-- Modal Warning Qty max. Limit -->
   <div id="modalWarningQtyMaxLimit" class="modal-popup zoom-anim-dialog mfp-hide">
       <div class="small-dialog-header">
           <h3>Warning</h3>
       </div>
       <div class="content">
           <h6 class="mb-0">Quantity maximum limit is: 10 !</h6>
       </div>
       <div class="footer">
           <div class="row">
               <div class="col-4 pr-0">
                   <button type="button" class="btn-modal-close">Got it</button>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal Warning Qty max. Limit End -->

   <!-- Modal para opciones de producto -->
   <div id="modalOptionsItem" class="modal-popup zoom-anim-dialog mfp-hide" idItem>
       <div class="small-dialog-header">
           <h3 id="tituloProducto">Especialidades</h3>
           <div class="addedToCartMsgInModal">Agregado!</div>
           <div class="alreadyInCartMsgInModal">Ya esta agregado!</div>
       </div>
       <div class="content" id="especialidades">
           <!--  <div class="row">
               <div class="col-md-12 col-sm-12">
                   <label class="cbx radio-wrapper">
                       <input type="radio" value="Small: 26cm" name="size-options-item-01">
                       <span class="checkmark"></span>
                       <span class="radio-caption">Small: 26cm</span><span class="option-price format-price">4.30</span>
                   </label>
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 col-sm-12">
                   <label class="cbx radio-wrapper">
                       <input type="radio" value="Medium: 32cm" name="size-options-item-01" checked>
                       <span class="checkmark"></span>
                       <span class="radio-caption">Medium: 32cm</span><span class="option-price format-price">8.00</span>
                   </label>
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 col-sm-12">
                   <label class="cbx radio-wrapper">
                       <input type="radio" value="Large: 45cm" name="size-options-item-01">
                       <span class="checkmark"></span>
                       <span class="radio-caption">Large: 45cm</span><span class="option-price format-price">14.30</span>
                   </label>
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 col-sm-12">
                   <input type="hidden" id="item01ExtraTitle" name="item01ExtraTitle" value="Extra Cheese" />
                   <input type="checkbox" id="item01Extra" class="inp-cbx" name="item01Extra" value="3.50" />
                   <label class="cbx mb-0" for="item01Extra">
                       <span>
                           <svg width="12px" height="10px" viewbox="0 0 12 10">
                               <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                           </svg>
                       </span>
                       <span>Extra Cheese</span><span class="option-price format-price">2.00</span>
                   </label>
               </div>
           </div> -->
       </div>
       <!-- Content End -->
       <div class="footer">
           <div class="row">
               <div class="col-4 pr-0">
                   <button type="button" class="btn-modal-close">Cerrrar</button>
               </div>
               <div class="col-8">
                   <button type="button" class="btn-modal add-options-item-to-cart">Agregar</button>
               </div>
           </div>
       </div>
       <!-- Footer End -->
   </div>
   <!-- Modal Options for Item 01 End -->



   <!-- Modal para detalles del producto -->
   <div id="modalDetailsItem" class="modal-popup zoom-anim-dialog mfp-hide">
       <div class="small-dialog-header">
           <h3>Bolognese</h3>
       </div>
       <div class="content pb-1">
           <figure><img src="vistas/assets/img/gallery/grid-items-large/02.jpg" alt="" class="img-fluid"></figure>
           <h6 class="mb-1">Ingredients</h6>
           <p>Ragu, Mozzarella</p>
       </div>
       <div class="footer">
           <div class="row">
               <div class="col-4 pr-0">
                   <button type="button" class="btn-modal-close">Close</button>
               </div>
           </div>
       </div>
   </div>
   <!-- Modal Details for Item 02 End -->