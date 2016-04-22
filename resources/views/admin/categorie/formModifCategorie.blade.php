@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h2>Modifier une catégorie</h2>
                    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier la catégorie</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/modifier-categorie/'.$categorie->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Libelle</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="libelle" value="{{$categorie->libelle }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Producteur</label>
                                <div class="col-md-6">
                                    <select class=form-control name="producteur">
                                        <option  value="">Choix</option>                
                                        @foreach ($producteurs as $prod)  
                                        @if($prod->id == $categorie->producteur_id )
                                         <option selected value={{$categorie->producteur_id}}>{{$prod->nom." ".$prod->prenom}}</option>                  
                                        @else
                                         <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                         @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Type de Panier</label>
                                <div class="col-md-6">
                                        <select class="form-control" name="typePanier">
                                          <option selected value="">Choix</option>       
                                        @foreach ($typepaniers as $typepanier)

                                        @if($categorie->typePanier_id == $typepanier->id)
                                        <option selected value={{$typepanier->id}}>{{$typepanier->libelle}}</option>
                                        @else             
                                        <option value={{$typepanier->id}}>{{$typepanier->libelle}}</option>
                                        @endif        

                                        @endforeach
                                        </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Réferent</label>
                                <div class="col-md-6">
                                    <select class=form-control name="referent">
                                      <option  value="">Choix</option>       
                                        @foreach ($referents as $ref)   
                                         @if($ref->id == $categorie->referent_id )
                                          <option selected value={{$ref->id}}>{{$ref->prenom." ".$ref->nom}}</option>
                                         @else                
                                           <option value={{$ref->id}}>{{$ref->nom." ".$ref->prenom}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Périodicité</label>
                                <div class="col-md-6">
                                     <select class=form-control name="periode">
                                      <option value="">Choix</option>       
                                     @foreach ($periodicites as $key => $value)
                                     @if($value->id == $periode1->id)
                                        <option value="{{$value->id}}" selected>{{$value->libelle}}</option>
                                     @else
                                      <option value="{{$value->id}}">{{$value->libelle}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Périodicité</label>
                                <div class="col-md-6">
                                     <select class=form-control name="periode2">
                                      <option selected value="">Choix</option>       
                                     @foreach ($periodicites as $key => $value)
                                     @if($value->id == $periode1->id)
                                        <option value="{{$value->id}}" selected>{{$value->libelle}}</option>
                                     @else
                                      <option value="{{$value->id}}">{{$value->libelle}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Périodicité</label>
                                <div class="col-md-6">
                                     <select class=form-control name="periode3">
                                      <option selected value="">Choix</option>       
                                     @foreach ($periodicites as $key => $value)
                                     @if($value->id == $periode1->id)
                                        <option value="{{$value->id}}" selected>{{$value->libelle}}</option>
                                     @else
                                      <option value="{{$value->id}}">{{$value->libelle}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Modifier</button>
                                    <a href="{{url('liste-categorie     /') }}" class="btn btn-info btn-sm">Annuler</a>
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
