<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usuario';

    protected $fillable = [
        'login',
        'senha'
    ];

    protected $hidden = [
        'senha',
    ];

    public $timestamps = false;

    //Override
    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}
