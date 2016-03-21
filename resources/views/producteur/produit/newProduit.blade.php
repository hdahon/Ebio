@extends('template')
@section("title")
Reférent
@endsection
@section('content')

 <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h2> Ajouter un Produit</h2>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau Contrat</div>
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

                    <form  role="form" method="POST" action="{{ url('create-produit') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="nom">Nom Produit</label>
                                <input id="nom" type="text"  name="nom" value="{{ old('produit') }}" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label>Categorie</label>
                                <select  class="form-control" name="categorie" >
                                    @foreach ($categories as $cat)                    
                                    <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Unite</label>
                                <select  class="form-control"  name="unite" >
                                    @foreach ($unites as $unite)                    
                                    <option value={{$unite->libelle}}>{{$unite->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <!--div class="form-group">
                                <label for="nom">Unité</label>
                                <input id="nom" type="text"  name="unite" value="{{ old('produit') }}" class="form-control">
                                
                            </div-->
                              <div class="form-group">
                                <label for="nom">Prix</label>
                                <input id="nom" type="text"  name="prix" value="{{ old('produit') }}" class="form-control">
                                
                            </div>
                            

                            <button type="submit" class="btn btn-default">créer</button>

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