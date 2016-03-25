@extends('template')
@section("title")
Report
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
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/report/new') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Je ne serais pas là : </label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name="ancienneDateLivraison" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Liste contrats</label>
                                            <div class="col-md-6">
                                                @if(count($contrats) > 0)
                                                @foreach ($contrats as $key=> $contrat)
                                                    <input type="checkbox" value="{{$contrat[0]->id}}" /> {{$contrat[0]->titre}}<br>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date de report : </label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name="nouvelleDateLivraison" value="">
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