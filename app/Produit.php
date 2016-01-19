<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['nomProduit', 'referent_id', 'producteur_id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produits';
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrats()
    {
        return $this->hasMany('App\Contrat');
    }

    /**
     * Un produit à un referent
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referent()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * un produit à un producteur (à voir si un seul ou plusieur)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  producteur(){
        return $this->belongsTo('App\User');
    }
}
