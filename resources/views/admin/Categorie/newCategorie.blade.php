@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<div class="row">
        <h1>NOUVEAU</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/categories/new') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="input-field s6 offset-s1">
                <input id="libelle" type="text" class="form-control" name="libelle" value="">
                <label for="libelle">libelle</label>
            </div>

            <div class="input-field s6 offset-s1">
                <input id="producteur_id" type="text" class="form-control" name="producteur_id" value="">
                <label for="producteur_id">producteur_id</label>
            </div>

            <div class="input-field s6 offset-s1">
                <input id="referent_id" type="text" class="form-control" name="referent_id" value="">
                <label for="referent_id">referent_id</label>
            </div>

            <div class="input-field s6 offset-s1">
                <input id="periodicite_id" type="text" class="form-control" name="periodicite_id" value="">
                <label for="periodicite_id">periodicite_id</label>
            </div>

            <div class="input-field s6 offset-s1">
                <input id="typePanier" type="text" class="form-control" name="typePanier" value="">
                <label for="typePanier">typePanier</label>
            </div>

            <div class="input-feld s6 offset-s1">
                <button type="submit" class="btn btn-primary">AJOUTER</button>
            </div>

        </form>
</div>
@endsection