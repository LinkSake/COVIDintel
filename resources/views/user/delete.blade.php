@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Eliminar mi usuario</div>
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    Una vez eliminado un usuario, no podrás recuperarlo
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info">
                        {{$user[0]->name}} {{$user[0]->lastname_f}} {{$user[0]->lastname_m}}
                    </li>
                    <li class="list-group-item">
                        <b>Email: </b>
                        {{$user[0]->email}}
                    </li>
                    <li class="list-group-item">
                        <b>Teléfono: </b>
                        {{$user[0]->phone}}
                    </li>
                    <li class="list-group-item">
                        <b>CURP: </b>
                        {{$user[0]->curp}}
                    </li>
                    <li class="list-group-item">
                        <b>PC: </b>
                        {{$user[0]->pc}}
                    </li>
                    <li class="list-group-item">
                        <b>Internet: </b>
                        @if ($user[0]->internet == 1)
                            <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <b>Celular: </b>
                        @if ($user[0]->mobile == 1)
                            <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <b>Datos móviles: </b>
                        @if ($user[0]->mobile_data == 1)
                            <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </li>
                    @foreach($pc as $p)
                        @if($user[0]->id_os_pc == $p->id_os_pc)
                            <li class="list-group-item">
                                <b>SO PC: </b>
                                {{$p->os}}
                            </li>
                        @endif
                    @endforeach
                    @foreach($mobile as $m)
                        @if($user[0]->id_os_mobile == $m->id_os_mobile)
                            <li class="list-group-item">
                                <b>SO móvil: </b>
                                {{$m->os}}
                            </li>
                        @endif
                    @endforeach
                    <div style="float: right; margin-top: 1rem !important;">
                        <form action="{{action('UserController@delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$user[0]->id_user}}">
                            <button type="submit" class="btn btn-danger">Eliminar usuario</button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection