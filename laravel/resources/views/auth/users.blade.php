@extends('/principal/app')

@section('main')
	<main>
		<div class="">

		</div>
	</main>
@endsection
		<script>
			info = new XMLHttpRequest();
			url ="http://127.0.0.1:8000/api/users";
			var c;
			// select=document.getElementsByTagName('select');
			d=new Date();
			year=d.getFullYear();
			month=d.getMonth()+1;
			day=d.getDate();
			div=document.getElementsByTagName('div');
			info.onreadystatechange = function() {
				if (info.readyState == 4 && info.status == 200){
					c=JSON.parse(info.responseText);
					c=c.data;
					for (var i = 0;i<c.length;i++){
						div[4].innerHTML+="<form action='/prueba' method= 'get'><lable>"+c[i]["id"]+"</lable><input type='hidden' name='id' value='"+c[i]["id"]+"'><lable>"+c[i]["name"]+"</lable><input type='hidden' name='name' value='"+c[i]["name"]+"'> <lable>"+c[i]["email"]+"</lable><input type='hidden' name='email' value='"+c[i]["email"]+"'><input value='"+c[i]["type"]+"' name='type' type='numeric' style='width:20px;'><lable for='#"+c[i]["id"]+"upd'> <i class='fas fa-edit'></i></lable><input id='"+c[i]["id"]+"upd' type='checkbox' value='update' name='update'> <lable> <i class='fas fa-trash-alt'></i> </lable> <input type='checkbox' value='"+year+"-"+month+"-"+day+"' name='delete'> <button type='submit' value='submit' name='submit'>Submit</button></form>";
					}
				}
			}
			info.open("get",url,true);
			info.send();


		</script>
