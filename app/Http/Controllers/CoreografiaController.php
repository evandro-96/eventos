<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Academia;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Coreografia;
use sistemaLaravel\CoreografiaElenco;
use sistemaLaravel\Elenco;
use DB;
use sistemaLaravel\Http\Requests\CoreografiaFormRequest;
use Carbon\Carbon;

class CoreografiaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if($request){
            $query=trim($request->get('searchText'));
            $coreografias=DB::table('festival_coreografia as fc')
                ->join('festival_academia as fa', 'fc.id_academia', '=',
                    'fa.ID')
                ->select('fc.id_inscricao', 'fa.ACADEMIA', 'fc.nomecoreografia',
                    'fc.classificacao', 'fa.ACADEMIA as festival_academia', 'fc.modalidade',
                    'fc.categoria', 'fc.duracao', 'fc.participacao', 'fc.musica', 'fc.arquivo_musica'
                    , 'fc.coreografo', 'fc.link_youtube', 'fc.confirmada', 'fc.apresentacao', 'fc.horaensaio', 'fc.horaapresentacao', 'fc.dataapresentacao')
                ->where('fc.nomecoreografia', 'LIKE', '%'.$query.'%')
                ->orwhere('fc.classificacao', 'LIKE', '%'.$query.'%')
                ->orwhere('fc.categoria', 'LIKE', '%'.$query.'%')
                ->orwhere('fa.ACADEMIA', 'LIKE', '%'.$query.'%')
                ->orderBy('fa.ACADEMIA', 'asc')
                ->paginate(25);
            return view('festival.coreografia.index', [
                "coreografia"=>$coreografias, "searchText"=>$query
            ]);
    	}
    }

    public function create(){
        $academias = Academia::all();
    	return view("festival.coreografia.create",["academias"=>$academias]);
    }
 
    public function store(CoreografiaFormRequest $request){
    	$coreografia = new Coreografia();
        $data = explode('/', $request->dataapresentacao);
        $coreografia->nomecoreografia=$request->get('nomecoreografia');
        $coreografia->id_academia=$request->get('id_academia');
        $coreografia->classificacao=$request->get('classificacao');
        $coreografia->modalidade=$request->get('modalidade');
        $coreografia->categoria=$request->get('categoria');
        $coreografia->duracao=$request->get('duracao');
        $coreografia->participacao=$request->get('participacao');
        $coreografia->musica=$request->get('musica');
        $coreografia->arquivo_musica=$request->get('arquivo_musica');
        $coreografia->coreografo=$request->get('coreografo');
        $coreografia->link_youtube=$request->get('link_youtube');
        $coreografia->confirmada=$request->get('confirmada');
        $coreografia->horaapresentacao=$request->get('horaapresentacao');
        $coreografia->dataapresentacao= Carbon::create($data[2], $data[1], $data[0]);
        $coreografia->resumo=$request->get('resumo');
        $coreografia->save();
    	return Redirect::to('festival/coreografia');
    }

    public function show($id){
    	return view("festival.coreografia.show",
    		["festival_coreografia"=>Coreografia::findOrFail($id)]);
    }

    public function edit($id){
        $coreografia = Coreografia::findOrFail($id);
        $academias = Academia::all();
        $elenco = Elenco::first()->get();
        $coreografiaElenco = CoreografiaElenco::all();


        return view("festival.coreografia.edit",
            ["coreografia"=>$coreografia, "academias"=>$academias,
                "elenco"=>$elenco, "coreografiaElenco"=>$coreografiaElenco]);
    }

    public function update(CoreografiaFormRequest $request, $id){
        $coreografia=Coreografia::findOrFail($id);
        $data = explode('/', $request->dataapresentacao);
        $coreografia->nomecoreografia=$request->get('nomecoreografia');
        $coreografia->id_academia=$request->get('id_academia');
        $coreografia->classificacao=$request->get('classificacao');
        $coreografia->modalidade=$request->get('modalidade');
        $coreografia->categoria=$request->get('categoria');
        $coreografia->duracao=$request->get('duracao');
        $coreografia->participacao=$request->get('participacao');
        $coreografia->musica=$request->get('musica');
        $coreografia->arquivo_musica=$request->get('arquivo_musica');
        $coreografia->coreografo=$request->get('coreografo');
        $coreografia->link_youtube=$request->get('link_youtube');
        $coreografia->confirmada=$request->get('confirmada');
        $coreografia->dataapresentacao= Carbon::create($data[2], $data[1], $data[0]);
        $coreografia->resumo=$request->get('resumo');
//        dump($coreografia);
        $coreografia->update();
    	return Redirect::to('festival/coreografia');
    }

    public function destroy($id){
        $coreografia=Coreografia::findOrFail($id);
        $coreografia->delete();
    	return Redirect::to('festival/coreografia');
    }

    public function destroyCoreografiaElenco($id){
        $coreografiaElenco=CoreografiaElenco::findOrFail($id);
        $coreografiaElenco->delete();
//        dump($coreografiaElenco);
        return back();
    }


}
