@extends('principal/app')

@section('main')
	<main>
		<form class="" action="" enctype="multipart/form-data" >
			<label for="name">Product</label>
			<input id="name" type="text" name="name" value="">

			<label for="description">Description</label>
			<input id="description" type="text" name="description" value="">

			<label for="avatar">Image</label>
			<input id="avatar" type="file" name="avatar" value="">

			<label for="price">Price</label>
			<input id="price" type="number" name="price" value="">

			<label for="brand">Brand</label>
			<input id="brand" type="text" name="brand" value="">

			<input id="catid" type="hidden" name="catid" value="">
			<label for="cName">Category</label>
			<input id="cName" type="text" name="cName" value="">

			<button id="submit" type="submit" name="submit" value="submit" disabled>Add</button>
		</form>
		<script type="text/javascript" >
		var Category=false;
		var Product=false;
		var Price=false;
		var Brand=false;
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
								alert('Dicho nombre de Producto ya existe');
								Product=false;
								break;
							}
						}
					}
				} else {
					alert('debe poner un nombre de producto');
				}
				if (Product==true){
					verify();
				}

			}

			input[4].onblur=function(){
				if(input[4].value==""){
					alert('debes Ponerle un precio al producto');
							} else {
								Price=true;
								verify();
							}
						}
					}
				}
			}
			input[5].onblur=function(){
				if(input[5].value==""){
					alert('Debes ponerle una marca al producto');
				} else {
					Brand=true;
					verify();
				}
			}

			input[7].onblur=function(){
				if(input[7].value!=""){
					input[6].value="";
					for (var i=0;i<c.length;i++){
							if (c[i]['name']==input[7].value){
								input[6].value=c[i]['id'];
								Category=true;
								break;
							}
						}
					}
					if (Category!=true){
						alert('dicha categoria no existe');
					}
					verify();
				}

			function verify(){
				if (Product&&Category&&Brand&&Price){
					document.getElementById("submit").removeAttribute("disabled");
				} else {

				}

			}
		</script>

	</main>
@endsection
