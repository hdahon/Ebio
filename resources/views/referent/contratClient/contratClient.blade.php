@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>contrat</th>
                            <th>Amapien</th>
                            <th>periodicite</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($amapiens) >0)
                        @foreach ($elements as $key => $row)
                        <tr>
                            <td>{{$contrats[$key]->titre}}</td>
                            <td>{{$amapiens[$key]->prenom }} {{$amapiens[$key][0]->nom}}</td>
                            <td>{{$periodicites[$key]->libelle}}</td>
                            <td>
                                <a href="{{ url('details-contratclient/'.$row->id) }} " class="btn btn-default" title="voir">VOIR</a>
                                <a href="{{ url('update-contratsClients/'.$row->id) }}" class="btn btn-default" title="Modifier">MODIFIER </a>
                                <a href="{{ url('delete-contratsClients/'.$row->id) }}" class="btn btn-danger btn-sm confirm" title="Supprimer">SUPPRIMER</a>

                            </td>
                        </tr>
                        @endforeach  
                        @endif     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection