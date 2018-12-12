var Category=true;
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
input['name'].onblur=function(){
	if(input['name'].value!=""){
		Product=true;
		p["name"].innerHTML='Es un nuevo producto';
		p["name"].style.color="green";
		for (var i=0;i<c.length;i++){
			for (var x=0;x<c[i]['products'].length;x++){
				if (c[i]['products'][x]["name"]==input['name'].value){
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
		Product=false;
	}
}

input['price'].onblur=function(){
	if (input['price'].type!="number"){
		p["price"].innerHTML='debes debe ser numerico';
		p["price"].style.color="red";
	} else {
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

// input["cName"].onblur=function(){
// 	if(input["cName"].value==""){
// 		input["catid"].value="";
// 		p['cName'].innerHTML="Sin Categoria";
// 		for (var i=0;i<c.length;i++){
// 			if (c[i]['name']==input["cName"].innerText){
// 				input["catid"].value=c[i]['id'];
// 				Category=true;
// 				verify();
// 				break;
// 			}
// 		}
// 		if (Category!=true){
// 			var a = confirm('dicha categoria no existe ¿quiere crearla?');
// 			if(a!=true){
// 				input["catid"].value=null;
// 				p["cName"].innerHTML="Estas creando una nueva categoria para tus productos";
// 				p["cName"].style.color="green";
// 				Category=true;
// 			}
// 	} else {
// 		if (input["cName"].value!=""){
// 		input["catid"].value="";
// 		for (var i=0;i<c.length;i++){
// 				if (c[i]['name']==input["cName"].innerText){
// 					input["catid"].value=c[i]['id'];
// 					Category=true;
// 					verify();
// 					break;
// 				}
// 			}
// 		} else {
//
// 			}
// 		 else {
// 				p["cName"].innerHTML="";
// 				for (var i=0;i<c.length;i++){
// 					p["cName"].innerHTML+=c[i]["name"]+"<br>";
// 				}
// 				p["cName"].innerHTML+="Estas son todas las categorias disponibles";
// 				p["cName"].style.color="red";
// 				Category=false;
// 				}
// 			}
// 			verify();
// 		} else {
// 			p["cName"].innerHTML="Debes agregarle una Categoria";
// 			p["cName"].style.color="red";
// 		}
// 	}

function avatarfunc(){
	if (input["avatar"]!=""){
		avatarsize=input['avatar']['files'][0]['size'];
		avatartype=input['avatar']['files'][0]['type'];
		if (avatarsize>(5000*1024)){
			p["avatar"].innerHTML="El archivo subido es muy grande";
			p["avatar"].style.color="red";
			Avatar=false;
		} else {
			if (avatartype=="image/jpeg"&&avatartype=="image/webp"&&avatartype=="image/png"&&avatartype=="image/jpg"){
				p["avatar"].innerHTML="No es un tipo de archivo jpg, png, jpeg o webp";
				p["avatar"].style.color="red";
				Avatar=false;
			} else {
				p["avatar"].innerHTML="Esta bien el tamaño y el tipo de archivo de la imagen";
				p["avatar"].style.color="green";
				Avatar=true;
			}
		}
	}	else {
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
