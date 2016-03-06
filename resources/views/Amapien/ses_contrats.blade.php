@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h1>Bienvenue Sur la pages  de vos <b>CONTRATS</b> </h1>

                        <table class="table  table-bordered">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Id Utilisateur</th>
                                <th>Id Contrat</th>
                                <th>Périodicité</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sesContrats as $row)
                            <tr>
                            <td>
                                {{$row->user_id}}
                            </td>
                                <td>
                                    {{$row->contrat_id}}
                                </td>
                                <td>
                                    {{$row->periodicite_id}}
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