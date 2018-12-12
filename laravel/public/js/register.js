input=document.getElementsByTagName('input');
btn=document.getElementsByTagName('button');
p=document.getElementsByTagName('p');
strong=document.getElementsByTagName('strong');
pmail=p['email'];
ppassword=p['password'];
pconfirm=p['password_confirm'];
mail=input['email'];
password=input['password'];
confirm=input['password_confirmation'];
var allowedmail=false;
var allowedpassword=false;
var matchespassword=false;
password.onfocus=function(){
  if (strong[1].innerHTML){
    strong[1].innerHTML="";
  }
  if (password.value.length<7){
    ppassword.innerHTML="The password need at least "+(7-password.value.length)+" more.";
    ppassword.style.color='red';
    allowedpassword=false;
    accesserver();
  } else {
    if (password.value!=confirm.value){
      ppassword.innerHTML="Password is all right";
      ppassword.style.color='green';
      matchespassword=false;
      allowedpassword=true;
      pconfirm.innerHTML="The passwords doesn't matches.";
      pconfirm.style.color='red';
      accesserver();
    } else {
      ppassword.innerHTML="Password is allright";
      ppassword.style.color='green';
      pconfirm.innerHTML="The passwords matches.";
      pconfirm.style.color='green';
      matchespassword=true;
      allowedpassword=true;
      accesserver();
    }
  }
}
mail.onfocus=function(){
  if(mail.value!=""){
    if (strong[0].innerHTML){
      strong[0].innerHTML="";
    }
    var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!regexMail.test(mail.value))
    {

      pmail.innerHTML=("Not a valid Email Address");
      pmail.style.color='red';
      allowedmail=false;
      accesserver();
    } else {
      pmail.innerHTML=("This is a Valid Email Address");
      pmail.style.color='green';
      allowedmail=true;
      accesserver();
    }
  }
}
mail.oninput=function ()
{
  var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!regexMail.test(mail.value))
  {
    pmail.innerHTML=("Not a valid Email Address");
    pmail.style.color='red';
    allowedmail=false;
    accesserver();
  } else {
    pmail.innerHTML=("This is a Valid Email Address");
    pmail.style.color='green';
    allowedmail=true;
    accesserver();
  }

}
password.oninput=function(){
  if (password.value.length<7){
    ppassword.innerHTML="The password need at least "+(7-password.value.length)+" more caracters.";
    ppassword.style.color='red';
    allowedpassword=false;
    accesserver();
  } else {
    if (password.value!=confirm.value){
      ppassword.innerHTML="Password is all right";
      ppassword.style.color='green';
      matchespassword=false;
      allowedpassword=true;
      pconfirm.innerHTML="The passwords doesn't matches.";
      pconfirm.style.color='red';
      accesserver();
    } else {
      ppassword.innerHTML="Password is all right";
      ppassword.style.color='green';
      pconfirm.innerHTML="The passwords matches.";
      pconfirm.style.color='green';
      matchespassword=true;
      allowedpassword=true;
      accesserver();
    }
  }
}
confirm.oninput=function(){
  if (password.value!=confirm.value){
    pconfirm.innerHTML="The passwords doesn't matches.";
    pconfirm.style.color='red';
    matchespassword=false;
    accesserver();
  } else {
    matchespassword=true;
    pconfirm.innerHTML="The passwords matches.";
    pconfirm.style.color='green';
    accesserver();
  }
}
function accesserver(){
  if(allowedmail&&allowedpassword&&matchespassword){
    btn[1].removeAttribute('disabled');
  } else {
    if (!btn[1].getAttribute('disabled')){btn[1].setAttribute('disabled','true');}
  }
}
