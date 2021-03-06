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
                                <div class="panel-heading">NOUVEAU</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/contrats/new') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">titre</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="titre" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">vacance</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="vacance" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">categorie_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="categorie_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">debutLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" id="champ_date" class="form-control" name="debutLivraison" value="">
                                            </div>
                                            <div id="calendarMain"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">dateDeFinLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="dateDeFinLivraison" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">AJOUTER</button>
                                            </div>
                                        </div>

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