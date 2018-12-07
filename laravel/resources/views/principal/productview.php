<?php 
$precioFinal = 0;
?>

<!DOCTYPE html>
<html>
    <!--HEAD-->
    <?php require 'blocks/head.php'; ?>
    
    <body>
        <!--HEADER-->
        <?php require 'blocks/header.php'; ?>

        <!-- MENU -->
        <?php require 'blocks/menu.php'; ?>

    	<div class = "content">
                    
            <!-- ASIDE MENU -->
            <?php require 'blocks/categoy-menu.php'; ?>

            <main>
            	<article>
            		<img src="">
            		<h1 class="principal_product">Tarjeta Madre</h1>
            		<h2 class="price"><?php
                        setlocale(LC_MONETARY, 'en_US');
                    echo money_format('%(#10n', 500);
                ?></h2>
            	</article>
            	<form action="" method="post">
            		<select>
            			<?php for ($i=0; $i < 5; $i++) { 
            				echo '<option value"' . ($i+1) . '">' . ($i+1) . '</option>';
            			}?>
            		</select>
            		<button type="submit">Agregar al carrito<i class="fa fa-search agregar_carrito"> </i></button>


            	</form>
            </main>
        </div>

        <!-- Footer-->
        <?php include 'blocks/footer.php'?>
    </body>
</html>