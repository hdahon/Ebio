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
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/livraisons/new') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">dateLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="dateLivraison" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">quantite</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="quantite" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">amapien_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="amapien_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">produit_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="produit_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">producteur_id</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="producteur_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">dateDeLivraison</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="dateDeLivraison" value="">
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