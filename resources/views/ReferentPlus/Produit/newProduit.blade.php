@extends('template')
@section("title")
Reférent
@endsection
@section('content')

<div class="row">
Bienvenue Sur la pages de gestion des <b>PRODUIT</b>
                    @if (count($errors) > 0)
                    <div class="col s12 red lighten-4">
                        <div class="alert alert-warning">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/produit/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="nom">Nom Produit</label>
                                <input id="nom" type="text"  name="nom" value="{{ old('produit') }}" class="form-control">
                                
                            </div>

                            <div class="form-group">
                                <label>Producteur</label>
                                <select >
                                    @foreach ($producteurs as $prod)                    
                                    <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">créer</button>

                    </form>
</div>
@endsection