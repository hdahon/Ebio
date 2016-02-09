@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("ReferentPlus/menu")
                <div class="panel-body">
                    <h2>Liste des catégories </h2>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse text-center">
                        <tr >
                            <th>Catégorie</th>
                            <th>Periodicite</th>
                            <th>Producteur</th>
                            <th>Referent</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $key => $row)
                        <tr>
                            <td>
                                {{$row->libelle}}
                            </td>
                            <td>
                                {{$periodicites[$row->id]->libelle}}
                            </td>
                             <td>
                                {{$producteurs[$row->id]->prenom." ".$producteurs[$row->id]->nom}}
                            </td>
                            <td>
                                {{$referents[$row->id]->prenom.' '.$referents[$row->id]->nom}}
                            </td>
                            <td>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/supprimer-categorie/'.$row->id) }}">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <a href="{{ url('categorie-details/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                 <a href="{{ url('categorie-modifier/'.$row->id) }}" class="btn  btn-info btn-sm">Modifier</a>
                                 <button type="submit"class="btn  btn-info btn-sm">Supprimer</button>
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