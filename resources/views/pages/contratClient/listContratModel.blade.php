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
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contrats as $row)
                        <tr>
                            <td>
                                {{$row->titre}}
                                
                            </td>
                             <td>
                                {{date_format(date_create($row->debutLivraison),'d-m-Y')}}
                                
                            </td>
                            <td>
                               
                                {{date_format(date_create($row->dateDeFinLivraison),'d-m-Y')}}                            
                            </td>
                            
                            <td>
                                <a href="{{ url('create-contratsClients/'.$row->id) }}" class="btn btn-info btn-sm">Souscrire</a>
                            </td>
                            
                        </tr>

                         @endforeach       
                        </tbody>
                        </table></div>
                    </div>
                </div>
            </div>
        </div>

@endsection