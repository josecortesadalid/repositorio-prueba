<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayuda extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function helpable()
    {
        return $this->morphTo();
    }



}
