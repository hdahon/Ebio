@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                        <h1>Bienvenue Sur la pages  de vos <b>CONTRATS</b> </h1>

                        <table class="table  table-striped">
                            <thead>
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

@endsection