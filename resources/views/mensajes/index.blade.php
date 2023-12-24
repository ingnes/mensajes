@extends('layouts.app')

@section('contenido')

@if (Session()->has('success'))
    <h3> {{ Session('success') }}</h3>
@endif

@if (Session()->has('errors'))
    <h3> {{ Session('errors') }}</h3>
@endif

<h1 class="mt-10 bg-gradient-to-r from-indigo-400 to-green-600 bg-clip-text 
text-center text-4xl font-extrabold text-transparent sm:text-xl">Todos los mensajes</h1>

<div>
     <a href="{{url('mensajes-exportar')}}">Exportar</a> 
     {{-- <a href="{{url('mensajes-importar')}}">Importar</a>       --}}
</div>

<div>
    <form action="{{url('mensajes-importar')}}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <input type="file" name="file">
        <button type="submit">Importar</button>   
    </form>

</div>

@if ($mensajes->count())

    <table class="w-full table-auto border-collapse border border-slate-400 text-center">    
        <thead class="text-sm">
            <tr>
                <th class="border border-slate-300">Nombre</th>
                <th class="border border-slate-300">Email</th>
                <th class="border border-slate-300">Mensaje</th>
                <th class="border border-slate-300">Acciones</th>
            </tr>
        </thead>

        <tbody>       

            @foreach ($mensajes as $m)
                <tr>
                    <td class="border border-slate-300">{{ $m->nombre }}</td>
                    <td class="border border-slate-300">{{ $m->email }}</td>
                    <td class="border border-slate-300">{{ $m->mensaje }}</td>
                    <td class="border border-slate-300"> 
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