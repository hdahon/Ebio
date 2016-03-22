<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';


    protected $fillable = ['libelle','producteur_id','referent_id','periodicite_id','typePanier_id','periodicite2_id','periodicite3_id'];

    public function referent(){
    	return $this->belongsTo('App\User');
    }

       public function contrats(){
        return $this->hasMany('App\Contrat');
    }


     public function producteur(){
    	return $this->belongsTo('App\User');
    }

     public function periodicite(){
    	return $this->belongsTo('App\User');
    }

}
