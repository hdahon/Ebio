<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['nomProduit','prix','categorie_id', 'unite_id'];

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
