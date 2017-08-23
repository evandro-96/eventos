<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Coreografia extends Model
{
    protected $table = 'festival_coreografia';
    protected $primaryKey = 'id_inscricao';

    public $timestamps = false;
    protected $fillable = [

    'id_academia',
    'nomecoreografia',
    'classificacao',
    'modalidade',
    'classificacao',
    'modalidade',
    'categoria',
    'duracao',
    'participacao',
    'musica',
    'arquivo_musica',
    'coreografo',
    'link_youtube',
    'confirmada',
    'apresentacao',
    'horaensaio',
    'horaapresentacao',
    'sequencia',
    'seq_modalidade',
    'seq_participacao',
    'parecer1',
    'parecer2'
    ];

    protected $guarded = [];

    public function academia()
    {
        return $this->belongsTo('sistemaLaravel\Academia', 'id_academia');
    }

    public function coreografiaElenco()
    {
        return $this->hasMany('sistemaLaravel\CoreografiaElenco', 'ID_COREOGRAFIA');
    }

}
