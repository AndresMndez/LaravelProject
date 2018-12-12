@extends('principal/app')

@section('main')
	<main>
		<form class="" action="" enctype="multipart/form-data" style="display:flex;flex-wrap:wrap;flex-direction:column">
			<label for="name">Product</label>
			<input id="name" type="text" name="name" value="">
			<p id="name"></p>

			<label for="description">Description</label>
			<input id="description" type="text" name="description" value="">
			<p id="description"></p>

			<label for="avatar">Image</label>
			<input id="avatar" type="file" name="avatar" value="">
			<p id="avatar"></p>

			<label for="price">Price</label>
			<input id="price" type="number" name="price" value="">
			<p id="price"></p>

			<label for="brand">Brand</label>
			<input id="brand" type="text" name="brand" value="">
			<p id="brand"></p>

			<input id="catid" type="hidden" name="catid" value="">
			<label for="cName">Category</label>
			<input id="cName" type="text" name="cName" value="">
			<p id="cName"></p>

			<button id="submit" type="submit" name="submit" value="submit" disabled>Add</button>
			<p id="submit"></p>
		</form>
		<script type="text/javascript" >
			var Category=false;
			var Product=false;
			var Price=false;
			var Brand=false;
			var Avatar=true;
			p=document.getElementsByTagName('p');
			btn=document.getElementsByTagName('btn');
			form=document.getElementsByTagName('form');
			info = new XMLHttpRequest();
			url ="http://127.0.0.1:8000/api/prodcat";
			var c;
			input=document.getElementsByTagName('input');
			info.onreadystatechange = function() {
				if (info.readyState == 4 && info.status == 200){
					c=JSON.parse(info.responseText);
					c=c.data;
				}
			}
			info.open("get",url,true);
			info.send();
			input[1].onblur=function(){
				if(input[1].value!=""){
					Product=true;
					for (var i=0;i<c.length;i++){
						for (var x=0;x<c[i]['products'].length;x++){
							if (c[i]['products'][x]["name"]==input[1].value){
								p["name"].innerHTML='Dicho nombre de Producto ya existe';
								p["name"].style.color="red";
								Product=false;
								break;
							}
						}
					}
				} else {
					p["name"].innerHTML='debe poner un nombre de producto';
					p["name"].style.color="red";
				}
				if (Product==true){
					verify();
					p['name'].innerHTML='El nombre del producto es ditinto al resto de sus productos';
					p["name"].style.color="green";
				}
			}

			input['price'].onblur=function(){
				if(input['price'].value==""){
					p["price"].innerHTML='debes Ponerle un precio al producto';
					p["price"].style.color="red";
				} else {
					Price=true;
					verify();
					p["price"].innerHTML='Precio esta ok';
					p["price"].style.color="green";
				}
			}

			input['brand'].onblur=function(){
				if(input['brand'].value==""){
					p["brand"].innerHTML='Debes ponerle una marca al producto';
					p["brand"].style.color="red";
				} else {
					Brand=true;
					verify();
					p["brand"].innerHTML='Le as puesto marca al producto';
					p["brand"].style.color="green";

				}
			}

			input["cName"].onblur=function(){
				if(input["cName"].value==""){
					input["catid"].value="";
					p['cName'].innerHTML="";
					for (var i=0;i<c.length;i++){
							if (c[i]['name']==input["cName"].value){
								input["catid"].value=c[i]['id'];
								Category=true;
								verify();
								break;
							}
						}
					if (Category!=true){
						var a = confirm('dicha categoria no existe ¿quiere crearla?');
						if(a!=true){
							input["catid"].value=null;
							p["cName"].innerHTML="Estas creando una nueva categoria para tus productos";
							p["cName"].style.color="green";
							Category=true;
						} else {
							p["cName"].innerHTML="";
							for (var i=0;i<c.length;i++){
								p["cName"].innerHTML+=c[i]["name"]+"<br>";
							}
							p["cName"].innerHTML+="Estas son todas las categorias disponibles";
							p["cName"].style.color="red";
							Category=false;
						}
					}
					verify();
				}
				p["cName"].innerHTML="Debes agregarle una Categoria";
				p["cName"].style.color="red";
			}

			avatar.onload=function(){
				if (input["avatar"]!=""){
					avatarsize=input['avatar']['files'][0]['size'];
					avatartype=input['avatar']['files'][0]['type'];
					if (avatarsize>1000*1024||(avatartype=="image/jpeg"||avatartype=="image/webp"||avatartype=="image/png"||avatartype=="image/jpg")){
						p["avatar"].innerHTML="El archivo subido es muy grande o no es una image";
						p["avatar"].style.color="red";
						Avatar=false;
					} else {
						p["avatar"].innerHTML="";
						Avatar=true;
					}
				} else {
					p["avatar"].innerHTML="";
					Avatar=true;
				}
			}

			function verify(){
				if (Product&&Category&&Brand&&Price&&Avatar){
					document.getElementById("submit").removeAttribute("disabled");
				} else {
					document.getElementById("submit").setAttribute("disabled",true);
				}
			}
		</script>

	</main>
@endsection
