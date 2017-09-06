<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use sistemaLaravel\Academia;
use sistemaLaravel\Coreografia;
use sistemaLaravel\CoreografiaJurado;
use sistemaLaravel\Jurado;

class JuradosController extends Controller
{
    public function index()
    {

        $modalidades = DB::table('festival_coreografia')->select('modalidade')->distinct()->get()->toArray();
        $categorias = DB::table('festival_coreografia')->select('categoria')->distinct()->get()->toArray();
        $participacaos = DB::table('festival_coreografia')->select('participacao')->distinct()->get()->toArray();

        return view('festival.avaliacao.categoria', compact('modalidades', 'categorias', 'participacaos'));
    }

    public function gerarRelatorio(Request $request)
    {
//        dump($request);
        $aux = [];
        $query = DB::table('festival_coreografia_jurados')
            ->join('festival_coreografia', 'festival_coreografia_jurados.id_inscricao', '=', 'festival_coreografia.id_inscricao')
            ->select('festival_coreografia.id_inscricao', 'nomecoreografia', 'modalidade', 'id_academia',
                'id_jurado', 'categoria', 'participacao',
                'nota_01', 'nota_02', 'nota_03', 'nota_04', 'nota_05', 'nota_06')
            ->where('modalidade', $request->modalidade)->where('categoria', $request->categoria)
            ->where('participacao', $request->participacao)->orderBy('id_inscricao')->get();
//        dump($query);
        $notas = [];
        foreach ($query as $index => $e) {
            // ver se o id de inscrição ja esta inserido senao adiciona ele
            if (!array_key_exists($e->id_inscricao, $notas)) {
                $academia = Academia::find($e->id_academia)->ACADEMIA;
                $notas[$e->id_inscricao]['id_inscricao'] = $e->id_inscricao;
                $notas[$e->id_inscricao]['academia'] = $academia;
                $notas[$e->id_inscricao]['coreografia'] = $e->nomecoreografia;
                $notas[$e->id_inscricao]['modalidade'] = $e->modalidade;
                $notas[$e->id_inscricao]['categoria'] = $e->categoria;
                $notas[$e->id_inscricao]['participacao'] = $e->participacao;
            }
            $soma = $e->nota_01 + $e->nota_02 + $e->nota_03 + $e->nota_04 + $e->nota_05 + $e->nota_06;

            array_push($aux, $soma);
            $notas[$e->id_inscricao][$e->id_jurado] = [Jurado::find($e->id_jurado), $soma];

        }

        foreach ($notas as $index => $nota) {
            $aux = [$nota[1][1], $nota[2][1], $nota[3][1], $nota[4][1], $nota[5][1]];
            unset($aux[array_search(max($aux), $aux)]);
            unset($aux[array_search(min($aux), $aux)]);
            $notas[$index]['total'] = array_sum($aux)/3;
        }
//        dump($notas);
        $notas = array_reverse(array_values(array_sort($notas, function ($value) {
            return $value['total'];
        })));

//        dump($notas);

        $modalidade = $request->modalidade;
        $categoria = $request->categoria;
        $participacao = $request->participacao;

//        dump($notas);
        return view('festival.avaliacao.listagem_avaliacoes', compact('modalidade', 'categoria',
            'participacao', 'notas'));
    }

    public function avaliacao()
    {
        $jurados = Jurado::all()->pluck('id', 'nome');
        $coreografia = Coreografia::get()->sortBy('nomecoreografia')
            ->pluck('id_inscricao', 'nomecoreografia');

        return view('festival.avaliacao.avaliar', compact('jurados', 'coreografia'));
    }

    public function avaliacaoSalvar(Request $request)
    {
//        dump($request);
        CoreografiaJurado::where('id_jurado', $request->jurado)
            ->where('id_inscricao', $request->coreografia)->delete();

        $coreografiaJurado = new CoreografiaJurado();
        $coreografiaJurado->id_jurado = $request->jurado;
        $coreografiaJurado->id_inscricao = $request->coreografia;
        $coreografiaJurado->tipo = Coreografia::find($request->coreografia)->modalidade;
        $coreografiaJurado->nota_01 = $request['nota-1'];
        $coreografiaJurado->nota_02 = $request['nota-2'];
        $coreografiaJurado->nota_03 = $request['nota-3'];
        $coreografiaJurado->nota_04 = $request['nota-4'];
        $coreografiaJurado->nota_05 = $request['nota-5'];
        $coreografiaJurado->nota_06 = $request['nota-6'];
        $coreografiaJurado->comentario = $request->comentarios;
        $coreografiaJurado->saveOrFail();

        return redirect()->route('avaliacao.avaliar')->with('status', 'Avaliação Realizada com Sucesso!');
    }
}
