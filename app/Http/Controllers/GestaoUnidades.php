<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropUnitType;
use DB;

class GestaoUnidades extends Controller
{
    public function show() {

    	$unidades = PropUnitType::all();

    	return view('homeUnidades', compact('unidades'));
    	//return view('homeFormularios', compact('custom', 'entidades', 'propriedades', 'unidades'));
    }

    public function inserir(Request $req) {

    	/*$this->validate(request(),[
    		'name' => 'required'
    	]);*/

		$name = $req->input('name');

		$data = array('name'=>$name);

		DB::table('prop_unit_type')->insert($data);
		return redirect('/unidades');
    }

    public function editar($id) {

    	$unidades = PropUnitType::all();

    	return view('editarUnidades', compact('unidades'));
    }
}
