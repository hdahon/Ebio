@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <h1>Liste des catégories </h1>
            <table class="table  table-bordered">
                <thead class="thead-inverse">
                    <tr >
                        <th>Catégorie</th>
                        <th>Periodicite</th>
                        <th>Producteur</th>
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
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/supprimer-categorie/'.$row->id) }}">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     <a href="{{ url('details-categorie/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                </form>
                            </td>
                        </tr>
                     @endforeach       
                </tbody>
            </table>
    </div>
@endsection