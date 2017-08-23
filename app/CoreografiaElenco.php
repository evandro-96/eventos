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
        return $this->belongsTo('sistemaLaravel\Elenco', 'ID_ELENCO');
    }

    public function coreografia()
    {
        return $this->belongsTo('sistemaLaravel\Coreografia', 'ID_COREOGRAFIA');
    }

}