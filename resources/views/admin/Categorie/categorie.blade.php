@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>libelle</th>
                            <th>producteur_id</th>
                            <th>referent_id</th>
                            <th>periodicite_id</th>
                            <th>typePanier</th>
                            <th><a href="{{ url('create-categories') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>{{$row->libelle}}</td>
                            <td>{{$row->producteur_id}}</td>
                            <td>{{$row->referent_id}}</td>
                            <td>{{$row->periodicite_id}}</td>
                            <td>{{$row->typePanier}}</td>
                            <td>
                                <a href="{{ url('delete-categories/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-categories/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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