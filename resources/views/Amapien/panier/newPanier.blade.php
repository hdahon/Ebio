@extends('template')
@section('content')
      <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <h2>Liste des produits ajoutés dans le panier</h2>
                    
                        @if(count($lignes) >0) 
                        <h2> </h2>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Produits</th>
                                        <th>quantité</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($lignes  as $key=> $row)
                                    <tr>
                                        <td>
                                            {{$prods[$key]->nomProduit}}
                                        </td>
                                        <td>
                                            {{$row->quantite}}
                                        </td> 
                                        <td>
                                           {{$row->montant}} € 
                                        </td>
                                       </tr>
                                 @endforeach   
                                </tbody> 
                            </table>  
                        @endif         
            

            </div></div></div></div>

@endsection