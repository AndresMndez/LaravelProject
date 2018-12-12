input=document.getElementsByTagName('input');
btn=document.getElementsByTagName('button');
p=document.getElementsByTagName('p');
strong=document.getElementsByTagName('strong');
pmail=p['email'];
ppassword=p['password'];
mail=input['email'];
password=input['password'];
var allowedmail=false;
var allowedpassword=false;
mail.onfocus=function(){

  if(mail.value!=""){
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
  if(strong[0].innerHTML){
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
password.oninput=function(){
  if(strong[1].innerHTML){
    strong[1].innerHTML="";
  }
  if (password.value.length<7){
    ppassword.innerHTML="The password need at least "+(7-password.value.length)+" more.";
    ppassword.style.color='red';
    allowedpassword=false;
    accesserver();
  } else {
      ppassword.innerHTML="Password is allright";
      ppassword.style.color='green';
      allowedpassword=true;
      accesserver();
    }
  }
function accesserver(){
  if(allowedmail&&allowedpassword){
    btn[1].removeAttribute('disabled');
  } else {
    if (!btn[1].getAttribute('disabled')){btn[1].setAttribute('disabled','true');}
  }
}
