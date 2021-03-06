@extends('templateImprimer')
@section('content')

        
                        <h1 class='text-center'>Contrat d'engagement solidaire-{{$categorie->libelle}}</h1>
                        <h3 class='text-center'>{{$periode}}</h3>
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-left"><b>Producteur</b></th>
                                <th class="text-left"><b>Amapien</b></th>
                                 @if(count($coadherant) >0)
                                 <th class='text-left'><b>Co-contractant</b></th>
                                 @endif
                               </tr>
                            </thead>
                            <tbody>
                              <tr >
                                <td>
                                  <b>Nom :</b> {{$producteur->nom}}<br>
                                  <b>Prenom :</b> {{$producteur->prenom}}<br>
                                  <b>Email :</b> {{$producteur->email}}<br>
                                  <b>Tel : </b>{{$producteur->tel}}<br>
                                </td>
                                <td>
                                  <b>Nom :</b>{{$amapien->nom}}<br>
                                  <b>Prenom :</b>{{$amapien->prenom}}<br>
                                  <b>Email :</b> {{$amapien->email}} <br>
                                  <b>Tel : </b> {{$amapien->tel}}
                                </td>
                                 @if(count($coadherant) >0)
                                <td>
                                  <b>Nom :</b>{{$coadherant->nom}}<br>
                                  <b>Prenom :</b> {{$coadherant->penom }}<br>
                                  <b>Email :</b>{{$coadherant->email}}<br>
                                  <b>Tel : </b>{{$coadherant->tel}}
                                </td>
                                @endif
                             </tr> 
                            </tbody>
                          </table>

                     
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
                                
                                         {{$date." "}}<b>----</b>
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
                          <h2>Engagements réciproques</h2>
                          <table class="table  table-bordered">
                                <thead class="thead-inverse">
                              <tr>
                                <th> Le producteur s'engage :</th>
                                <th> L'AMAPien s'engage : </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>• Fournir des produits frais et de qualité à chaque distribution, produits dans le respect du cahier des charges de l’agriculture biologique</td>
                                <td>• Payer à l’avance l’ensemble des paniers qui lui seront remis hebdomadairement au cours de la durée d’engagement</td>
                              </tr>
                              <tr>
                                <td>• Livrer à chaque distribution aux AMAPiens le panier prévu par le présent contrat </td>
                                <td>• Récupérer son panier à chaque distribution, ou à défaut déléguer une tierce personne pour le faire. Les paniers non récupérés seront perdus.</td>
                              </tr>
                              <tr>  
                                <td>• Diversifier le contenu des paniers d’une semaine à l’autre, dans la mesure du possible et selon le contrat prévu </td>
                                <td>• Etre présent et aider le producteur pour au moins une des distributions ayant lieu pendant la durée d’engagement</td>
                              </tr>
                              <tr>
                                <td>• Etre transparent sur la conduite de son exploitation </td>
                                <td>• Accepter les variations dans la composition des paniers, dues aux conditions climatiques et biotiques</td>
                              </tr> 
                              <tr> 
                                <td>• Respecter les principes généraux de la Charte des AMAP </td>
                                  <td></td>
                              </tr>
                    </tbody>
                  </table>
             <h2>Rupture de contrat : </h2>
            <p>Si l’adhérent souhaite mettre un terme à son engagement,
             il devra céder son contrat, prioritairement à une personne se
              trouvant sur liste d’attente, le cas échéant à une personne de 
              son choix, désireuse de s’engager à travers notre AMAP.
               Dans le cas où, aucune de ces possibilités ne peut se réaliser, 
               l’adhérent sera tenu de respecter son engagement solidaire jusqu’au 
               terme du contrat. En cas de litige relatif à l’application ou à 
               l’interprétation du présent contrat d’engagement, il sera fait appel, 
               en premier lieu, à la médiation d’Alliance Provence. En cas d’échec de 
               la médiation, les conditions relatives à la rupture du contrat d’engagement
                citées ci-dessus s’appliqueront de plein droit. Les annexes et avenants
                 à la présente convention en font partie intégrante.</p>
          
          <table class="table">
              <thead>
                <tr>
                  <th>Date et signature de l'AMAPien </th>
                  <th>Date et signature du producteur</th>
              </tr>
            </thead>
          </table>    


                        </div>
                    </div>
                </div>
            </div>
        </div>
        