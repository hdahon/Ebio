@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>contrat_id</th>
                            <th>amapien_id</th>
                            <th>periodicite_id</th>
                            <th><a href="{{ url('create-contratsClients') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>{{$row->contrat_id}}</td>
                            <td>{{$row->amapien_id}}</td>
                            <td>{{$row->periodicite_id}}</td>
                            <td>
                                <a href="{{ url('delete-contratsClients/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-contratsClients/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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