<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    protected $table = 'festival_elenco';
    protected $primaryKey = 'ID';

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
}
