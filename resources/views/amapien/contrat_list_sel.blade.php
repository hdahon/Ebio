@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    
                    
                        <h1>Voici les <b>CONTRATS</b> disponibles</h1>

                        <table class="table  table-striped">
                            <thead>
                            <tr>
                                <th>Contrat id </th>
                                <th>Périodicité</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sesContrats as $row)
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

@endsection