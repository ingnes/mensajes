@extends('layouts.app')

@section('contenido')

<h1>Todos los mensajes</h1>

<div>
    
    <form action="{{route('mensajes.export')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
       {{-- <input type="file" name="documento" id="docummento"> --}}
       <button type="submit">Exportar</button>
    </form>
</div>

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