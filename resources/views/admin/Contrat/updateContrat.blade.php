@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">MODIFIER</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('contrats/update') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">titre</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="titre" value="{{$titre}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">vacance</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="vacance" value="{{$vacance}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">categorie_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="categorie_id" value="{{$categorie_id}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">debutLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="debutLivraison" value="{{$debutLivraison}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">dateDeFinLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="dateDeFinLivraison" value="{{$dateDeFinLivraison}}" >
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