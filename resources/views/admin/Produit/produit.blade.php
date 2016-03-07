@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>nomProduit</th>
                            <th>unite</th>
                            <th>prix</th>
                            <th>categorie_id</th>
                            <th><a href="{{ url('create-produits') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>{{$row->nomProduit}}</td>
                            <td>{{$row->unite}}</td>
                            <td>{{$row->prix}}</td>
                            <td>{{$row->categorie_id}}</td>
                            <td>
                                <a href="{{ url('delete-produits/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-produits/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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