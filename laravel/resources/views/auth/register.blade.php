@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                  <p id='name'></p>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                <p id='email'></p>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>@if ($errors->has('email')){{ $errors->first('email') }}@endif</strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required min=8 max=30>
                                <p id="password"></p>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@if ($errors->has('password')){{ $errors->first('password') }}@endif</strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required min=8 max=30>
                                <p id="password_confirm"></p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
input=document.getElementsByTagName('input');
btn=document.getElementsByTagName('button');
p=document.getElementsByTagName('p');
span=document.getElementsByTagName('span');
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
  if (span[1].innerHTML){
    span[1].innerHTML="";
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
    var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!regexMail.test(mail.value))
    {
      if (span[0].innerHTML){
        span[0].innerHTML="";
      }
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
</script>
@endsection
