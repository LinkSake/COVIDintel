@extends('layouts.base')

@section('card_title')
<span>¿Estás seguro de que quieres eliminar el dato?</span>
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
<div class="alert alert-danger" role="alert">
    Una vez eliminado un dato, no podrás recuperarlo
</div>
<ul class="list-group">
    <div style="float: right; margin-top: 1rem !important;">
        <form action="{{action('DatosController@delete')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id" value="{{$dato[0]->id_dat_bio}}">
            <button type="submit" class="btn btn-danger">Eliminar datos</button>
        </form>
    </div>
</ul>
@endsection