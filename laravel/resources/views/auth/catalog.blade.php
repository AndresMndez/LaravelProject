@extends('principal/app')

@section('main')
	<main>
		<div class="">
			<h2>Filters</h2>
			<label for="categories">Category</label>
			<select id="categories" class="categories" name="">
				<option value=""></option>
			</select>
			<label for="brand">brand</label>
			<select id="brand" class="brand" name="">
				<option value=""></option>
			</select>
			<label for="price">price</label>
			<select id="price" class="price" name="">
				<option value=""></option>
			</select>
			<label for="name">name</label>
			<select id="name" class="name" name="">
				<option value=""></option>
			</select>
		</div>
		<div class="">
		</div>
		<script>
			info = new XMLHttpRequest();
			url ="http://127.0.0.1:8000/api/prodcat";
			var c;
			var d=new Date();
			year=d.getFullYear();
			month=d.getMonth()+1;
			day=d.getDate();
			select=document.getElementsByTagName('select');
			div=document.getElementsByTagName('div');
			info.onreadystatechange = function() {
				if (info.readyState == 4 && info.status == 200){
					c=JSON.parse(info.responseText);
					c=c.data;
					for (var i = 0;i<c.length;i++){
						select[0].innerHTML+="<option value="+c[i]["id"]+">"+c[i]["name"]+"</option>";
				 	}
					for (i=0;i<c.length;i++){
						//Recorro el json para traer los productos y las selecciones de filtros
						repeticion(i);
						}
					}
				}

			info.open("get",url,true);
			info.send();
			select[0].onchange=function (){
				if(this.value!=""){
					for (i=0;i<c.length;i++){
						if (i==select[0].value-1){
							div[5].innerHTML="";
							select[1].innerHTML="<option value=></option>";
							select[2].innerHTML="<option value=></option>";
							select[3].innerHTML="<option value=></option>";
							repeticion(i);
							}
						}
				} else {
					for (i=0;i<c.length;i++){
						repeticion(i);
					}
				}
			}
			/*Pasa por todos los valores de la variable e imprime en el div*/
			function repeticion(i){
				for (var x=0;x<c[i]['products'].length;x++){
					if(select[1].innerHTML.indexOf(c[i]["products"][x]["brand"])==-1){select[1].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["brand"]+"</option>";}
					if(select[2].innerHTML.indexOf(c[i]["products"][x]["price"])==-1){select[2].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["price"]+"</option>";}
					if(select[3].innerHTML.indexOf(c[i]["products"][x]["name"])==-1){select[3].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["name"]+"</option>";}
					div[5].innerHTML+="<form method='get' action='/prueba' enctype='multipart/form-data'><input type='hidden' value="+c[i]["products"][x]["id"]+" name='id'> <input type='text' value='"+c[i]["products"][x]["name"]+"' name='product'><input type='text' value='"+c[i]["name"]+"' name='categoryname'><input  type='text' value='"+c[i]["products"][x]["brand"]+"' name='brand'><input type='number' value="+c[i]["products"][x]["price"]+" name='price'><input type='text' value="+c[i]["products"][x]["description"]+" name='description'><img src=\'"+c[i]["products"][x]["image"]+"\' width=20px height=24px > <input type='checkbox' name='update' value='update'> <input type='checkbox' name='delete' value='"+year+"-"+month+"-"+day+"'> <i class='fas fa-trash-alt'></i><button type='submit' name='submit' value='submit' disabled>Submit</button></form>";
				}
			}
		</script>
	</main>
@endsection
