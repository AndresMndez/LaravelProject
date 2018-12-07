@extends ('principal/app')

@section('main')
	<main class="main_login">
		<form class="caja_formulario" action="" method="post">

			<div class="datos">
				<nav class="iniciar">
					<h1>Iniciar Seción</h1>
				</nav>
				<div class="dato_interno">
					<i class="fas fa-address-card"></i>
					<input type="text" name="username" value="<?php
						if (isset($_COOKIE["username"]) && $_COOKIE["username"] != ""){
							echo $_COOKIE["username"];
						}  ?>" placeholder="Nombre de Usuario">
					<p> <span> <?php echo  (isset($inicia))? $inicia: ""; ?></span> </p>
				</div>

				<div class="dato_interno">
					<i class="fas fa-key"></i>
					<input type="password" name="contra" password="" placeholder="Contraseña">
					<p> <span> <?php echo  (isset($inicia))? $inicia: ""; ?></span> </p>
				</div>
				<div class="boton">
					<button type="submit">Iniciar Sesión</button>

					<a href="registro.php">¿Desea registrarse?</a>
					<input type="checkbox" name="recordarme" <?php echo (isset($recordarme))? "selected":"";?>><a>Recordarme</a>
					<!--<a href=""-->
				</div>
			</div>
		</form>
	</main>
@endsection
