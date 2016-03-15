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
    protected $fillable = ['dateLivraison', 'quantite', 'amapien_id', 'produit_id', 'producteur_id'];

    /**
     * Un livraison est éffectué par un producteur     
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producteur()
    {
        return $this->belongsTo('App\User');
    }
    
    public function amapien()
    {
        return $this->belongsTo('App\User');
    }

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }

}
