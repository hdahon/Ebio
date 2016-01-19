<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAmapien extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roleamapiens';
    protected $fillable = ['nomRole','niveau'];

    /**
     * Un amapien à un ou plusieurs roles (Ampaien par defaut)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->hasMany('App\User');
    }
}
