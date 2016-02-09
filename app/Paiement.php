<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paiements';

    /**
     * @var array
     */
    protected $fillable = ['amapien_id','referent_id', 'contratClient_id', 'mois','producteur_id',"banque",'cout','montant','titulaire','numeroCheque','quantite','nbPanier','mois'];


    /**
     * Un paiement est effectué  par un amapien
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function amapien()
    {
        return $this->belongsTo('App\User');
    }
     public function producteur()
    {
        return $this->belongsTo('App\User');
    }

     public function referent()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratClient()
    {
        return $this->belongsTo('App\ContratClient');
    }
}
