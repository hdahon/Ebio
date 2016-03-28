@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h2>Liste des modèles de contrat</h2>
                        <br>
                         <div class="table-responsive">     
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Catégories</th>
                            <th>Début Livrasion</th>
                            <th>Fin Livraison</th>
                            <th>Debut & fin Souscription</th>
                            <th>Vacances</th>
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
                               
                                {{date_format(date_create($row[0]->debutSouscription),'d-m-Y')}}
                                {{date_format(date_create($row[0]->finSouscription),'d-m-Y')}}                            
                            </td>
                            <td>
                               @if($row[0]->vacance != "0000-00-00 00:00:00")
                                {{date_format(date_create($row[0]->vacance),'d-m-Y')}}
                                @endif
                                <br>
                                @if($row[0]->vacance1 != "0000-00-00 00:00:00")
                                {{date_format(date_create($row[0]->vacance1),'d-m-Y')}} 
                                @endif
                                <br>
                                @if($row[0]->vacance2 != "0000-00-00 00:00:00")
                                {{date_format(date_create($row[0]->vacance2),'d-m-Y')}}  
                                @endif                               
                            </td>
                            <td>
                                <a href="{{ url('details-contrat/'.$row[0]->id) }}" class="btn btn-info btn-sm">Détails</a>
                                    <a href="{{ url('modifier-contrat/'.$row[0]->id) }}" class="btn btn-info btn-sm">Modifier</a>
                                    <a href="{{ url('supprimer-contrat/'.$row[0]->id) }}" class="btn btn-info btn-sm confirm">Supprimer</a>
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
        </div>

@endsection