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
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('contratsClients/update') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Modèle de contrat</label>
                                            <div class="col-md-8">
                                                <select class=form-control name="contrat_id">
                                                    
                                                    @foreach ($contrats as $contrat) 
                                                        @if($contrat_id == $contrat->id) 
                                                            <option selected value={{$contrat_id}}>{{$contrat->titre}}</option>  
                                                        @else               
                                                            <option value={{$contrat->id}}>{{$contrat->titre}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Périodicité</label>
                                            <div class="col-md-8">
                                                <select class=form-control name="periodicite_id">
                                                    
                                                    @foreach ($periodicites as $p) 
                                                        @if($periodicite_id== $p->id) 
                                                            <option selected value={{$periodicite_id}}>{{$p->libelle}}</option>  
                                                        @else               
                                                            <option value={{$p->id}}}>{{$p->libelle}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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