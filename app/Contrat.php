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


    /**
     * Un contrat est souscrit par un amapien
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function amapien()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Un contrat concerne un produit
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
}
