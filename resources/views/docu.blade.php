@extends('layouts.app')

@section('contenido')

<h2> Route</h2>
<p> El metodo Route recibe el nombre de una ruta (definida en el alias) y devuelve una url</p>
<h3> { route('contactos') }</h3>

<h2> clase Request </h2>
 <p> <b>Solicitudes o peticiones http realizadas por el usuario a traves del navegador, como ser el envio de un formulario </b></p>
  <h3> { request()->url() } Url actual : {{ request()->url()}}   </h3>
  <h3> { request()->is('/') }  {{ request()->is('/') ? 'Estas en el home' : 'No estas en el home'  }}</h3>
  <h3> { request()->all() }  Devuelve todos los datos de un formulario enviado, en formato JSON</h3>
  <h3> { request()->has('nombre') } Si la peticion tiene nombre, es decir si me viene un input con name nombre del formulario enviado por el usuario</h3>
  <h3> { request()->input('nombre') } Accedemos al valor del input con name nombre que me viene del formulario</h3>

<h2> clase Response : Respuesta del servidor a una solicitud de usuario</h2>
 <p> <b> Si devuelvo un array unidimensional o bidimensional desde la ruta o desde el controlador, Laravel lo convierte automaticamente en un JSON </b></p>
 <ul>
     <li> Primer parametro : COntenido de la respuesta</li>
     <li> Segundo parametro : Estado de la respuesta. Por default es 200 (OK)</li>
     <li> Tercer parametro : Header, lo paso como un array</li>
</ul>
<p>Inspecccionarlo en la consola del navegador, ver el status de la respuesta y los headers, y las cookies, que seran automaticamente encriptadas</p>
<p> <b>{ response('Esta es una respuesta',201)
         ->header('X-TOKEN','secret')
         ->header('X-TOKEN2','secret2')
         ->cookie('X-COOKIE','cookie') }</b>
</p>

<p> Si queremos cambiar el estado en la respuesta de 200 a 201</p>
<p> <b>{ response()->json(['data' =>$data],201) } </b></p>

<p> Si queremos redireccionar al home. La redireccion tiene el estado de espuesta 302</p>
<p> <b> { return redirect('/') }</b></p>

<p> Si queremos redireccionar a la ruta de nombre saludos</p>
<p><b> { return redirect()->route('saludos') }</b></p>

<p> Si queremos redireccionar a la ruta anterior</p>
<p><b> { return back() }</b></p>


@endsection 
