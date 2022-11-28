<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /*protected $model = 'Usuario';
    protected $increments = false;
    protected $table = 'Usuarios';
    protected $primaryKey = 'UsuarioID';

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->Senha;
    }

    public function getReminderEmail() {
        return $this->Login;
    }*/

    protected $fillable = [
        'id', 'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}