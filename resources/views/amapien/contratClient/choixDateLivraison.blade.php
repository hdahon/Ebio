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
                                <div class="panel-heading">Choix produit et quantité</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" id="form_contratClient" action="{{ url('/date-livraison') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if(strtolower($periodicite->libelle)==strtolower("Ponctuel"))
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
                                         <h3>Semaine impaire</h3>
                                         <table>
                                            <thead>
                                                <th>Date</th>
                                         @foreach ($produits as $key=>$p) 
                                                <th>$p->nomProduit</th>
                                         @endforeach 
                                         </thead>
                                         <tbody>
                                        @foreach ($livraisons as $key=>$l) 
                                        <tr>

                                        @if($l->semaine %2 !=0)
                                            <td>
                                                {{$livraisons->dateLivraison}} impaire
                                             <input type="hidden" value="{{$l->id}}" name="livraisons[]" /><br></br>
                                            </td>
                                         @foreach ($produits as $key=>$p) 
                                        <td>   
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">{{$p->nomProduit}}</label>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="produit[]" value="{{$p->id}}" requierd="requierd" />
                                                    <input type="number" value="0" name='quantite[]'/>
                                                    <input type="hidden" value="{{$p->prix}}" name="prix[]"/><br></br>
                                                </div> 
                                            </div>
                                        </td>    
                                         @endforeach
                                         @endif 
                                        </tr>
                                         @endforeach
                                     </tbody></table>
                                         @elseif(strtolower($periodicite->libelle)==strtolower("Bi-Mensuel semaine paire"))
                                         <h3>Semaine paire</h3>
                                         <table>
                                            <thead>
                                                <th>Date</th>
                                                 @foreach ($produits as $key=>$p) 
                                                    <th>$p->nomProduit</th>
                                                @endforeach  
                                            </thead>  <tbody>  
                                        @foreach ($livraisons as $key=>$l) 
                                            <tr>
                                            @if($l->semaine %2 ==0)
                                                <td>
                                                    {{$livraisons->dateLivraison}} paire
                                                    <input type="hidden" value="{{$l->id}}" name="livraisons[]" /><br></br>
                                                </td> 
                                         @foreach ($produits as $key=>$p)  
                                            <td> 
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label">{{$p->nomProduit}}</label>
                                                <div class="col-md-8">
                                                <input type="checkbox" name="produit[]" value="{{$p->id}}" requierd="requierd" />
                                                <input type="number" value="0" name='quantite[]'/>
                                                <input type="hidden" value="{{$p->prix}}" name="prix[]"/><br></br>
                                            </div>
                                            </div>
                                          </td>
                                         @endforeach    
                                         @endif
                                         @endforeach
                                         </tbody></table>    
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection