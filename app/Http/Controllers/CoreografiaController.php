<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Academia;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Coreografia;
use sistemaLaravel\Http\Requests\AcademiaFormRequest;
use DB;
use sistemaLaravel\Http\Requests\CoreografiaFormRequest;

class CoreografiaController extends Controller
{
    public function __construct(){
    	//
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
                    , 'fc.coreografo', 'fc.link_youtube', 'fc.confirmada', 'fc.apresentacao', 'fc.horaensaio', 'fc.horaapresentacao')
                ->where('fc.nomecoreografia', 'LIKE', '%'.$query.'%')
                ->orwhere('fc.classificacao', 'LIKE', '%'.$query.'%')
                ->orderBy('id_inscricao', 'asc')
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
        $coreografia->nomecoreografia=$request->get('nomecoreografia');
        $coreografia->id_academia=$request->get('id_academia');
        $coreografia->ACADEMIA=$request->get('ACADEMIA');
        $coreografia->classificacao=$request->get('classificacao');
        $coreografia->modalidade=$request->get('modalidade');
        $coreografia->categoria=$request->get('categoria');
        $coreografia->duracao=$request->get('duracao');
        $coreografia->participacao=$request->get('participacao');
        $coreografia->musica=$request->get('musica');
        $coreografia->arquivo_musica=$request->get('arquivo_musica');
        $coreografia->coreografo=$request->get('coreografia');
        $coreografia->link_youtube=$request->get('link_youtube');
        $coreografia->confirmada=$request->get('confirmada');
        $coreografia->dataapresentacao=$request->get('dataapresentacao');
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

        return view("festival.coreografia.edit",
            ["coreografia"=>$coreografia, "academias"=>$academias]);
    }

    public function update(CoreografiaFormRequest $request, $id){
        $coreografia=Coreografia::findOrFail($id);
        $coreografia->nomecoreografia=$request->get('nomecoreografia');
        $coreografia->id_academia=$request->get('id_academia');
        $coreografia->ACADEMIA=$request->get('ACADEMIA');
        $coreografia->classificacao=$request->get('classificacao');
        $coreografia->modalidade=$request->get('modalidade');
        $coreografia->categoria=$request->get('categoria');
        $coreografia->duracao=$request->get('duracao');
        $coreografia->participacao=$request->get('participacao');
        $coreografia->musica=$request->get('musica');
        $coreografia->arquivo_musica=$request->get('arquivo_musica');
        $coreografia->coreografo=$request->get('coreografia');
        $coreografia->link_youtube=$request->get('link_youtube');
        $coreografia->confirmada=$request->get('confirmada');
        $coreografia->dataapresentacao=$request->get('dataapresentacao');
        $coreografia->update();
    	return Redirect::to('festival/coreografia');
    }

    public function destroy($id){
        $academia=Coreografia::findOrFail($id);
        $academia->delete();
    	return Redirect::to('festival/coreografia');
    }
}