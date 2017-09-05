<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        dump($request);
        $query = DB::table('festival_coreografia_jurados')
            ->join('festival_coreografia', 'festival_coreografia_jurados.id_inscricao', '=', 'festival_coreografia.id_inscricao')
            ->select('nomecoreografia', 'modalidade', 'id_academia', 'id_jurado', 'categoria', 'participacao')
            ->where('modalidade', $request->modalidade)->where('categoria', $request->categoria)
            ->where('participacao', $request->participacao)->get();

            dump($query);

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
        CoreografiaJurado::where('id_jurado', $request->jurado)->delete();

        $coreografiaJurado = new CoreografiaJurado();
        $coreografiaJurado->id_jurado = $request->jurado;
        $coreografiaJurado->id_inscricao = $request->jurado;
        $coreografiaJurado->tipo = Coreografia::find($request->coreografia)->modalidade;
        $coreografiaJurado->nota_01 = $request['nota-1'];
        $coreografiaJurado->nota_02 = $request['nota-2'];
        $coreografiaJurado->nota_03 = $request['nota-3'];
        $coreografiaJurado->nota_04 = $request['nota-4'];
        $coreografiaJurado->nota_05 = $request['nota-5'];
        $coreografiaJurado->nota_06 = $request['nota-6'];
        $coreografiaJurado->comentario = $request->comentarios;
        $coreografiaJurado->save();

        return redirect()->route('avaliacao.avaliar')->with('status', 'Avaliação Realizada com Sucesso!');
    }
}
