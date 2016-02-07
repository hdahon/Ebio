<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 * @package App
 */
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Un amapien sourscrit à un un ou plusieurs contrats
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrats()
    {
        return $this->hasMany('App\Contrat');
    }

    /**
     * Un producteur fournit une liste de produits
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits(){
        return $this->hasMany('App\Produit');
    }

    /**
     * Un amapien à un ou plusieurs roles (Amapien par defaut)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        }

    /**
     * Un producteur effectue une ou plusieurs livraison
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livraisons(){
        return $this->hasMany('App\Livraison');
    }

    /**
     * Un amapien effectue un ou plusieur paiment
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paiements(){
        return $this->hasMany('App\Paiement');
    }
}
