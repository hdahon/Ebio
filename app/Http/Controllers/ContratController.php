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
        var $contrat= null;
        //si referent ne recuperer que les contrats dont il est le referent
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
         //si admin et referent plus et aussi amapien pour pouvoir souscrire directement à un contrat
       else{
          $contrats = Contrat::all();
          $contrat=array();
          if(Auth::user()->roleamapien_id == 1){
            $iter=0;
            foreach ($contrats as $value) {

                $debutS=date_format(date_create($value->debutSouscription),'Y/m/d');
                $finS=date_format(date_create($value->finSouscription),'Y/m/d');
                $jour=date('Y/m/d',time());
                $t1= round((strtotime($jour)-strtotime($debutS))/(60*60*24));
                $t2=round((strtotime($jour)-strtotime($finS))/(60*60*24));
                
                if($t1>0 && $t2<0){
                    $contrat[$iter]=$value;
                    $iter++;
                }
            }
           
            $data = array('contrats' => $contrat);
             return view('amapien/contratClient/listContratModel',$data);
          }else{
            $data = array('contrats' => $contrats);
          return view('pages/contrat/listContrat',$data);
          } 
       }
     }
     
    /* Affichage du formulaire d'ajout de modèle de contrat */
    public function getContrat(Request $request)
    {             
            $role= Auth::user()->roleamapien_id; 
            //referent
            if($role == 3){
              $referent= Auth::user()->id; 
              $categories = Categorie::where("referent_id",$referent)->get();
              $data = array('categories' =>$categories);
              return view('referent/contrat/newContrat',$data);
            }
            //-- refrent plus et admin
            else {
              $categories = Categorie::all();
              $data = array('categories' =>$categories);
              return view('pages/contrat/newContrat',$data);
            }
            
    }
    /* Ajout d'un modèle de contrat */

    public function postContrat(Request $request)
    {
             $this->validate($request, [
                'categorie' => 'required',
                'dateDebut' => 'required',
                'dateFin' => 'required',
                 'debutS' => 'required',  
                 'finS' => 'required', 
                 ]);

            $categorie=$request->input('categorie');
            $libelle=Categorie::find($categorie);
            $titre =$libelle->libelle;

            $dateDebut=  date("Y-m-d", strtotime($request->input('dateDebut')));          
            $dateFin = date("Y-m-d", strtotime($request->input('dateFin')));
            $vacance = date("Y-m-d", strtotime($request->input('vacance')));
            $vacance1 = date("Y-m-d", strtotime($request->input('vacance1')));
            $vacance2 = date("Y-m-d", strtotime($request->input('vacance2')));
            $debutS=  date("Y-m-d", strtotime($request->input('debutS')));          
            $finS = date("Y-m-d", strtotime($request->input('finS')));

            if($vacance1 ==""){
                $vacance1=date("Y-m-d",strtotime("0000-00-00"));
            }
            if($vacance2 ==""){
                $vacance2=date("Y-m-d",strtotime("0000-00-00"));
            }
                Contrat::create(array(
                'titre' =>$titre,
                'categorie_id' =>$categorie,
                'debutLivraison' =>$dateDebut,
                'dateDeFinLivraison' =>$dateFin,
                'debutSouscription' =>$debutS,
                'finSouscription' =>$finS,
                'vacance' =>$vacance,
                'vacance1' =>$vacance1,
                'vacance2' =>$vacance1,

            ));
                    
            return redirect('liste-contrat');
    }

      

        /* Afficher le un contrat */
      public function showContrat($id)
       {        
            $TabMois=array("janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre");

            $semaineImpaire=array();
            $semainePaire =array();
            $vacances=array();

            $ReferentPlus= Auth::user()->id; 
            $contrat = Contrat::find($id);
            $categorie = Categorie::find($contrat->categorie_id);
            $producteur = User::find($categorie->producteur_id);
            $periodicite=Periodicite::find($categorie->periodicite_id);

            $dL=date_create($contrat->debutLivraison);
            $dF=date_create($contrat->dateDeFinLivraison);
            //recuperation de tous les mardi entre date de debut livraison et fin livraison
            $dates=$this->getDates(date_format($dL,"d-m-Y"), date_format($dF,"d-m-Y"));
            //titre contrat exmpl octobre2015 -mars2016
            $dDebut = $TabMois[intval(explode("-",$contrat->debutLivraison)[1])-1]." ".explode("-",$contrat->debutLivraison)[0];
            $dFin =$TabMois[intval(explode("-",$contrat->dateDeFinLivraison)[1])-1]." ".explode("-",$contrat->dateDeFinLivraison)[0];
            $periode =$dDebut."-".$dFin;
            
            //recuperation des date de vacance 3  au max
            $vacance[0] = date(" d-m-Y",strtotime($contrat->vacance));
            $vacance[1] = date(" d-m-Y",strtotime($contrat->vacance2));
            $vacance[2] = date(" d-m-Y",strtotime($contrat->vacance));

            for($i=0;$i<count($dates);$i++) {
                
                if($dates[$i]['date'] == $vacance[0]){
                    $vacances[]=$vacance[0];
                }else if($dates[$i]['date'] == $vacance[1] )
                {
                    $vacances[]=$vacance[1];
                }else if($dates[$i]['date'] == $vacance[2] ){
                    $vacances[]=$vacance[2];
                }else{
                   
                    if($dates[$i]['semaine']%2 ==0 ){
                        $semainePaire[] = $dates[$i]['date'];
                    }
                 else{
                        $semaineImpaire[] =$dates[$i]['date'];
                    }
               
              }
          }

            $data = array('categorie' =>$categorie,
                            'contrat' =>$contrat,
                            'producteur' =>$producteur,
                            'semaineImpaire' =>$semaineImpaire,
                             'semainePaire' =>$semainePaire,
                             'periode' =>$periode,
                             'periodicite'=>$periodicite,
                             'vacance' =>$vacances,
                             'dateDebut'=>date_format($dL,"d-m-Y"),
                             'dateFin'=>date_format($dF,"d-m-Y")
                             );
            
              return view('pages/contrat/showContrat',$data);
              
             
        }


     
        /* Affichage du formulaire de modification du modèle de contrat */
       public function getFormModifContrat($id)
       {             
            $categories = Categorie::all();
            $contrat=Contrat::find($id);

            $dD=date_format(date_create($contrat->debutLivraison),"Y-m-d");
            $dF=date_format(date_create($contrat->dateDeFinLivraison), "Y-m-d");
            $dS=date_format(date_create($contrat->debutSouscription), "Y-m-d");
            $fS=date_format(date_create($contrat->finSouscription), "Y-m-d");
            $vacance=date_format(date_create($contrat->vacance), "Y-m-d");
            $vacance1=date_format(date_create($contrat->vacance1), "Y-m-d");
            $vacance2=date_format(date_create($contrat->vacance2), "Y-m-d");

            if($contrat->vacance=="0000-00-00 00:00:00"){
                $vacance="";
            }
            if($contrat->vacance1=="0000-00-00 00:00:00"){
                  $vacance1="";
            }
            if($contrat->vacance2 =="0000-00-00 00:00:00"){
                  $vacance2="";
            }
            $data = array('categories' =>$categories,
                            'contrat'=>$contrat,
                             'dateDebut'=>$dD,
                             'dateFin'=>$dF,
                             'vacance'=>$vacance,
                             'vacance1'=>$vacance1,
                             'vacance2'=>$vacance2,
                             'dS'=>$dS,
                             'fS'=>$fS
                             );
             if(Auth::user()->roleamapien_id == 3 ){
               return view('referent/contrat/formModifContrat',$data);
             }else {
               return view('pages/contrat/formModifContrat',$data);
             }
        }


        /** Modification d'un formulaire **/
         

    public function postFormModifContrat(Request $request,$id)
    {
          $this->validate($request, [
                'categorie' => 'required',
                'dateDebut' => 'required',
                'dateFin' => 'required',
                 'debutS' => 'required',  
                 'finS' => 'required', 
                 ]);
           $categorie=$request->input('categorie');
            $libelle=Categorie::find($categorie);
            $titre =$libelle->libelle;

            $dateDebut=  date("Y-m-d", strtotime($request->input('dateDebut')));          
            $dateFin = date("Y-m-d", strtotime($request->input('dateFin')));
            $vacance = date("Y-m-d", strtotime($request->input('vacance')));
            $vacance1 = date("Y-m-d", strtotime($request->input('vacance1')));
            $vacance2= date("Y-m-d", strtotime($request->input('vacance2')));
            $debutS=  date("Y-m-d", strtotime($request->input('debutS')));          
            $finS = date("Y-m-d", strtotime($request->input('finS')));
            
            $contrat=Contrat::find($id);
            $contrat->titre=$titre;
            $contrat->categorie_id=$categorie;
            $contrat->debutLivraison=$dateDebut;
            $contrat->dateDeFinLivraison=$dateFin;
            $contrat->vacance=$vacance;
            $contrat->vacance1=$vacance1;
            $contrat->vacance2=$vacance2;
            $contrat->debutSouscription=$debutS;
            $contrat->finSouscription=$finS;

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