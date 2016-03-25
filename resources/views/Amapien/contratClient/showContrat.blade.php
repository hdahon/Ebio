@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <a href="{{url('liste-contrat/') }}" class="btn btn-info btn-sm">Retour</a>
                        <h1 class='text-center'>Contrat d'engagement solidaire-{{$categorie->libelle}}</h1>
                        <h3 class='text-center'>{{$periode}}</h3>
                         <div class="row">
                            <div class="col-sm-4">
                                    <h2 class="text-left">Producteur</h2>
                                    <p><b>Nom :</b> {{$producteur->nom}}</p>
                                    <p><b>Prenom :</b> {{$producteur->prenom}}</p>
                                    <p><b>Email :</b> {{$producteur->email}}</p>
                                    <p><b>Tel : </b>{{$producteur->tel}}</p>

                                </div>
                                <div class="col-sm-4">
                                    <h2 class="text-left">Amapien</h2>
                                    <p><b>Nom :</b>{{$amapien->nom}} </p>
                                    <p><b>Prenom :</b>{{$amapien->prenom}} </p>
                                    <p><b>Email :</b> {{$amapien->email}}</p>
                                    <p><b>Tel : </b> {{$amapien->tel}}</p>
                                </div>
                                @if(count($coadherant) >0)
                                <div class="col-sm-4">
                                    <h2 class='text-left'>Co-contractant</h2>
                                    <p><b>Nom :</b>{{$coadherant->nom}}</p>
                                    <p><b>Prenom :</b> {{$coadherant->penom }}</p>
                                    <p><b>Email :</b>{{$coadherant->email}} </p>
                                    <p><b>Tel : </b>{{$coadherant->tel}}</p>
                                </div> 
                               @endif    
                        </div>
                        <div class="row drop-shadow">  
                             <h3 class="text-center"> Prix et modalité de paiement </h3>
                             <p>L'Amapien s'engage du <b>{{$dateDebut}}</b> au <b>{{$dateFin}}</b>
                                et donne au responsable de l'AMAP, les chèques indiqués dans le tableau ci-dessous, libellés à l'ordre
                                du producteur ({{$producteur->prenom." ".$producteur->nom}}): 
                             <table class="table  table-bordered">
                                <thead class="thead-inverse">
                                    <tr>
                                     <th>Type</th>
                                     <th><h5 class='text-center'>{{$periodicite->libelle }}</h5></th>
                                     </tr>
    
                                </thead>
                        <tbody>
                          @if($periodicite->libelle== "Ponctuel")
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr> 
                          @else
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr> 
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr> 
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr> 
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr>     
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr> 
                            <tr>
                                <td>Panier à {{$montant}}€</td>
                                <td> 1 chèque de {{$montant}}€ </td>
                            </tr>         
                           @endif 
                        </tbody>
                        </table>
                        <p>Les chèques seront encaissés par le producteur au début de chaque mois.</p>
                        </div>
                        <div class="row drop-shadow">  
                            <h3 class="text-center">Distributions</h3>
                                     <p><b>Semaine Paire</b></p>
                                     @if ($semainePaire)
                                      @foreach ($semainePaire as $key => $date)
                                
                                         {{$date.""}}<b>----</b>
                                      @endforeach 
                                      @endif
                                     <p><b>Semaine Impaire</b></p>
                                     @if ($semainePaire)
                                     @foreach ($semaineImpaire as $key => $date)
                                         {{$semaineImpaire[$key]." "}}<b>----</b>
                                       @endforeach 
                                       @endif  
                                 <p><b>Vacances</b></p>
                                    <p>{{$vacance}}</p>
                        </div>
                        <p>En cas d’absence, l’Amapien peut demander à décaler son panier - <b>Prévenir une semaine avant la distribution</b> . 
                         Les paniers décalés doivent être reportés au cours de la même saison.
                          Si le panier n'est pas récupéré le mardi soir entre 18h et 19h et s'il n'a pas été décalé
                          dans les temps, le panier sera perdu (pas de remboursement). </p>
                        <div class="row drop-shadow">  
                          <p><b>Objet</b></p>
                          <p>Le présent contrat a pour objet de déterminer les modalités et les conditions de l'engagement des parties signataires pour l’achat d’un « panier » dans le but :</p>
                          <p >• de soutenir l'exploitation agricole du producteur et encourager ainsi la consommation de produits de saison, cultivés localement et dans le respect de l’environnement,</p>
                          <p> • de fournir à l’AMAPien des paniers de qualité et recréer un lien d’information entre le producteur et le consommateur, le tout dans le respect du texte et de l'esprit de la Charte des AMAPs.</p>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
        
              
@endsection