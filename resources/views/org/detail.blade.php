@extends('layouts.app')

@if(isset($org))
    @php
        $title = 'Editar organización';
        $id = $org[0]->id_org;
        $name = $org[0]->name;
        $address = $org[0]->address;
        $email = $org[0]->email;
        $phone = $org[0]->phone;
        $id_cat_org = $org[0]->id_cat_org;
        $id_admin = $org[0]->id_admin;
        $action = 'OrganizationController@update';
    @endphp
@else
    @php
        $title = 'Nueva organización';
        $id = 0;
        $name = '';
        $address = '';
        $email = '';
        $phone = 0000;
        $id_cat_org = 1;
        $id_admin = $me;
        $action = 'OrganizationController@create';
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

                            <input type="hidden" name="id_admin" id="id_admin" value="{{$id_admin}}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$address}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$email}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{$phone}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_cat_org" class="col-md-4 col-form-label text-md-right">Categoría</label>

                            <div class="col-md-6">
                                <select class="form-control" id="id_cat_org" name="id_cat_org">
                                    @foreach($cat as $c)
                                        @if($id_cat_org == $c->id_cat_org)
                                            <option value="{{$c->id_cat_org}}" selected>
                                        @else
                                            <option value="{{$c->id_cat_org}}">
                                        @endif
                                            {{$c->category}}
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