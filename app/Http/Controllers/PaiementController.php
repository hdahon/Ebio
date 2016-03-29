<?php

namespace App\Http\Controllers;

use App\Contrat;
use App\User;
use App\Produit;
use App\Paiement;
use App\ContratClient;
use App\Categorie;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PaiementController extends Controller
{

 //affichage du formulaire pour le choix du client et du contrat
public function getnewPaiement(Request $request)
    {
      $mois=array("janvier", "février", "mars", "avril", "mai", "juin",
        "juillet", "août", "septembre", "octobre", "novembre", "décembre");
      $producteurs = array();
      $categories  = array();
      $amapien_id=array();
      $contrats = ContratClient::all();


      $adherants= User::where('roleamapien_id',1)->get();
  
      foreach($contrats as $key=>$contrat){
        $modelC=Contrat::find($contrat->contrat_id);
        $categories[$key]=Categorie::find($modelC->categorie_id);
        $amapien_id[$key]=User::find($contrat->amapien_id);
        $producteurs[$modelC->producteur_id]=User::find($modelC->producteur_id);  
      }

      $data = array('contrats' => $contrats,
              'adherants' =>$amapien_id,
              'producteurs' =>$producteurs,
                        'mois'=>$mois,
                        'categories'=>$categories);
        return view('pages/paiement/newpaiement',$data);

    }

//affichage du formulaire preremplis
 public function getnewPaiement2(Request $request)
    {
      $mois=array("janvier", "février", "mars", "avril", "mai", "juin",
        "juillet", "août", "septembre", "octobre", "novembre", "décembre");


      $producteurs = array();
      $categories  = array();
      $contrats = ContratClient::all();


             $c=$request->input('contrat');
            $amap=$request->input('amapien');
            $contratClient=ContratClient::find($c);
            $contrat=Contrat::find($contratClient->contrat_id);
            $categorie=Categorie::find($contrat->categorie_id);
            $amapien=User::find ($amap);      

                //calcul du nombre de mois entre le debut et la fin de livarison
            $moisDebut=explode("-",date_format(date_create($contrat->debutLivraison),'Y-m-d'));
            $debut = new DateTime($contrat->debutLivraison);
            $fin = new DateTime($contrat->dateDeFinLivraison);
            $interval = $fin->diff($debut);
            $tabmois=array();
            $tabmois[0]=$mois[intval($moisDebut[1])];
            $iter=intval($moisDebut[1]);

            for ($i=1; $i <=count($interval) ; $i++) { 
               if($iter == 12){
                 $iter=1;
                 $tabmois[$i]=$mois[$iter];
               }else{
                $iter++;
                $tabmois[$i]=$mois[$iter];
               }
            }
            //le montant pour chaque mois
            $montant=$contratClient->montantParMois;
            $producteur=User::find($categorie->producteur_id);
            $nbrePanier=1;
     
      $data = array('contrat' => $contrat,
              'amapien' =>$amapien,
              'producteurs' =>$producteur,
                        'mois'=>$tabmois,
                        'categories'=>$categories,
                        'nbPanier'=>$nbrePanier,
                        'montant'=>$montant,
                        'contratclient'=>$contratClient->id);
        return view('pages/paiement/newpaiement2',$data);

    }

//enregistrement des paiements
 public function postnewPaiement(Request $request)
    {
            
            $contrat_id=$request->input('contrat_id');

            $mois =$request->input('mois');
            $numCheque = $request->input('numero');
            $banque=$request->input('banque');
            $titulaire=$request->input('titulaire');
            $montant = $request->input('montant');
            $cout=$request->input('cout');
            $nbPanier=$request->input('nbPanier');
            $amapien =$request->input('amapien_id');
            $contratClient_id =$request->input('contratc_id');
           
            $contrat=Contrat::find($contrat_id);
            $categorie=Categorie::find($contrat->categorie_id);
            $producteur =$categorie->producteur_id;
            $Referent= $categorie->referent_id;
             echo $contratClient_id;
            
            foreach ($banque as $key => $value) {
               $numC=$numCheque[$key];
               $m=$mois[$key];
              // echo $m." ".$numC;
             Paiement::create(array(
                'montant' =>$montant,
                'numeroCheque' =>$numC,
                'cout' =>$cout,
                'banque' =>$value,
                'titulaire' =>$titulaire,
                'nbPanier' =>$nbPanier,
                'amapien_id' =>$amapien,
                'referent_id' =>$Referent,
                'contratClient_id' =>$contratClient_id,
                'producteur_id' =>$producteur,
                'mois' =>$m,

            ));
          }
          return redirect('liste-paiement');
    }

//liste des paiements
public function getListPaiement(){
         $paiements = Paiement::all();
         $mois="";
         $produit="";
         $adherant=array();
         //si amapien
         if(session('role')==1){
            if(count($paiements) > 0){
              $mois = $paiements[0]->mois;;
            }
            $paiement=array();
            foreach($paiements as $p){
              $adh= User::find($p->amapien_id);
              if($p->amapien_id ==Auth::user()->id){
                $paiement[]=$p;
              }

            }
            $data = array('paiements' => $paiement,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('amapien/paiement/listPaiement',$data);
         }//si producteur
         if(session('role')==2){

            if(count($paiements) > 0){
              $mois = $paiements[0]->mois;;
            }
            $paiement=array();
            foreach($paiements as $p){
              $prod= User::find($p->producteur_id);
              if($prod->id ==Auth::user()->id){
                 $paiement[]=$p;
              }
              
            }
            $data = array('paiements' => $paiement,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('producteur/paiement/listPaiement',$data);
       }//si referent
        if(session('role')==3){
            if(count($paiements) > 0){
              $mois = $paiements[0]->mois;;
             }
             $paiement=array();
            $iter=0;
            foreach($paiements as $p){
              $ref= User::find($p->referent_id);
              if($ref->id ==Auth::user()->id){
                $paiement[$iter]=$p;
                $adherant[$iter]=User::find($p->amapien_id);
                $iter++;
              }
              
            }
           
            $data = array('paiements' => $paiement,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('referent/paiement/listPaiement',$data);
       }
        else{
         //echo $paiements[0]->mois;
         if(count($paiements) > 0){
            $mois = $paiements[0]->mois;;
            //$produit =Contrat::find(ContratClient::find($paiements[0]->contrat_id));
         }
         foreach($paiements as $p){
            $adherant[]=User::find($p->amapien_id);

         }
        $data = array('paiements' => $paiements,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('pages/paiement/listPaiement',$data);
         
          }
     }
       
     //delete paiement  
     public function getdeletePaiement($id){
         $element=Paiement::find($id);
         $element->delete();
         return redirect('liste-paiement');
  }


//get form modif 
  public function getupdatePaiement($id)
    {
      $mois=array("janvier", "février", "mars", "avril", "mai", "juin",
        "juillet", "août", "septembre", "octobre", "novembre", "décembre");
      $producteurs = array();
      $categories  = array();

      $contrats = ContratClient::all();

      foreach($contrats as $key=>$contrat){
        $modelC=Contrat::find($contrat->contrat_id);
        $categories[$contrat->id]=Categorie::find($modelC->categorie_id);
        $amapien_id[$key]=User::find($contrat->amapien_id);
        $producteurs[$modelC->producteur_id]=User::find($modelC->producteur_id);  
      }
      $paiement=Paiement::find($id);
      $data = array('contrats' => $contrats,
              'adherants' =>$amapien_id,
              'producteurs' =>$producteurs,
                        'mois'=>$mois,
                        'categories'=>$categories,
                        'paiement'=>$paiement);
      if(session('role') ==3){
            return view('referent/paiement/newpaiement',$data);
      }else{
        return view('admin/paiement/modifpaiement',$data);
       } 

    }



  //post update paiement
    public function postupdatePaiement(Request $request,$id)
    {

            $contrat_id=$request->input('contrat_id');
            $amapien =$request->input('amapien');
            $producteur =$request->input('producteur');
            $mois =$request->input('mois');
            $numCheque = $request->input('numero');
            $banque=$request->input('banque');
            $titulaire=$request->input('titulaire');
            $montant = $request->input('montant');
            $cout=$request->input('cout');
            $nbPanier=$request->input('nbPanier');
            
            $paiement=Paiement::find($id);
            $paiement->montant=$montant;
            $paiement->amapien_id=$amapien;
            $paiement->titulaire=$titulaire;
            $paiement->Banque=$banque;
            $paiement->numeroCheque=$numCheque;
            $paiement->cout=$cout;
            $paiement->nbPanier=$nbPanier;
            $paiement->mois=$mois;
            $paiement->producteur_id=$producteur;
            $paiement->contratClient_id=$contrat_id;

            $paiement->save();

          return redirect('liste-paiement');
    }



}