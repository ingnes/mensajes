@extends('layouts.app')

@section('contenido')

<h1> Mensaje de {{ $mensaje->nombre }} - {{ $mensaje->email }}</h1>
<p> <b> {{ $mensaje->mensaje }} </b></p>


@endsection