@extends('layouts.app')

@section('contenido')

<h2> Edicion de mensaje</h2>

 <form action="{{ route('mensajes.update',$mensaje->id)}}" method="POST">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}
   <p> <label for="nombre">Nombre
    <input type="text" name="nombre" value="{{ $mensaje->nombre }}">
    <span class="error">{{$errors->first('nombre')}}</span>
    </label> </p>

    <p><label for="email">Email
    <input type="email" name="email" value="{{ $mensaje->email }}">
    <span class="error"> {{$errors->first('email') }}</span>
    </label></p>
    

    <p><label for="mensaje">Mensaje
    <textarea style="resize:none;" name="mensaje" cols="30" rows="5">{{ $mensaje->mensaje }}</textarea>
    <span class="error">{{$errors->first('mensaje')}}</span>
    </label></p>

    <input type="submit" value="enviar">
 </form>

@endsection