<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typepanier extends Model
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
    protected $table = 'typepanier';

}
