@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Eliminar mi organización</div>
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    Una vez eliminada una organización, no podrás recuperarla
                </div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info">{{$org[0]->name}}</li>
                    <li class="list-group-item">
                        <b>Email: </b>
                        {{$org[0]->email}}
                    </li>
                    <li class="list-group-item">
                        <b>Teléfono: </b>
                        {{$org[0]->phone}}
                    </li>
                    @foreach($cat as $c)
                        @if($org[0]->id_cat_org == $c->id_cat_org)
                            <li class="list-group-item">
                                <b>Categoría: </b>
                                {{$c->category}}
                            </li>
                        @endif
                    @endforeach
                    </li>
                    <div style="float: right; margin-top: 1rem !important;">
                        <form action="{{action('OrganizationController@delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$org[0]->id_org}}">
                            <input type="hidden" name="id_admin" id="id_admin" value="{{$org[0]->id_admin}}">
                            <button type="submit" class="btn btn-danger">Eliminar organización</button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection