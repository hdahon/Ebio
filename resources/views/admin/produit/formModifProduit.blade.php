@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                   <h2>Modifier un produit</h2>
                    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier le produit</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/produit-modifier/'.$produit->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Libelle</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nomProduit" value="{{$produit->nomProduit }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Catégories</label>
                                <div class="col-md-6">
                                    <select class=form-control name="categorie">
                                        @foreach ($categories as $cat)  
                                        @if($cat->id == $produit->categorie_id )
                                         <option selected value={{$produit->categorie_id}}>{{$cat->libelle}}</option>                  
                                        @else
                                         <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                         @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-4 control-label">Unite</label>
                                <div class="col-md-6">
                                <select  class="form-control"  name="unite" >
                                    @foreach ($unites as $unite)          
                                        @if($unite->id == $produit->unite_id )      
                                    <option selected value={{$unite->id}}>{{$unite->libelle}}</option>                 
                                        @else    
                                    <option value={{$unite->id}}>{{$unite->libelle}}</option>
                                         @endif
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="prix" value="{{$produit->prix}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Modifier</button>
                                    <a href="{{url('liste-produit/') }}" class="btn btn-info btn-sm">Retour</a>
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