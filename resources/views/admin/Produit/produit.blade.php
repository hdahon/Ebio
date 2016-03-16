@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
<<<<<<< HEAD
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <h2>Liste des Produits</h2>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
=======
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
>>>>>>> b572a75d4457f439f644ec770d3ec84ee06b2819
                        <tr>
                            <th>Produit</th>
                            <th>Unité</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($produits as $key => $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->unite}}
                            </td>
                             <td>
                                {{$row->prix}} euros
                            </td>
                             <td>
                            <a href="{{ url('categorie-details/'.$categories[$row->id]->id) }}">
                                {{$categories[$row->id]->libelle}}
                            </a>
                            </td>
                            <td>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/produit-supprimer/'.$row->id) }}">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <a href="{{ url('produit-details/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                 @if(session('role')>=3)
                                 <a href="{{ url('produit-modifier/'.$row->id) }}" class="btn  btn-info btn-sm">Modifier</a>
                                 <button type="submit"class="btn  btn-info btn-sm">Supprimer</button>
                                 @endif
                             </form>
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                        </table>
    </div>
    </div>
        </div>
    </div>
@endsection