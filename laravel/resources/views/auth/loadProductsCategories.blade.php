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

			<label for="cName">Category</label>
			<input id="cName" type="text" name="cName" value="">

			<button type="submit" name="submit" value="submit">Add</button>
		</form>
		<script type="text/javascript" >
			info = new XMLHttpRequest();
			url ="http://127.0.0.1:8000/api/categoryproduct";
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
					for (var i=0;i<c.length;i++){
						for (var x=0;x<c[i]['products'].length;x++){
							if (c[i]['products'][x]["name"]==input[1].value){
								input[1].focus;
								alert('Dicho nombre de Producto ya existe');
								break;
							}
						}
					}
				}
			}
		</script>
	</main>
@endsection
