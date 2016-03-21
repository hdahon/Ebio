<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['libelle'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unite';

}
