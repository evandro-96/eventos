<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Academia extends Model
{
    protected $table = 'festival_academia';
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [

    'ACADEMIA',
    'NOMEDOGRUPO',
    'ENDERECO',
    'NUMERO',
    'BAIRRO',
    'CEP',
    'PAIS',
    'CIDADE',
    'UF',
    'EMAIL',
    'TELEFONE',
    'DIRETOR',
    'CELULAR',
    'USER',
    'PASS',
    'COMPROVANTE',
    'PAGO',
    'CPF',
    'COMPROVANTECPF'
    ];

    protected $guarded = [];

    public function elenco()
    {
        return $this->hasMany('sistemaLaravel\Elenco', 'ID_ACADEMIA');
    }
}
