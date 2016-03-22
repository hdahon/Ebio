<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reports';
    
    /**
     * @var array
     */
    protected $fillable = ['id','livraison_id','user_id','ancienneDateLivraison','nouvelleDateLivraison'];

}
