<?php

namespace App\Http\Controllers;

use App\Contrat;
use App\User;
use App\Produit;
use App\Categorie;
use App\Periodicite;
use App\Livraisons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ContratController extends Controller
{

  /* Liste des tous les modèle de contrat  */
     public function getAllContrat(){
        if(Auth::user()->roleamapien_id == 3){
         $referent = Auth::user()->id;
         $categories=Categorie::where("referent_id",$referent)->get();
         $iter=0;
         $contrats = array();
         foreach ($categories as $value) {
           $contrats[$iter]=Contrat::where("categorie_id",$value->id)->get();
           $iter++;
         }
         $data = array('contrats' => $contrats);
         return view('referent/contrat/listContrat',$data);
       }
       else{
          $contrats = Contrat::all();
          $data = array('contrats' => $contrats);
          if(Auth::user()->roleamapien_id == 1){
             return view('amapien/contratClient/listContratModel',$data);
          }else{
          return view('referentPlus/contrat/listContrat',$data);
          } 
       }
     }
     
    /* Affichage du formulaire d'ajout de modèle de contrat */
    public function getContrat(Request $request)
    {             
            $role= Auth::user()->roleamapien_id; 
            if($role == 3){
              $referent= Auth::user()->id; 
              $categories = Categorie::where("referent_id",$referent)->get();
              $data = array('categories' =>$categories);
              return view('referent/contrat/newContrat',$data);
            }else {
              $categories = Categorie::all();
              $data = array('categories' =>$categories);
              return view('referentPlus/contrat/newContrat',$data);
            }
            
    }
    /* Ajout d'un modèle de contrat */

    public function postContrat(Request $request)
    {
            $categorie=$request->input('categorie');
            echo $categorie;
            $libelle=Categorie::find($categorie);
            $titre =$libelle->libelle;
            $dateDebut=  date("Y-m-d", strtotime($request->input('dateDebut')));          
            $dateFin = date("Y-m-d", strtotime($request->input('dateFin')));
            $vacance = date("Y-m-d", strtotime($request->input('vacance')));
            Contrat::create(array(
                'titre' =>$titre,
                'categorie_id' =>$categorie,
                'debutLivraison' =>$dateDebut,
                'dateDeFinLivraison' =>$dateFin,
                'vacance' =>$vacance,
            ));
           
            
          if(Auth::user()->roleamapien_id == 3 ){
            return redirect('liste-contrat');
          } else{ 
            return redirect('liste-contrat');
          }
    }

      

        /* Afficher le details d'un contrat */
      public function showContrat($id)
       {        
            $TabMois=array("janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre");
            $ReferentPlus= Auth::user()->id; 
            $contrat = Contrat::find($id);
            $amapien = array();
            $categorie = Categorie::find($contrat->categorie_id);
            $producteur = User::find($categorie->producteur_id);
            $dL=date_create($contrat->debutLivraison);
            $dF=date_create($contrat->dateDeFinLivraison);
            $dates=$this->getDates(date_format($dL,"d-m-Y"), date_format($dF,"d-m-Y"));
            $semaineImpaire=array();
            $semainePaire =array();
            $dDebut = $TabMois[intval(explode("-",$contrat->debutLivraison)[1])-1]." ".explode("-",$contrat->debutLivraison)[0];
            $dFin =$TabMois[intval(explode("-",$contrat->dateDeFinLivraison)[1])-1]." ".explode("-",$contrat->dateDeFinLivraison)[0];
            $periode =$dDebut."-".$dFin;
            $periodicite=Periodicite::find($categorie->periodicite_id);
            $allPeriodicite =Periodicite::all();
            for($i=0;$i<count($dates);$i++) {
                if($dates[$i]['semaine']%2 ==0 ){
                    $semainePaire[] = $dates[$i]['date'];
                }
                else{
                    $semaineImpaire[] =$dates[$i]['date'];
                }
               
              
            }
            $vacance = $contrat->vacance;
            $data = array('amapien' => $amapien,
                            'categorie' =>$categorie,
                            'contrat' =>$contrat,
                            'producteur' =>$producteur,
                            'semaineImpaire' =>$semaineImpaire,
                             'semainePaire' =>$semainePaire,
                             'periode' =>$periode,
                             'periodicite'=>$periodicite,
                             'vacance' =>$vacance,
                             'dateDebut'=>date_format($dL,"d-m-Y"),
                             'dateFin'=>date_format($dF,"d-m-Y")
                             );
             if(Auth::user()->roleamapien_id == 3 ){
                return view('referent/contrat/showContrat',$data);

             }else {
              return view('referentPlus/contrat/showContrat',$data);

             }

        }



     
        /* Affichage du formulaire de modification du modèle de contrat */
       public function getFormModifContrat($id)
       {             
            $categories = Categorie::all();
            $contrat=Contrat::find($id);
            $dD=date_format(date_create($contrat->debutLivraison),"d-m-Y");
            $dF=date_format(date_create($contrat->dateDeFinLivraison), "d-m-Y");
            $data = array('categories' =>$categories,
                            'contrat'=>$contrat,
                             'dateDebut'=>$dD,
                             'dateFin'=>$dF,);
             if(Auth::user()->roleamapien_id == 3 ){
               return view('referent/contrat/formModifContrat',$data);
             }else {
               return view('referentPlus/contrat/formModifContrat',$data);
             }
        }


        /** Modification d'un formulaire **/
         

    public function postFormModifContrat(Request $request,$id)
    {
            $categorie=$request->input('categorie');
            $libelle=Categorie::find($categorie);
            $titre =$libelle->libelle;
            $dateDebut=  date("Y-m-d", strtotime($request->input('dateDebut')));          
            $dateFin = date("Y-m-d", strtotime($request->input('dateFin')));
            $vacance = date("Y-m-d", strtotime($request->input('vacance')));
            $contrat=Contrat::find($id);
            $contrat->titre=$titre;
            $contrat->categorie_id=$categorie;
            $contrat->debutLivraison=$dateDebut;
            $contrat->dateDeFinLivraison=$dateFin;
            $contrat->vacance=$vacance;

            $contrat->save();
          return redirect('liste-contrat');
    }

    /** Supprimer un contrat **/

    public function supprimerContrat(Request $request,$id)
    {
          Contrat::destroy($id);
          return redirect('liste-contrat');
    }


     /** Genération des semaines paire et imapaire à partir de la date de debut et la date de 
     fin  de contrat **/
    public function getDates($dateDebut, $dateFin){
            $d=explode("-",$dateDebut);
            $f=explode("-",$dateFin);
            $jours=2;
           
            $i=mktime(0,0,0,$d[1],$d[0],$d[2]);
            $j=mktime(0,0,0,$f[1],$f[0],$f[2]);
            $pas=60*60*24;
            $fin=$i+(60*60*24*6);
            for($deb=$i; $deb<= $fin; $deb+=$pas)
            {
       
                if(date("N", $deb)==$jours)
                {
                    $premier=$deb;
                     break;
                }
            }
             $pas=60*60*24*7;
             $date=array();
            for($premier; $premier <= $j; $premier+=$pas)
            {
                //echo date("l d-m-Y", $premier)." ".date("W",$premier)."<br>";

                    $date[]= array("date" =>date(" d-m-Y", $premier),
                                  "semaine"=>date("W",$premier));
            }
            return $date;
        }
     
}