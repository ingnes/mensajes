@extends('layouts.app')

@section('contenido')

@if (Session()->has('success'))
    <h3> {{ Session('success') }}</h3>
@endif

@if (Session()->has('errors'))
    <h3> {{ Session('errors') }}</h3>
@endif

<h1>Todos los mensajes</h1>

<div>
     <a href="{{url('mensajes-exportar')}}">Exportar</a> 
     <a href="{{url('mensajes-importar')}}">Importar</a>      
</div>

{{-- <div>
    <form action="{{url('mensajes-importar')}}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <input type="file" name="file">
        <button type="submit">Importar</button>   
    </form>

</div> --}}

@if ($mensajes->count())

    <table>    
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>       

            @foreach ($mensajes as $m)
                <tr>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->mensaje }}</td>
                    <td> 
                        <a href="{{route('mensajes.show',$m->id)}}">👁</a>
                        <a href="{{route('mensajes.edit',$m->id)}}">📗</a>
                        <form action="{{route('mensajes.destroy',$m->id)}}" method="POST" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit"> ❌ </button>
                        </form>                    

                    </td>
                </tr>
                        
            @endforeach
        
        </tbody>
    </table>

@else
    <table style="width:100%; border:1px solid">
        <tbody>
            <tr> No hay mensajes cargados </tr>
        </tbody>
    </table>

@endif

@endsection