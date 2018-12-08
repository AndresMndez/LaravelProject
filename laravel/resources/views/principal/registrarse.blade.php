@extends ('principal/app')

@section('main')
	<main class="Registros">
		<form class="caja_formulario" action="" method="post" enctype="multipart/form-data">
			<div class="datos">
				<nav class="registrarse">
						<h1>Registrarse</h1>
				</nav>
				<div class="dato_interno">
					<i class="fas fa-address-card"></i>
					<input type="text" name="nombre" value="<?php echo (!empty($nombre))? $nombre : "" ;  ?>" placeholder="Nombre">
					<p> <span> <?php echo  (isset($error["nombre"]))? $error["nombre"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-address-card"></i>
					<input type="text" name="apellido" value="<?php echo (!empty($apellido))? $apellido : "" ;  ?>" placeholder="Apellido">
					<p> <span> <?php echo  (isset($error["apellido"]))? $error["apellido"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-at"></i>
					<input type="mail" name="mail" value="<?php echo (!empty($mail))? $mail : "" ;  ?>" placeholder="Email">
					<p> <span> <?php echo  (isset($error["mail"]))? $error["mail"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-user-alt"></i>
					<input type="text" name="username" value="<?php echo (!empty($user))? $user : "" ;  ?>" placeholder="Nombre de Usuario"><br>
					<p> <span> <?php echo  (isset($error["username"]))? $error["username"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-phone-square"></i>
					<input type="tel" name="tel" value="<?php echo (!empty($tel))? $tel : "" ;  ?>"  placeholder="Telefono">
					<p> <span> <?php echo  (isset($error["tel"]))? $error["tel"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-storage/images"></i>
					<input type="file" name="avatar">
					<p> <span> <?php echo  (isset($error["size"]))? $error["size"]: ""; ?> </span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-lock"></i>
					<input type="password" name="contra" placeholder="Contraseña">
					<p> <span> <?php echo  (isset($error["contra"]))? $error["contra"]: ""; ?></span> </p>
				</div>
				<div class="dato_interno">
					<i class="fas fa-lock-open"></i>
					<input type="password" name="conficontra" placeholder="Confirmar contraseña">
					<p> <span> <?php echo (isset($error["conficontra"]))? $error["conficontra"]: ""; ?></span> </p>
				</div>
				<div class="dato_terminos">
					<div class="caja-subdivisoria">
						<input type="checkbox" name="terminos"><a>Accepta Terminos y Condiciones</a>
					</div>
					<p> <span> <?php echo (isset($error["terminos"]))? $error["terminos"]: ""; ?></span> </p>
				</div>

				<button type="submit" >Registrarse</button>
			</div>
		</form>
	</main>
@endsection
