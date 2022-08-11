<?php

namespace App\Presenters;

use App\Models\Articulo;
use App\Models\Ayuda;

class ArticuloPresenter extends Presenter
{

    protected $articulo;

    public function userName()
    {
        if($this->model->user_id){
            return $this->model->user->name;
        }else{
            return $this->model->nombre;
        }
    }
    public function userEmail()
    {
        if($this->model->user_id){
            return $this->model->user->email;
        }else{
            return $this->model->email;
        }
    }

    public function ayudas()
    {
        return $this->ayuda->body;
    }
}
?>