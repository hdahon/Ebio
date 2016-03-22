<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['nomProduit', 'unite_id','prix','categorie_id'];

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
    public function categorie()
    {
        return $this->hasMany('App\Categorie');
    }


   
}
