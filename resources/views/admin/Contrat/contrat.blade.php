@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>titre</th>
                            <th>vacance</th>
                            <th>categorie_id</th>
                            <th>debutLivraison</th>
                            <th>dateDeFinLivraison</th>
                            <th><a href="{{ url('create-contrats') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>{{$row->titre}}</td>
                            <td>{{$row->vacance}}</td>
                            <td>{{$row->categorie_id}}</td>
                            <td>{{$row->debutLivraison}}</td>
                            <td>{{$row->dateDeFinLivraison}}</td>
                            <td>
                                <a href="{{ url('delete-contrats/'.$row->id)  }}"  class="btn btn-danger btn-sm confirm" title="Supprimer">SUPPRIMER</a>
                                -
                                <a href="{{ url('update-contrats/'.$row->id) }}" class="btn btn-default btn-sm " title="Modifier">MODIFIER</a>
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