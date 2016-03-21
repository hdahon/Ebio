@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                      <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un panier</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-panier') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Produit</label>
                                <div class="col-md-6">
                                    <select class=form-control name="produit" >
                                        @foreach ($produits as $p)                    
                                        <option value={{$p->id}}>{{$p->nomProduit}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">quantité</label>
                                <div class="col-md-6">
                                    <input type="number" id="nbPanier" class="form-control" name="quantite" value="{{ old('nbPanier') }}">
                                </div>
                            </div>
                            <input type="hidden"  class="form-control" name="livraison" value="{{$livraison->id}}">

                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" >Ajouter</button>
                            </div>
                        </form>
                        </div>
                    </div>
        </div>

                        @if(count($lignes) >0) 
                        <h2> Liste des produits ajoutés dans le panier</h2>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Produits</th>
                                        <th>quantité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($lignes  as $key=> $row)
                                    <tr>
                                        <td>
                                            {{$prods[$key]->nomProduit}}
                                        </td>
                                        <td>
                                            {{$row->quantite}}
                                        </td> 
                                        <td>
                                            <a href="{{ url('delete-panier/'.$row->id) }}" title="delete" class="btn  btn-info btn-sm confirm">Supprimer</a>
                                        </td>
                                       </tr>
                                 @endforeach   
                                </tbody> 
                            </table>  
                        @endif         
            <a class="btn btn-primary " href="{{ url('valider-panier') }}" >Valider</a>

            </div>

@endsection