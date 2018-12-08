<header class="cabezera">
  <!-- LOGO --> <!--Agrego el anclaje para que lleve a home-->
  <div class="logo">
    <a href="/home"><img src="/storage/images/Android_O_Preview_Logo.png" alt=""></a>
    <a><i class="fas fa-bars"></i></a>
  </div>
  <!-- MENU DE NAVEGACIO -->
  <nav class="menu">
    <!-- BARRAS DEL MOBILE -->
    <div class="menu_cont">
      <div class = "barras">
        <a href = "#"><i class="fas fa-shopping-cart"></i></a>
      </div>
      <!-- BARRA DE BUSQUEDA -->
      <form class="buscador" action="/login" method="post">
        <input id="Buscador" type="text" name="buscador" value="" placeholder="¿Que buscas?">
        <a href="#Buscador"><i class="fas fa-search"></i></a>
      </form>
      <!-- Barra de Registro-->
      <div class="login_bar">
        <?php
        if (empty($_SESSION)){
        echo '<a class="log_in" href="/registrarse"> Registrarse |</a> <a href="/login" class="log_in">Login<a> <a href="/login">	<i class="fas fa-sign-in-alt"></i> </a>'; }
        else {
          if (strlen($_SESSION["avatar"])<26){
            echo '<abbr title=Logout> <a class="log_in" href="/destroysession">'.'<p>'.$_SESSION["username"].'</p> <p><img src="storage/images/if_user_309035.png" style="border-radius: 50%; width:30px; height:30px;"></p> <p><i class="fas fa-sign-out-alt"></i> </p></a> </abbr>';
            } else {
           echo '<abbr title=Logout><a class="log_in" href="/destroysession">'.'<p>'.$_SESSION["username"].'</p> <p><img src=" '.$_SESSION["avatar"].'" style="border-radius: 50%; width:30px; height:30px;"></p> <p><i class="fas fa-sign-out-alt"></i> </p></a></abbr>';
          }
        }
        ?>
      </div>
    </div>
  </nav><!-- MENU DE NAVEGACION -->
</header>
