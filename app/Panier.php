<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table="paniers";

    protected $fillable=['quantite','montant','user_id','livraison_id','produit_id','contratclient_id'];

    public function livraisons(){
    	return $this->belongsTo('App\Livraison');
    }

    public function produits(){
    	return $this->hasMany('App\Produit');
    }
}
