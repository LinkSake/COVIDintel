@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Mi cuenta</div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                            <a href="{{ url('user/edit/'.$me.'/'.$org) }}" class="btn btn-success" role="button">
                                Editar
                            </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href=" {{url('user/delete/'.$me) }}" class="btn btn-danger" role="button">
                            Eliminar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Mi organización</div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                            <a href="{{ url('org/edit/'.$org) }}" class="btn btn-success" role="button">
                                Editar
                            </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href="{{ url('org/delete/'.$org) }}" class="btn btn-danger" role="button">
                            Eliminar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header">Usuarios en tu organización</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">PC</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Internet</th>
                        <th scope="col">Datos moviles</th>
                        <th scope="col">SO PC</th>
                        <th scope="col">SO Celular</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->name}}</th>
                                <td>{{$user->lastname_f}} {{$user->lastname_m}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->pc}}</td>

                                @if ($user->mobile == 1)
                                <td>
                                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @else
                                <td>
                                    <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @endif
                                @if ($user->internet == 1)
                                <td>
                                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @else
                                <td>
                                    <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @endif
                                @if ($user->mobile_data == 1)
                                <td>
                                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @else
                                <td>
                                    <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                                    </svg>
                                </td>
                                @endif

                                <td>{{$user->os_pc}}</td>
                                <td>{{$user->os_mobile}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 d-flex justify-content-center" style="margin-top:10px; ">
        <a href="{{ url('dato/listado') }}" class="btn btn-primary" role="button">
            Datos Biometricos
        </a>
</div>

@endsection