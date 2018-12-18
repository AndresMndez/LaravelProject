
@extends ('layouts/applr')
@section('title')
  {{'Faqs'}}
@endsection
@section ('content')
    <h1 id="principal_pregunta">Preguntas Frecuentes</h1>
    <!-- CAJA DE PREGUNTAS -->
    <section class="questions">
      <ul>
        <a href="#answer_one"><li>¿Cómo pagar tu compra?</li></a>
        <li><a href="#answer_two">¿Cómo recibir o retirar el producto?</a></li>
        <li><a href="#answer_three">¿Como recupero el acceso a mi cuenta?</a></li>
        <li><a href="#answer_for">¿Como me registro?</a></li>
        <li><a href="#answer_five">Mi cuenta está bloqueada, ¿cómo la habilito?</a></li>
        <li><a href="#answer_six">¿Dónde puedo consultar los pagos realizados?</a></li>
        <li><a href="#answer_seven">¿Cómo obtengo mi comprobante de pago?</a></li>
      </ul>
    </section><!-- CAJA DE PREGUNTAS -->
    <!-- SECCION DE RESPUESTAS -->
    <section class="answers">
      <article id="answer_one">
        <h2>¿Cómo pagar tu compra?</h2>
        <p>Pagá con Mercado Pago y tu compra va a estar 100% protegida, si el producto no es lo que esperabas te devolvemos el dinero. Las reservas de vehículos y las contrataciones de servicios también se pagan con Mercado Pago. Así protegemos tu dinero hasta que nos confirmes que ya te entregaron el vehículo o te brindaron el servicio.</p>
      </article>
      <article id="answer_two">
        <h2>¿Cómo recibir o retirar el producto?</h2>
        <p>Revisá lo que hay que llevar: <br>Si retira el titular de la compra, tiene que ir con el DNI y el código de seguimiento.<br>Si retira otra persona mayor de edad, tiene que llevar la fotocopia del DNI del titular de la compra y el código de seguimiento. Para Correo Argentino, además necesita llevar su DNI y el Formulario de autorización de retiro. </p>
      </article>
      <article id="answer_three">
        <h2>¿Como recupero el acceso a mi cuenta?</h2>
        <p>Verificá que tu correo electrónico y contraseña son correctos. <br>Hacé click en "¿Olvidaste tu contraseña?" e ingresá el correo electrónico de tu cuenta. <br> Si esto no funciona, por favor, contactanos. Te vamos a responder lo más rápido 'posible. </p>
      </article>
      <article id="answer_for">
        <h2>¿Como me registro?</h2>
        <p>La única información que te vamos a pedir es una cuenta de correo electrónico válida y una contraseña. Luego de ingresar la información, te vamos a enviar un correo con un enlace para que puedas activar tu cuenta.</p>
      </article>
      <article id="answer_five">
        <h2>Mi cuenta está bloqueada, ¿cómo la habilito?</h2>
        <p>Luego de cinco intentos fallidos de intentar ingresar a tu cuenta de Todo Pago tu contraseña será bloqueada y recibirás un correo con la opción de recuperarla. Deberás completar la pregunta de seguridad, ingresar una nueva clave y quedará restablecida.</p>
      </article>
      <article id="answer_six">
        <h2>¿Dónde puedo consultar los pagos realizados?</h2>
        <p>En la sección “Últimos movimientos” encontrás los comprobantes de todos los pagos que hiciste. Podés consultarlos y compartirlos cuando quieras.</p>
      </article>
      <article id="answer_seven">
        <h2>¿Cómo obtengo mi comprobante de pago?</h2>
        <p>Al pagar, se generará automáticamente un comprobante de pago válido que podés visualizar desde la sección “Últimos movimientos”.</p>
      </article>
    </section><!-- SECCION DE RESPUESTAS -->
  <!-- CUERPO PRINCIPAL -->
  @endsection
