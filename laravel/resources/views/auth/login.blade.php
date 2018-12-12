@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <p id="email"></p>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>@if ($errors->has('email')){{ $errors->first('email') }}@endif</strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <p id="password"></p>

                                    <span class="invalid-feedback" role="alert">
                                        <strong>  @if ($errors->has('password')){{ $errors->first('password') }}@endif</strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" disabled>
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
</script>
@endsection
