<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    protected $table = 'festival_elenco';
    protected $primaryKey = 'ID';
    protected $dates = ['dob'];

    public $timestamps = false;
    protected $fillable = [

    'ID_ACADEMIA',
    'NOME',
    'DT_NASCIMENTO',
    'RG',
    'RG_ANEXO',
    'CPF_ANEXO',
    'FOTO_ANEXO'

    ];

    protected $guarded = [];

    public function academia()
    {
        return $this->belongsTo('sistemaLaravel\Academia', 'ID_ACADEMIA');
    }

    public function coreografiaElenco()
    {
        return $this->belongsTo('sistemaLaravel\CoreografiaElenco', 'ID_ELENCO');
    }
}
