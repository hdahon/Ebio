<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paiements';


    /**
     * Un paiement est effectué  par un amapien
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function amapien()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Un paiement concerne un contrat
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrat()
    {
        return $this->belongsTo('App\Contrat');
    }
}
