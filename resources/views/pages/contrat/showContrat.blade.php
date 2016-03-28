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
                                    <p><b>Nom :</b> </p>
                                    <p><b>Prenom :</b> </p>
                                    <p><b>Email :</b> </p>
                                    <p><b>Tel : </b></p>
                                </div>
                                <div class="col-sm-4">
                                    <h2 class='text-left'>Co-contractant</h2>
                                    <p><b>Nom :</b></p>
                                    <p><b>Prenom :</b> </p>
                                    <p><b>Email :</b> </p>
                                    <p><b>Tel : </b></p>
                                </div>    
                        </div>
                        <div class="row drop-shadow">  
                             <h3 class="text-center"> Prix et modalité de paiement </h3>
                             <p>L'Amapien s'engage du <b>{{$dateDebut}}</b> au <b>{{$dateFin}}</b>
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
                                <td>{{$categorie->typePanier}}</td>
                                <td></>
                            </tr>
                        </tbody>
                        </table>
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
                                    @if ($semainePaire)
                                     @foreach ($vacance as $key => $date)
                                         {{$vacance[$key]." "}}<b>----</b>
                                       @endforeach 
                                       @endif  
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
                      <div>
                          <h2>Engagements réciproques</h2>7
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
                                <tr>• Accepter les variations dans la composition des paniers, dues aux conditions climatiques et biotiques</td>
                              </tr> 
                              <tr> 
                                <td>• Respecter les principes généraux de la Charte des AMAP </td>
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
          <div class="row">
            <div class="col-sm-6" style="height: 150px">
              <h3>Date et signature de l'AMAPien </h3>

              </div>
              <div class="col-sm-6" style="height: 150px">
                <h3>Date et signature du producteur</h3>
               </div></div> 


                        </div>
                    </div>
                </div>
            </div>
        </div>
        
              
@endsection