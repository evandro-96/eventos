<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class CoreografiaJurado extends Model
{
    protected $table = 'festival_coreografia_jurados';
    public $timestamps = false;

    public function jurado()
    {
        return $this->belongsTo('sistemaLaravel\Jurado', 'id_jurado');
    }

    public function coreografia()
    {
        return $this->belongsTo('sistemaLaravel\Coreografia', 'id_inscricao');
    }
}