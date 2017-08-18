<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class CoreografiaElenco extends Model
{
    protected $table = 'festival_coreografia_elenco';
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [

        'ID_ELENCO',
        'ID_COREOGRAFIA'

    ];

    protected $guarded = [];

    public function elenco()
    {
        return $this->hasMany('sistemaLaravel\Elenco', 'ID_ELENCO');
    }

    public function coreografia()
    {
        return $this->hasMany('sistemaLaravel\Coreografia', 'ID_COREOGRAFIA');
    }

}