@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("menu")
                    <div class="panel-body">
                        <h1 class='text-center'>Contrat d'engagement solidaire-{{$produit->nomProduit}}</h1>
                        <h3 class='text-center'>{{$periode}}</h3>
                         <div class="row">
                            <div class="col-sm-6">
                                    <h2 class="text-left">Producteur</h2>
                                    <p>Nom : {{$producteur->nom}}</p>
                                    <p>Prenom : {{$producteur->prenom}}</p>
                                    <p>Email : {{$producteur->email}}</p>
                                    <p>Tel : {{$producteur->tel}}</p>

                                </div>
                                <div class="col-sm-6">
                                    <h2 class="text-left">Amapien</h2>
                                   
                                    <h2 class='text-left'>Co-contractant</h2>
                                   
                                </div>
                        </div>
                        <div class="row drop-shadow">  
                             <h3 class="text-center"> Prix et modalité de paiement </h3>
                             <p>L'Amapien s'engage du <b>{{$contrat->debutLivraison}}</b> au <b>{{$contrat->dateDeFinLivraison }}</b>
                                et donne au responsable de l'AMAP, les chèques indiqués dans le tableau ci-dessous, libellés à l'ordre
                                du producteur ({{$producteur->prenom." ".$producteur->nom}}): 
                             <table class="table  table-bordered">
                                <thead class="thead-inverse">
                                    <tr>
                                     <th></th>
                                     <th><h5 class='text-center'>Périodicité de la Distribution</h5></th>
                                     </tr>
                                     <tr>
                                      <th></th>
                                      @if($periodicite->id == 7)
                                          <th>Toutes les semaimes</th> 
                                          <th>Semaine Paire</th>
                                          <th>Semaine Impaire</th>
                                     @else   
                                        <th>{{$periodicite->libelle}}</th>
                                     @endif   
                                     </tr>  
                                </thead>
                        <tbody>
                            <tr>
                                <td>{{$produit->typePanier." à ".$produit->prix."€"}}</td>
                                <td></>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                        <div class="row drop-shadow">  
                            <h3 class="text-center">Distributions</h3>
                                     <p><b>Semaine Paire</b></p>
                                      @foreach ($semainePaire as $key => $date)
                                
                                         {{$date.""}}<b>----</b>
                                      @endforeach 
                                     <p><b>Semaine Impaire</b></p>
                                     @foreach ($semainePaire as $key => $date)
                                         {{$semaineImpaire[$key]." "}}<b>----</b>
                                       @endforeach   
                                 <p><b>Vacances</b></p>
                                    <p>{{$vacance}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection