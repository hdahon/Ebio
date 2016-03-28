@extends('template')
@section("title")

@endsection
@section('content')
<div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" id="form_contratClien   " action="{{ url('/date-livraison') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         <input type="hidden" value="{{$contratclient_id}}" name="contratclient_id" />
                                            <input type="hidden" value="{{$amapiens->id}}"   name="amapien_id"/>  

                                    @if(strtolower($periodicite->libelle)==strtolower("Ponctuel"))
                                        <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>  
                                         <h3>{{$livraisons->dateLivraison}}</h3>
                                         @foreach ($produits as $key=>$p)   
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">{{$p->nomProduit}}</label>
                                           <div class="col-md-8">
                                                <input type="checkbox" name="produit[]" value="{{$p->id}}" requierd="requierd" />
                                                <input type="number" value="0" name='quantite[]'/>
                                                <input type="hidden" value="{{$p->prix}}" name="prix[]"/><br></br>
                                                <input type="hidden" value="{{$livraisons['id']}}" name="livraisons[]" /><br></br>
                                        </div> 
                                    </div>
                                         @endforeach 
                                    @elseif(strtolower($periodicite->libelle)==strtolower("Bi-Mensuel semaine impaire"))
                                        <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>
                                        @foreach ($livraisons as $key=>$l) 
                                            @if($l->semaine %2 !=0)
                                                <input type="hidden" value="{{$l->id}}"   name="livraisons[]"/>
                                            @endif
                                        @endforeach  
                                        <h1>Choix du produit</h1>
                                         @foreach ($produits as $key=>$p) 
                                        
                                          <div class="form-group">
                                                <div class="col-md-8">
                                                    {{$p->nomProduit}} & Quantité<input type="radio" name="produit" value="{{$p->id}}"  />
                                                    <input type="number" name="quantite" value="1"  />
                                                    <input type="hidden" value="{{$p->prix}}" name="prix"/><br></br>
                                                </div>
                                            </div>
                                           
                                         @endforeach
                                     
                                @elseif(strtolower($periodicite->libelle)==strtolower("Bi-Mensuel semaine paire"))
                                         <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>
                                        @foreach ($livraisons as $key=>$l) 
                                            @if($l->semaine %2 ==0)
                                                <input type="hidden" value="{{$l->id}}" name="livraisons[]" /><br></br>
                                            @endif
                                         @endforeach 
                                         <h1>Choix du produit</h1>    
                                         @foreach ($produits as $key=>$p)  
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    {{$p->nomProduit}} & Quantité<input type="radio" name="produit" value="{{$p->id}}"  />
                                                    <input type="number" name="quantite" value="1"  />
                                                    <input type="hidden" value="{{$p->prix}}" name="prix"/><br></br>
                                                </div>
                                            </div>
                                           
                                         @endforeach    
                                    
                                @elseif(strtolower($periodicite->libelle)==strtolower("Mensuel semaine paire"))
                                         <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>
                                         <h1>Choisir la semaine </h1>
                                        @foreach ($livraisons as $key=>$l) 
                                            @if($l->semaine %2 ==0)
                                              {{date_format(date_create($l->dateLivraison),'d-m-Y')}} <input type="checkbox" value="{{$l->id}}" name="livraisons[]" />
                                            @endif
                                         @endforeach 
                                         <h1>Choix du produit</h1>    
                                         @foreach ($produits as $key=>$p)  
                                           <div class="form-group">
                                                <div class="col-md-8">
                                                    {{$p->nomProduit}} & Quantité<input type="radio" name="produit" value="{{$p->id}}"  />
                                                    <input type="number" name="quantite" value="1"  />
                                                    <input type="hidden" value="{{$p->prix}}" name="prix"/><br></br>
                                                </div>
                                            </div>
                                           
                                         @endforeach    
                                         
                                @elseif(strtolower($periodicite->libelle)==strtolower("Mensuel semaine impaire"))
                                         <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>
                                         <h1>Choisir la semaine </h1>
                                        @foreach ($livraisons as $key=>$l) 
                                            @if($l->semaine %2 !=0)

                                               Date <input type="checkbox" value="{{$l->id}}" name="livraisons[]" />
                                            @endif
                                         @endforeach 
                                         <h1>Choix du produit</h1>    
                                         @foreach ($produits as $key=>$p)  
                                           <div class="form-group">
                                                <div class="col-md-8">
                                                    {{$p->nomProduit}} & Quantité<input type="radio" name="produit" value="{{$p->id}}"  />
                                                    <input type="number" name="quantite" value="1"  />
                                                    <input type="hidden" value="{{$p->prix}}" name="prix"/><br></br>
                                                </div>
                                            </div>
                                           
                                         @endforeach    
                                                       
                                @elseif(strtolower($periodicite->libelle)==strtolower("Hebdomadaire"))
                                         <input type="hidden" value="{{$periodicite->libelle}}"   name="periode"/>
                                        @foreach ($livraisons as $key=>$l) 
                                            
                                                <input type="hidden" value="{{$l->id}}" name="livraisons[]" /><br></br>
                                         
                                         @endforeach 
                                         <h1>Choix du produit</h1>    
                                         @foreach ($produits as $key=>$p)  
                                           <div class="form-group">
                                                <div class="col-md-8">
                                                    {{$p->nomProduit}} & Quantité<input type="radio" name="produit" value="{{$p->id}}"  />
                                                    <input type="number" name="quantite" value="1"  />
                                                    <input type="hidden" value="{{$p->prix}}" name="prix"/><br></br>
                                                </div>
                                            </div>
                                         @endforeach    
                                         @endif

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
               
@endsection