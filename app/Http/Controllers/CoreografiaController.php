<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Academia;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Coreografia;
use sistemaLaravel\Http\Requests\AcademiaFormRequest;
use DB;

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
                    , 'fc.coreografo', 'fc.link_youtube', 'fc.confirmada')
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
    	return view("festival.academia.create");
    }
 
    public function store(AcademiaFormRequest $request){
    	$academia = new Coreografia();
        $academia->ACADEMIA=$request->get('ACADEMIA');
        $academia->NOMEDOGRUPO=$request->get('NOMEDOGRUPO');
        $academia->ENDERECO=$request->get('ENDERECO');
        $academia->NUMERO=$request->get('NUMERO');
        $academia->BAIRRO=$request->get('BAIRRO');
        $academia->CEP=$request->get('CEP');
        $academia->PAIS=$request->get('PAIS');
        $academia->CIDADE=$request->get('CIDADE');
        $academia->UF=$request->get('UF');
        $academia->EMAIL=$request->get('EMAIL');
        $academia->TELEFONE=$request->get('TELEFONE');
        $academia->DIRETOR=$request->get('DIRETOR');
        $academia->CELULAR=$request->get('CELULAR');
        $academia->USER=$request->get('USER');
        $academia->PASS=$request->get('PASS');
        $academia->COMPROVANTE=$request->get('COMPROVANTE');
        $academia->PAGO=$request->get('PAGO');
        $academia->CPF=$request->get('CPF');
        $academia->COMPROVANTECPF=$request->get('COMPROVANTECPF');
        $academia->save();
    	return Redirect::to('festival/academia');
    }

    public function show($id){
    	return view("festival.academia.show",
    		["festival_academia"=>Academia::findOrFail($id)]);
    }

    public function edit($id){

    	return view("festival.academia.edit",
    		["academia"=>Academia::findOrFail($id)]);
    }

    public function update(AcademiaFormRequest $request, $id){
    	$academia=Academia::findOrFail($id);
        $academia->ACADEMIA=$request->get('ACADEMIA');
        $academia->NOMEDOGRUPO=$request->get('NOMEDOGRUPO');
        $academia->ENDERECO=$request->get('ENDERECO');
        $academia->NUMERO=$request->get('NUMERO');
        $academia->BAIRRO=$request->get('BAIRRO');
        $academia->CEP=$request->get('CEP');
        $academia->PAIS=$request->get('PAIS');
        $academia->CIDADE=$request->get('CIDADE');
        $academia->UF=$request->get('UF');
        $academia->EMAIL=$request->get('EMAIL');
        $academia->TELEFONE=$request->get('TELEFONE');
        $academia->DIRETOR=$request->get('DIRETOR');
        $academia->CELULAR=$request->get('CELULAR');
        $academia->USER=$request->get('USER');
        $academia->PASS=$request->get('PASS');
        $academia->COMPROVANTE=$request->get('COMPROVANTE');
        $academia->PAGO=$request->get('PAGO');
        $academia->CPF=$request->get('CPF');
        $academia->COMPROVANTECPF=$request->get('COMPROVANTECPF');
        $academia->update();
    	return Redirect::to('festival/academia');
    }

    public function destroy($id){
        $academia=Academia::findOrFail($id);
        $academia->delete();
    	return Redirect::to('festival/academia');
    }
}
