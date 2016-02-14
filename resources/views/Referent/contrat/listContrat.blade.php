@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h2>Liste des modèles de contrat</h2>
                        <br> 
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Catégories</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contrats as $key => $row)
                        @if(count($contrats[$key]) > 0)
                        <tr>
                            <td>
                                {{$contrats[$key][0]->titre}}
                                
                            </td>
                            <td>
                                {{date_format(date_create($row[0]->debutLivraison),'d-m-Y')}}
                                
                            </td>
                            <td>
                               
                                {{date_format(date_create($row[0]->dateDeFinLivraison),'d-m-Y')}}                            
                            </td>
                            
                            <td>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/supprimer-contrat/'.$row[0]->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{ url('details-contrat/'.$row[0]->id) }}" class="btn btn-info btn-sm">Détails</a>
                                    <a href="{{ url('modifier-contrat/'.$row[0]->id) }}" class="btn btn-info btn-sm">Modifier</a>
                                     <button type="submit" class="btn btn-info btn-sm">Supprimer</button>
                                </form>
                            </td>
                            
                            
                        </tr>
                        @endif
                         @endforeach       
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection