<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratClient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contratClients';


    protected $fillable = ['contrat_id' , 'user_id', 'periodicite_id'];


    /**
     * Un contrat est souscrit par un amapien
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function amapien()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrat()
    {
        return $this->belongsTo('App\Contrat');
    }
    public function periodicite()
    {
        return $this->belongsTo('App\Periodicite');
    }
}
