@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Contrat</th>
                            <th>Amapien</th>
                            <th>Périodicité</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $key => $row)
                        <tr>
                            <td>{{$contrats[$key][0]->titre}}</td>
                            <td>{{$amapiens[$key][0]->prenom }} {{$amapiens[$key][0]->nom}}</td>
                            <td>{{$periodicites[$key][0]->libelle}}</td>
                            <td>
                                <a href="{{ url('details-contratclient/'.$row->id) }} " class="btn btn-default" title="voir">VOIR</a>
                                <a href="{{ url('update-contratsClients/'.$row->id) }}" class="btn btn-default" title="Modifier">MODIFIER </a>
                                <a href="{{ url('delete-contratsClients/'.$row->id) }}" class="btn btn-danger btn-sm confirm" title="Supprimer">SUPPRIMER</a>

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
