@extends('template')
@section("title")
Report
@endsection
@section('content')
<?php
    $date=date("Y-m-d");

    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }

?>
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

                                            @if ($niveau ==1)
                                            <label class="col-md-4 control-label">Je ne serais pas là : </label>
                                            @endif
                                            @if ($niveau !=1)
                                            <label class="col-md-4 control-label">Sera absent : </label>
                                            <div class="col-md-6">
                                                <select id="amapien" class="form-control" name="amapien">
                                                    @foreach ($amapiens as  $amapien)
                                                    <option value="{{$amapien->id}}">{{$amapien->nom}} {{$amapien->prenom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <label class="col-md-4 control-label">le : </label>
                                            <br>
                                            @endif

                                            <div class="col-md-6">
                                                <select id="ancienneDateLivraison" class="form-control" name="ancienneDateLivraison">
                                                    @foreach ($contrats as $key=> $contrat)
                                                    <option value="{{$contrat[0]->debutLivraison}}">{{$contrat[0]->debutLivraison}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Liste contrats</label>
                                            <div class="col-md-6">
                                                @if(count($contrats) > 0)
                                                @foreach ($contrats as $key=> $contrat)
                                                    <input type="checkbox" onclick="dateMax('{{$contrat[0]->dateDeFinLivraison}}')" name="contrat" value="{{$contrat[0]->id}}" /> {{$contrat[0]->titre}}<br>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date de report : </label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" id="nouvelleDateLivraison" name="nouvelleDateLivraison" min="<?php echo $date; ?>" value="<?php echo $date; ?>">
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