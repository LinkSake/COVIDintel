@extends('layouts.base')

@if(isset($dato))
    @php
        $title = 'Editar datos';
        $id = $dato[0]->id_dat_bio;
        $temp = $dato[0]->temp;
        $tos = $dato[0]->tos;
        $obs = $dato[0]->obs;
        $fecha = $dato[0]->fecha;
        $id_usr_org = $dato[0]->id_usr_org;
        $action = 'DatosController@update';
    @endphp
@else
    @php
        $title = 'Crear datos';
        $id = 0;
        $temp = false;
        $tos = false;
        $obs = '';
        $fecha = '';
        $id_usr_org = 1;
        $action = 'DatosController@create';
    @endphp
@endif

@section('card_title')
<span>{{$title}}</span>
<div style="float: right;">
<a href="{{ url('dato/listado') }}" style="color: white;">
    <svg class="bi bi-arrow-return-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M5.854 5.646a.5.5 0 010 .708L3.207 9l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13.5 2.5a.5.5 0 01.5.5v4a2.5 2.5 0 01-2.5 2.5H3a.5.5 0 010-1h8.5A1.5 1.5 0 0013 7V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
    </svg>
</a>
</div>
@endsection

@section('content')
    <form action="{{action($action)}}" method="post">
        {{csrf_field()}}
        @if($id != 0)
        <input type="hidden" name="id" id="id" value="{{$id}}">
        @endif
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Temperatura</label>
                @if($temp)
                <input type="checkbox" class="form-control" name="temp" id="temp" checked>
                @else
                <input type="checkbox" class="form-control" name="temp" id="temp">
                @endif
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tos</label>
                @if($tos)
                <input type="checkbox" class="form-control" name="tos" id="tos" checked>
                @else
                <input type="checkbox" class="form-control" name="tos" id="tos">
                @endif
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Observaciones</label>
                <input type="text" class="form-control" name="obs" id="obs" value="{{$obs}}" required>
            </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Fecha</label>
                    <div class='input-group date' id='datetimepicker1' name='fecha'>
                        <input type='text' class="form-control" name='fecha' id='fecha' placeholder="{{$fecha}}" required/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sel1">Usuario - Organización:</label>
                <select class="form-control" id="id_usr_org" name="id_usr_org">
                    <option value=1>1</option>
                    <option value=2>2</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="{{$title}}">
<script>
$(function () {
    $('#datetimepicker1').datetimepicker();
});
</script>
    </form>
@endsection