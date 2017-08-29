<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    protected $table = 'festival_jurados';

    public function coreografiaJurado()
    {
        return $this->hasMany('sistemaLaravel\CoreografiaJurado', 'id_jurado');
    }
}
