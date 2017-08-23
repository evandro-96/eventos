<?php

namespace sistemaLaravel\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use sistemaLaravel\Academia;
use sistemaLaravel\Coreografia;
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
        // conversao da data que vem do banco para (d/m/y)
        $toCarbon = Carbon::parse();
    	if($request){
    		$query=trim($request->get('searchText'));
    		$elencos=DB::table('festival_elenco as fe')
    		->join('festival_academia as fa', 'fe.ID_ACADEMIA', '=',
    			'fa.ID')
    		->select('fe.ID', 'fa.ACADEMIA', 'fe.NOME',
    		 'fe.DT_NASCIMENTO', 'fa.ACADEMIA as festival_academia', 'fe.RG',
    		 'fe.RG_ANEXO', 'fe.CPF_ANEXO', 'fe.FOTO_ANEXO')
    		->where('fe.NOME', 'LIKE', '%'.$query.'%')
                ->orwhere('fa.ACADEMIA', 'LIKE', '%'.$query.'%')
                ->orwhere('fe.RG', 'LIKE', '%'.$query.'%')
    		->orderBy('ID', 'asc')
    		->paginate(25);
    		return view('festival.elenco.index', [ "toCarbon"=>$toCarbon,
    			"elenco"=>$elencos, "searchText"=>$query
    			]);
    	}
    }

    public function create(){
        $academias = Academia::all();
        $coreografia = Coreografia::all();
        return view("festival.elenco.create",["academias"=>$academias, "coreografia"=>$coreografia]);
    }
 
    public function store(ElencoFormRequest $request){
    	$elenco = new Elenco;

    	$elenco->ID_ACADEMIA=$request->get('ID_ACADEMIA');
    	$elenco->NOME=$request->get('NOME');
    	$elenco->DT_NASCIMENTO=$request->get('DT_NASCIMENTO');
    	$elenco->RG=$request->get('RG');
        if(Input::hasFile('RG_ANEXO')){
            $file=Input::file('RG_ANEXO');
            $file->move(public_path().'/imagens/elencos/',
                $file->getClientOriginalName());
            $elenco->RG_ANEXO=$file->getClientOriginalName();
        }
    	if(Input::hasFile('CPF_ANEXO')){
    		$file=Input::file('CPF_ANEXO');
    		$file->move(public_path().'/imagens/elencos/',
    			$file->getClientOriginalName());
    		$elenco->CPF_ANEXO=$file->getClientOriginalName();
    	}
        if(Input::hasFile('FOTO_ANEXO')){
            $file=Input::file('FOTO_ANEXO');
            $file->move(public_path().'/imagens/elencos/',
                $file->getClientOriginalName());
            $elenco->FOTO_ANEXO=$file->getClientOriginalName();
        }
        dump($elenco);
    	
    	$elenco->save();
    	return Redirect::to('festival/elenco');
    }

    public function show($id){
    	return view("festival.elenco.show",
    		["festival_elenco"=>Elenco::findOrFail($id)]);
    }

    public function edit($id){
        $elenco = Elenco::findOrFail($id);
        $academias = Academia::all();


        return view("festival.elenco.edit",
            ["elenco"=>$elenco, "academias"=>$academias]);
    }

    public function update(ElencoFormRequest $request, $id){
    	$elenco=Elenco::findOrFail($id);

        $elenco->ID_ACADEMIA=$request->get('ID_ACADEMIA');
        $elenco->NOME=$request->get('NOME');
        $elenco->DT_NASCIMENTO=$request->get('DT_NASCIMENTO');
        $elenco->RG=$request->get('RG');
        if(Input::hasFile('RG_ANEXO')){
            $file=Input::file('RG_ANEXO');
            $file->move(public_path().'/imagens/elencos/',
                $file->getClientOriginalName());
            $elenco->RG_ANEXO=$file->getClientOriginalName();
        }
        if(Input::hasFile('CPF_ANEXO')){
            $file=Input::file('CPF_ANEXO');
            $file->move(public_path().'/imagens/elencos/',
                $file->getClientOriginalName());
            $elenco->CPF_ANEXO=$file->getClientOriginalName();
        }
        if(Input::hasFile('FOTO_ANEXO')){
            $file=Input::file('FOTO_ANEXO');
            $file->move(public_path().'/imagens/elencos/',
                $file->getClientOriginalName());
            $elenco->FOTO_ANEXO=$file->getClientOriginalName();
        }

    	$elenco->update();
    	return Redirect::to('festival/elenco');
    }

    public function destroy($id){
    	$elenco=Elenco::findOrFail($id);

    	$elenco->delete();
    	return Redirect::to('festival/elenco');
    }
}
