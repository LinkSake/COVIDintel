@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header">
                <span>
                    Compañias de las que soy parte
                </span>
                <div style="float: right;">
                    <a href="{{ url('rel/new/'.$user[0]->id_user) }}">
                        <span style="margin-right: .5 rem;">Asociarse con una compañía</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orgs as $o)
                            <tr>
                                <th scope="row">{{$o->name}}</th>
                                <td>{{$o->address}}</td>
                                <td>{{$o->email}}</td>
                                <td>{{$o->phone}}</td>
                                <td>
                                    <a href="{{ url('rel/delete/'.$o->id_org.'/'.$user[0]->id_user.'/'.$o->id_usr_org) }}">
                                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header">
                <span>
                    Mis datos
                </span>
                <div style="float: right;">
                <a href="{{ url('user/edit/'.$user[0]->id_user) }}">
                    <span style="margin-right: .5 rem;">Editar</span>
                </a>
                <span style="mr-1 ml-1"> | </span>
                <a href="{{ url('user/delete/'.$user[0]->id_user) }}">
                    <span style="margin-right: .5 rem;">Eliminar</span>
                </a>
                </div>
            </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                            <tr>
                                <th scope="row">{{$u->name}}</th>
                                <td>{{$u->lastname_f}} {{$u->lastname_m}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->pc}}</td>

                                @if ($u->mobile == 1)
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
                                @if ($u->internet == 1)
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
                                @if ($u->mobile_data == 1)
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

                                <td>
                                    @foreach($os_pc as $p)
                                        @if($u->id_os_pc == $p->id_os_pc)
                                            <p>{{$p->os}}</p>
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    @foreach($os_mobile as $m)
                                        @if($u->id_os_mobile == $m->id_os_mobile)
                                            <p>{{$m->os}}</p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection