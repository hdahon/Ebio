@extends('template')
@section("title")
Reférent
@endsection
@section('content')

<div class="row">
Bienvenue Sur la pages de gestion des <b>PRODUIT</b>
                    @if (count($errors) > 0)
                    <div class="col s12 red lighten-4">
                        <div class="col S11 offset-s1">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/produit/create') }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s6">
                                <input id="nom" type="text"  name="nom" value="{{ old('produit') }}">
                                <label for="nom">Nom Produit</label>
                            </div>

                            <div class="input-field col s6">
                                <select >
                                    @foreach ($producteurs as $prod)                    
                                    <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                    @endforeach
                                </select>
                                <label>Producteur</label>
                            </div>
                                <button type="submit" class="btn waves-effect waves-light" name="action">créer</button>

                    </form>
</div>
@endsection