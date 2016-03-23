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
                                    <form class="form-horizontal" role="form" method="POST" id="form_contratClient" action="{{ url('/contratsClients/new') }}">
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
                                        <p class="text-center">Choix produit et quantité</p>
                                         @foreach ($produits as $key=>$p)   
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">{{$p->nomProduit}}</label>
                                           <div class="col-md-8">
                                                <input type="checkbox" name="produit[]" value="{{$p->id}}" requierd="requierd" />
                                                <input type="number" value="0" name='quantite[]'/>
                                                <input type="hidden" value="{{$p->prix}}" name="prix[]"/><br></br>
                                                <select multiple class=form-control name="livraison_id[]" >
                                                     <option value="" selected>Choix</option>
                                                    @foreach ($livraisons as $key=>$l)
                                                        @if($l->semaine %2 ==0)
                                                            <option class="col-sm-2" value="{{$l->id}}" style="color:blue">{{$l->dateLivraison}} Semaine Paire</option>
                                                        @else    
                                                            <option class="col-sm-2" value="{{$l->id}}">{{$l->dateLivraison}} Semaine Impaire</option>
                                                        @endif
                                                     @endforeach    
                                                    </select>    
                                        </div> 
                                    </div>
                                         @endforeach 
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