@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h1>Voici les <b>CONTRATS</b> disponibles</h1>

                        <table class="table  table-bordered">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Contrat id </th>
                                <th>Périodicité</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($name as $row)
                            <tr>
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