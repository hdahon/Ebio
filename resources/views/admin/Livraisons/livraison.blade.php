@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>dateLivraison</th>
                            <th>quantite</th>
                            <th>amapien_id</th>
                            <th>produit_id</th>
                            <th>producteur_id</th>
                            <th>dateDeLivraison</th>
                            <th><a href="{{ url('create-livraisons') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livraisons as $row)
                        <tr>
                            <td>
                                {{$row->dateLivraison}}
                            </td>
                            <td>
                                {{$row->quantite}}
                            </td>
                            <td>
                                {{$row->amapien_id}}
                            </td>
                            <td>
                                {{$row->produit_id}}
                            </td>
                            <td>
                                {{$row->producteur_id}}
                            </td>
                            <td>
                                {{$row->dateDeLivraison}}
                            </td>
                            <td>
                                <a href="{{ url('update-livraisons/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-livraisons/'.$row->id) }}" title="Supprimer" class="btn  btn-danger btn-sm">SUPPRIMER</a>
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