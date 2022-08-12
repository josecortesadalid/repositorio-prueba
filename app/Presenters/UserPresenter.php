<?php
namespace App\Presenters;

class UserPresenter extends Presenter
{

    protected $user;

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function setPasswordAttribute($password) // tres partes: set (definir o modificar un valor antes de guardarlo en la db), nombre de lo que queremos modificar y attribute
    {
        $this->attributes['password'] = bcrypt($password); // Con esto, siempre se guardará el password  encriptado
    }
}
?>