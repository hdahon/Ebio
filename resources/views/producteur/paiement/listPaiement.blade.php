@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                   
                    <div class="panel-body">
                        <h1 class="text-center">Historique des paiement </h1>
                        <br> 
                         <table class="table  table-bordered">
                            <h3 class="text-center"> {{$produit}}</h3>
                        <thead class="thead-inverse">
                        <tr>
                            
                            <th>Banque</th>
                            <th>Titulaire</th>
                            <th>N° Cheque</th>
                            <th>Montant</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($paiements)>0)   
                        @foreach ($paiements as $key => $row)
                        <tr class="text-center">
                            
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
                            
                        </tr>

                         @endforeach  
                         @endif     
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection