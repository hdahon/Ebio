@extends('template')
@section('content')
      <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                   
                        @foreach($categories as $c)
                             <h2>Panier pour le contrat {{$c->libelle}} du {{$livraison->dateLivraison}}</h2>
                        @if(count($lignes) >0) 
                       
                            <table class="table table-bordered table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Produits</th>
                                        <th>quantité</th>
                                        <th>Montant</th>
                                        <th>Producteur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count=0; ?>
                                @foreach ($lignes  as $key=> $row)
                                  @if($prods[$key]->categorie_id == $c->id)
                                    <tr>
                                        <td>
                                            {{$prods[$key]->nomProduit}}
                                        </td>
                                        <td>
                                            {{$row->quantite}}
                                        </td> 
                                        <td>
                                           {{$row->montant}} € 
                                           <?php $count+=$row->montant; ?>
                                        </td>
                                        
                                        <td>
                                            {{$producteurs[$key]->prenom}}  {{$producteurs[$key]->nom}}  
                                        </td>
                                       </tr>
                                       @endif
                                 @endforeach   
                                </tbody> 
                            </table>
                            <p class="text-right "><b>Total : <?php echo $count;?> €  </b></p>  
                        @endif
                        @endforeach         
            

            </div></div></div></div>

@endsection