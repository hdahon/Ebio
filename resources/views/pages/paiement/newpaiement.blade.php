@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Remise cheque</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="GET" action="{{ url('create-paiement-etape2') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Amapien</label>
                                <div class="col-md-6">
                                    <select class=form-control name="amapien" onchange="test">
                                        @foreach ($adherants as $adherant)                    
                                        <option value={{$adherant->id}}>{{$adherant->nom." ".$adherant->prenom}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contrat</label>
                                <div class="col-md-6">
                                    <select class=form-control id="prod" name="contrat" >
                                        <option selected>Selectionnez un contrat </option>
                                        @foreach ($contrats as $key=>$c)                    
                                        <option  value={{$c->id}} >{{$categories[$key]->libelle." - ".$adherants[$key]->prenom." ".$adherants[$key]->nom}}</option>
                                        @endforeach
                                        
                                    </select>                                
                                </div>
                            </div>
                                <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" >Suivant</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection