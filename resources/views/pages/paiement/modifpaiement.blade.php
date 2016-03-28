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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('update-paiement/'.$paiement->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="number" id="nbPanier" class="form-control" name="producteur" value="{{$paiement->producteur_id}}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mois</label>
                                <div class="col-md-6">
                                    <select class=form-control name="mois" >
                                        <option seleted value={{$paiement->mois}}>{{$paiement->mois}}</option>
                                        @foreach ($mois as $m)                    
                                        <option value={{$m}}>{{$m}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Adherant</label>
                                <div class="col-md-6">
                                    <select class=form-control name="amapien" >
                                        @foreach ($adherants as $adherant) 
                                        @if($paiement->id==$adherant->id) 
                                        <option selected value={{$adherant->id}}>{{$adherant->nom." ".$adherant->prenom}}</option>
                                        @else                  
                                        <option value={{$adherant->id}}>{{$adherant->nom." ".$adherant->prenom}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contrat</label>
                                <div class="col-md-6">
                                    <select class=form-control id="prod" name="contrat_id" >
                                        @foreach ($contrats as $key=>$prod)  
                                         @if($paiement->id==$adherant->id)                   
                                            <option selected id={{$prod->prix."e".$prod->periodicite_id}} value={{$prod->id}} >{{$categories[$prod->id]->libelle." - ".$adherants[$key]->prenom." ".$adherants[$key]->nom}}</option>
                                        @else
                                            <option id={{$prod->prix."e".$prod->periodicite_id}} value={{$prod->id}} >{{$categories[$prod->id]->libelle." - ".$adherants[$key]->prenom." ".$adherants[$key]->nom}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>                                
                                </div>
                            </div>
                            
  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre de panier</label>
                                <div class="col-md-6">
                                    <input type="number" id="nbPanier" class="form-control" name="nbPanier" value="{{$paiement->nbPanier}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coût</label>
                                <div class="col-md-6">
                                    <input type="number " id="prix" class="form-control"  name="cout" value="{{$paiement->cout}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Numero de cheque</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="numero" value="{{$paiement->numeroCheque }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Banque</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="banque" value="{{$paiement->Banque}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Titulaire</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="titulaire" value="{{$paiement->titulaire}}">
                                </div>
                            </div> 

                             <div class="form-group">
                                <label class="col-md-4 control-label">Montant</label>
                                <div class="col-md-6">
                                    <input type="number" id="montant" class="form-control" name="montant" value="{{$paiement->montant}}">
                                </div>
                            </div> 

                                <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" onclick="test()">Modifier</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection