@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                   
                    <div class="panel-body">
                        <h1 class="text-center">Historique des paiement </h1>
                        <br> 
                         <div class="table-responsive">    
                         <table class="table  table-bordered">
                            <h3 class="text-center"> {{$produit}}</h3>
                        <thead class="thead-inverse">
                        <tr>
                            <th>Adhérant</th>
                            <th>Co-adhérant</th>
                            <th>Banque</th>
                            <th>Titulaire</th>
                            <th>N° Cheque</th>
                            <th>Montant</th>
                            <th>Action</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($paiements)>0)   
                        @foreach ($paiements as $key => $row)
                        <tr class="text-center">
                            <td>
                               {{$adherant[$key]->prenom." ".$adherant[$key]->nom}} 
                            </td>
                            <td>
                               {{$adherant[$key]->prenomCAdherant." ".$adherant[$key]->nomCAdherant}} 
                            </td>
                            <td>
                                {{$row->Banque}}
                                
                            </td>
                            <td>
                                {{$row->titulaire}}
                                
                            </td>
                            <td>
                               
                                {{$row->numeroCheque}}                            
                            </td>
                            
                          <td>
                               {{$row->montant."€"}} 
                            </td>
                              
                          <td>
                              <a href="{{ url('update-paiement/'.$row->id) }}" class="btn btn-default" title="Modifier">MODIFIER </a>
                                <a href="{{ url('delete-paiement/'.$row->id) }}" class="btn btn-danger btn-sm confirm" title="Supprimer">SUPPRIMER</a>
                        </td>
                        </tr>

                         @endforeach  
                         @endif     
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

@endsection