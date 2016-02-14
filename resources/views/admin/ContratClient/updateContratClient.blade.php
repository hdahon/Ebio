@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("Admin/menu")
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">MODIFIER</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('contratsClients/update') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">contrat_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="contrat_id" value="{{$contrat_id}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">amapien_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="amapien_id" value="{{$amapien_id}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">periodicite_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="periodicite_id" value="{{$periodicite_id}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">MODIFIER</button>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="id" value="{{$id}}">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection