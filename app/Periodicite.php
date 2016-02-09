<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodicite extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'periodicites';


/**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Categorie');
    }

     public function contratClients()
    {
        return $this->hasMany('App\ContratClient');
    }

}
