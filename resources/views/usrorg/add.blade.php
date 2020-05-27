@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Crear relación con una organización</div>
            <div class="card-body">
                <form action="{{action('UserOrgController@create')}}" method="post">
                    @csrf
                    <div class="form-group row">
                            <label for="id_cat_org" class="col-md-4 col-form-label text-md-right">Organización</label>

                            <div class="col-md-6">
                                <select class="form-control" id="id_org" name="id_org">
                                    @foreach($orgs as $o)
                                        <option value="{{$o->id_org}}">
                                            {{$o->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <input type="hidden" name="id_user" id="id_user" value="{{$user}}">
                    <button type="submit" class="btn btn-info">Crear relación</button>
                </form>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection