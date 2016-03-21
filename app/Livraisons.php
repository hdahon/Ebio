<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraisons extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'livraisons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dateLivraison', 'categorie_id', 'producteur_id','semaine'];

    /**
     * Un livraison est éffectué par un producteur     
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producteur()
    {
        return $this->belongsTo('App\User');
    }
    
   

    public function categorie()
    {
        return $this->belongsTo('App\Produit');
    }

}
