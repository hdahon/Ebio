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
                                <div class="panel-heading">Nouveau contrat </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" id="form_contratClien" action="{{ url('/contratsClients/new') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Modèle de contrat</label>
                                            <div class="col-md-8">
                                                <input value={{$contrats->titre}} ></input>
                                                <input type="hidden" value="{{$contrats->id}}"   name="contrat_id"/>  
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Periodicite</label>
                                            <div class="col-md-8">
                                                <select class=form-control name="periodicite_id">
                                                        <option value={{$periode1->id}}>{{$periode1->libelle}}</option>
                                                        @if(count($periode2))
                                                            <option value={{$periode2->id}}>{{$periode2->libelle}}</option>
                                                        @endif    
                                                        @if(count($periode3))
                                                            <option value={{$periode3->id}}>{{$periode3->libelle}}</option>
                                                        @endif    
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" id="bt_add_contratClient" class="btn btn-primary">AJOUTER</button>
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