@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("/ReferentPlus/menu")
                    <div class="panel-body">
                        <h2>Liste des modèles de contrat</h2>
                        <br> 
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Amapiens</th>
                            <th>Catégories</th>
                            <th>Périodicité</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contrats as  $key=>$row)
                        <tr>
                            <td>
                                {{$amapiens[$key][0]->prenom." ".$amapiens[$key][0]->nom}}
                                
                            </td>
                            <td>
                                {{$row[$key]->titre}}
                                
                            </td>
                             <td>
                                {{$periodicites[$key][0]->libelle}}
                            </td>
                            <td>
                                    <a href="{{ url('details-contrat-amapien/'.$contratClient[$key]) }}" class="btn btn-info btn-sm">Détails</a>
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