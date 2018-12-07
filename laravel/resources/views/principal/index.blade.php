<?php
$precioFinal = 0;
?>

<!DOCTYPE html>
<html>
    <!--HEAD-->
    @include('principal/blocks/head')
    @section('title', 'probando pagina')

    <body>
        <!--HEADER-->
        @include('principal/blocks/header')

        <!-- MENU -->
        @include('principal/blocks/menu')


        <div class="banner"> <img src="{{$banner->url}}"></div>
        <div class = "content">

            <!-- ASIDE MENU -->
            @include('principal/blocks/category-menu')

            <main>
                <h1>Mejores Ofertas</h1>

                <section class="best-seller">
                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article>

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article class="main-seller">

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article >

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article>
                </section>

                <h2 class = "h2-best" style="font-family: 'Montserrat', sans-serif;">Mas    Vendidos</h2>
                <section class="best-seller">
                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p><span>$10500</span>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article>

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article class="main-seller">

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article>

                    <article class="main-seller">
                        <img src="sources/img/procesadores/corei38100.jpg">
                        <div class ="product-inside">
                            <p><a href=""><strong>Core i3 8100</strong></a></p>
                            <p>$9000</p>
                            <div class="product-add">
                                <i class="fas fa-cart-plus"></i>
                                <p>Agregar al Carrito</p>
                            </div>
                        </div>
                    </article>
                </section>
            </main>
        </div>

        <!-- AQUI ESTA el footer -->
        @include('principal/blocks/footer')

    </body>
</html>
