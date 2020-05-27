@extends('layouts.app')

@if(isset($user))
    @php
        $title = 'Editar usuario';
        $id = $user[0]->id_user;
        $name = $user[0]->name;
        $lastname_f = $user[0]->lastname_f;
        $lastname_m = $user[0]->lastname_m;
        $email = $user[0]->email;
        $phone = $user[0]->phone;
        $curp = $user[0]->curp;
        $pc = $user[0]->pc;
        $mobile = $user[0]->mobile;
        $internet = $user[0]->internet;
        $mobile_data = $user[0]->mobile_data;
        $id_os_pc =$user[0]->id_os_pc;
        $id_os_mobile =$user[0]->id_os_mobile;
        $action = 'UserController@update';
    @endphp
@else
    @php
        $title = 'Nuevo usuario';
        $id = 0;
        $name = ' ';
        $lastname_f = '';
        $lastname_m = '';
        $email = '';
        $password = '';
        $phone = 0000;
        $curp = '';
        $pc = 'ESCRITORIO';
        $mobile = false;
        $internet = false;
        $mobile_data = false;
        $id_os_pc = null;
        $id_os_mobile = null;
        $action = 'UserController@create';
    @endphp
@endif




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>
                <div class="card-body">
                    <form method="POST" action="{{action($action)}}">
                        @csrf
                        @if($id != 0)
                            <input type="hidden" name="id" id="id" value="{{$id}}">
                        @endif

                        @if($admin)
                            <input type="hidden" name="admin" id="admin" value="{{$admin}}">
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname_f" class="col-md-4 col-form-label text-md-right">Apellido paterno</label>

                            <div class="col-md-6">
                                <input id="lastname_f" type="text" class="form-control" name="lastname_f" value="{{$lastname_f}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname_m" class="col-md-4 col-form-label text-md-right">Apellido materno</label>

                            <div class="col-md-6">
                                <input id="lastname_m" type="text" class="form-control" name="lastname_m" value="{{$lastname_m}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$email}}" required autofocus>
                            </div>
                        </div>

                        @if($id == 0)
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{$password}}" required autofocus>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{$phone}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="curp" class="col-md-4 col-form-label text-md-right">CURP</label>

                            <div class="col-md-6">
                                <input id="curp" type="text" class="form-control" name="curp" value="{{$curp}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pc" class="col-md-4 col-form-label text-md-right">PC</label>

                            <div class="col-md-6">
                                <select class="form-control" id="pc" name="pc">
                                        @if($pc == 'ESCRITORIO')
                                            <option value="ESCRITORIO" selected>ESCRITORIO</option>
                                            <option value="LAPTOP">LAPTOP</option>
                                        @else
                                            <option value="ESCRITORIO">ESCRITORIO</option>
                                            <option value="LAPTOP" selected>LAPTOP</option>
                                        @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="internet" class="col-md-4 col-form-label text-md-right">¿Tienes internet en casa?</label>
                            <div class="col-md-6">
                                @if($internet)
                                <input type="checkbox" class="form-control" name="internet" id="internet" checked>
                                @else
                                <input type="checkbox" class="form-control" name="internet" id="internet">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">¿Tienes un celular?</label>
                            <div class="col-md-6">
                                @if($mobile)
                                <input type="checkbox" class="form-control" name="mobile" id="mobile" checked>
                                @else
                                <input type="checkbox" class="form-control" name="mobile" id="mobile">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_data" class="col-md-4 col-form-label text-md-right">¿Tienes datos móviles?</label>
                            <div class="col-md-6">
                                @if($mobile_data)
                                <input type="checkbox" class="form-control" name="mobile_data" id="mobile_data" checked>
                                @else
                                <input type="checkbox" class="form-control" name="mobile_data" id="mobile_data">
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="id_os_pc" class="col-md-4 col-form-label text-md-right">Si tienes una PC ¿cuál es su sistema operativo?</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_os_pc" name="id_os_pc">
                                    @foreach($os_pc as $p)
                                        @if($id_os_pc == $p->id_os_pc)
                                            <option value="{{$p->id_os_pc}}" selected>
                                        @else
                                            <option value="{{$p->id_os_pc}}">
                                        @endif
                                            {{$p->os}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_os_mobile" class="col-md-4 col-form-label text-md-right">Si tienes una celular ¿cuál es su sistema operativo?</label>

                            <div class="col-md-6">
                                <select class="form-control" id="id_os_mobile" name="id_os_mobile">
                                    @foreach($os_mobile as $m)
                                        @if($id_os_mobile == $m->id_os_mobile)
                                            <option value="{{$m->id_os_mobile}}" selected>
                                        @else
                                            <option value="{{$m->id_os_mobile}}">
                                        @endif
                                            {{$m->os}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{$title}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection