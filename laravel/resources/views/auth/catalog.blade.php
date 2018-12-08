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
		<table>
			<tbody>
				<tr>
					<th>Product1</th>
					<th>Categorie2</th>
					<th>Brand3</th>
					<th>Price4</th>
					<th>Description5</th>
					<th>Image6</th>
					<th>Update7</th>
					<th>Delete8</th>
				</tr>
			</tbody>
		</table>
		<script>
			info = new XMLHttpRequest();
			url ="http://127.0.0.1:8000/api/categoryproduct";
			var c;
			select=document.getElementsByTagName('select');
			tbody=document.getElementsByTagName('tbody');
			info.onreadystatechange = function() {
				if (info.readyState == 4 && info.status == 200){
					c=JSON.parse(info.responseText);
					c=c.data;
					for (var i = 0;i<c.length;i++){
						// if (i==0){
						// 	select[0].innerHTML="<option value='"+c[i]["id"]+"'>"+c[i]["name"]+"</option>";
						// } else {
							select[0].innerHTML+="<option value="+c[i]["id"]+">"+c[i]["name"]+"</option>";
				 	}
					for (i=0;i<c.length;i++){
						for (var x=0;x<c[i]['products'].length;x++){
							if(select[1].innerHTML.indexOf(c[i]["products"][x]["brand"])==-1){select[1].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["brand"]+"</option>";}
							if(select[2].innerHTML.indexOf(c[i]["products"][x]["price"])==-1){select[2].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["price"]+"</option>";}
							if(select[3].innerHTML.indexOf(c[i]["products"][x]["name"])==-1){select[3].innerHTML+="<option value="+c[i]["products"][x]["id"]+">"+c[i]["products"][x]["name"]+"</option>";}
							tbody[0].innerHTML+="<tr><td>"+c[i]["products"][x]["name"]+"</td><td>"+c[i]["name"]+"</td><td>"+c[i]["products"][x]["brand"]+"</td><td>"+c[i]["products"][x]["price"]+"</td><td>"+c[i]["products"][x]["description"]+"</td><td><img src=\'"+c[i]["products"][x]["image"]+"\' width=20px> </td><td><i class='fas fa-edit'></i></td><td><i class='fas fa-trash-alt'></i></td></tr>";
						}
					}
				}
			}
			info.open("get",url,true);
			info.send();


		</script>
	</main>
@endsection
