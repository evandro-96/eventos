<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Elenco;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaLaravel\Http\Requests\ElencoFormRequest;
use DB;

class ElencoController extends Controller
{
    public function __construct(){
    	//
    }

    public function index(Request $request){

    	if($request){
    		$query=trim($request->get('searchText'));
    		$elencos=DB::table('festival_elenco as fe')
    		->join('festival_academia as fa', 'fe.ID_ACADEMIA', '=',
    			'fa.ID')
    		->select('fe.ID', 'fa.ACADEMIA', 'fe.NOME',
    		 'fe.DT_NASCIMENTO', 'fa.ACADEMIA as festival_academia', 'fe.RG',
    		 'fe.RG_ANEXO', 'fe.CPF_ANEXO', 'fe.FOTO_ANEXO')
    		->where('fe.NOME', 'LIKE', '%'.$query.'%')
    		->orderBy('ID', 'desc')
    		->paginate(7);
    		return view('festival.elenco.index', [
    			"elenco"=>$elencos, "searchText"=>$query
    			]);
    	}
    }

    public function create(){


    }
 
    public function store(ElencoFormRequest $request){
    	$elenco = new Elenco;
    	$elenco->ID=$request->get('ID');
    	$elenco->ID_ACADEMIA=$request->get('ID_ACADEMIA');
    	$elenco->NOME=$request->get('NOME');
    	$elenco->DT_NASCIMENTO=$request->get('DT_NASCIMENTO');
    	$elenco->RG=$request->get('RG');
    	$elenco->RG_ANEXO='RG_ANEXO';
    	
    	if(Input::hasFile('imagem')){
    		$file=Input::file('imagem');
    		$file->move(public_path().'/imagens/elencos/',
    			$file->getClientOriginalName());
    		$elenco->imagem=$file->getClientOriginalName();
    	}
    	
    	$elenco->save();
    	return Redirect::to('festival/elenco');
    }

    public function show($id){
    	return view("festival.elenco.show",
    		["festival_elenco"=>Elenco::findOrFail($id)]);
    }

    public function edit($id){


    }

    public function update(ElencoFormRequest $request, $id){
    	$elenco=Elenco::findOrFail($id);
    	
    	$elenco->idcategoria=$request->get('idcategoria');
    	$elenco->codigo=$request->get('codigo');
    	$elenco->nome=$request->get('nome');
    	
    	
    	if(Input::hasFile('imagem')){
    		$file=Input::file('imagem');
    		$file->move(public_path().'/imagens/elencos/',
    			$file->getClientOriginalName());
    		$elenco->imagem=$file->getClientOriginalName();
    	}

    	$elenco->update();
    	return Redirect::to('festival/elenco');
    }

    public function destroy($id){
    	$elenco=Elenco::findOrFail($id);
    	$elenco->estado='Inativo';
    	$elenco->update();
    	return Redirect::to('festival/elenco');
    }
}
