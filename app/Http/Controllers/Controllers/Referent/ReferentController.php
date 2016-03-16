<?php

namespace App\Http\Controllers\Referent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Produit;
use App\Contrat;
class ReferentController extends Controller
{

    
        
   
    public function contrat(Request $request)
    {

        return view('pages/contrat');

    }
     public function report(Request $request)
    {

        return view('pages/report');

    }
    public function distribution(Request $request)
    {
         $TabMois=array("janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        $contrat = Contrat::find(24);
        $semaineImpaire=array();
        $semainePaire =array();
        $dates=$this->getDates($contrat->debutLivraison, $contrat->dateDeFinLivraison);
        $dDebut = $TabMois[intval(explode("-",$contrat->debutLivraison)[1])-1]." ".explode("-",$contrat->debutLivraison)[0];
        $dFin =$TabMois[intval(explode("-",$contrat->dateDeFinLivraison)[1])-1]." ".explode("-",$contrat->dateDeFinLivraison)[0];
        for($i=0;$i<count($dates);$i++) {
        if($dates[$i]['semaine']%2 ==0 ){
        $semainePaire[] = $dates[$i]['date'];
                }
                else{
                    $semaineImpaire[] =$dates[$i]['date'];
                }
              
            }
$data = array(
                            'semaineImpaire' =>$semaineImpaire,
                             'semainePaire' =>$semainePaire,
                             );
        return view('pages/distribution',$data);

    }



     public function getDates($dateDebut, $dateFin){
            $d=explode("-",$dateDebut);
            $f=explode("-",$dateFin);
            $jours=2;
            $i=mktime(0,0,0,$d[1],$d[2],$d[0]);
            $j=mktime(0,0,0,$f[1],$f[2],$f[0]);
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