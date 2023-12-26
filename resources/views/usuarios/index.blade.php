@extends('layouts.app')


@section('contenido')

<h3 class="text-white bg-slate-600 mx-auto text-xl text-center"> Bienvenido al modulo de usuarios</h3>

<table class="w-full table-auto border-collapse border border-slate-400 text-center">    
    <thead class="text-sm">
        <tr>
            <th class="border border-slate-300">ID</th>
            <th class="border border-slate-300">Nombre</th>
            <th class="border border-slate-300">Email</th>
            <th class="border border-slate-300">Rol</th>
            <th class="border border-slate-300">Acciones</th>
                       
        </tr>
    </thead>

    <tbody>       

        @foreach ($users as $u)
            <tr>
                <td class="border border-slate-300">{{ $u->id }}</td>
                <td class="border border-slate-300">{{ $u->name }}</td>
                <td class="border border-slate-300">{{ $u->email }}</td>
                <td class="border border-slate-300">
                    <ul>
                        @foreach ($u->roles as $rol) 
                        <li> {{  $rol->display_name }} </li>                    
                        @endforeach
                    </ul>
                </td> 
                <td class="border border-slate-300"></td>           
               
            </tr>
                    
        @endforeach
    
    </tbody>
</table>

@endsection