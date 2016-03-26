@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>contrat</th>
                            <th>periodicite</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $key => $row)
                        <tr>
                            <td>{{$contrats[$key][0]->titre}}</td>
                            <td>{{$periodicites[$key][0]->libelle}}</td>
                            <td>
                                <a href="{{ url('details-contratclient/'.$row->id) }} " class="btn btn-info" title="Supprimer">VOIR</a>
                             
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