<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contrats';


    protected $fillable = ['titre', 'vacance' , 'categorie_id','debutLivraison','dateDeFinLivraison'];


   
    /**
     * Un contrat concerne une categorie de produit
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
