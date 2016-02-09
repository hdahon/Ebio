@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("referent/menu")
                    <div class="panel-body">
                        Modèle de contrat
                        <br> 
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Type Produits</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contrats as $row)
                        <tr>
                            <td>
                                {{$row->titre}}
                                
                            </td>
                            <td>
                                {{$row->debutLivraison}}
                                
                            </td>
                            <td>
                               
                                {{$row->dateDeFinLivraison}}                            
                            </td>
                            
                            <td>
                            <a href="{{ url('contrat/'.$row->id) }}">Voir</a>

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