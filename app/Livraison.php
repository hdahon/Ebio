<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'livraisons';


    /**
     * Un livraison est éffectué par un producteur     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producteur()
    {
        return $this->belongsTo('App\User');
    }
}
