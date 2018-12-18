input=document.getElementsByTagName('input');
is_admin=true;
label=document.getElementById('response');
pregunta();
function cambios(){
	pregunta();
}



function pregunta(){
	if (input['is_admin'].value==0){
		is_admin=true;
		label.innerHTML="para cliente.";
		label.style="width:90px;";
		verify();
	} else {
		if (input['is_admin'].value==1){
			is_admin=true;
			label.innerHTML="para administrador.";
			label.style="width:140px;"
			verify();
		} else {
			is_admin=false;
			label.innerHTML="elija 1 para admin, o 0 para clinete.";
			label.style="width:230px";
			verify();
		}
	}
}

function verify(){
	if (is_admin){
		document.getElementsByTagName("button")['submit'].removeAttribute('disabled');
	} else {
		document.getElementsByTagName("button")['submit'].setAttribute('disabled', true);
	}
}
