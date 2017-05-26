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
    	$unidade = PropUnitType::find($id);

    	return view('editarUnidades', compact('unidades', 'unidade'));
    }

    public function update(Request $req, $id) {

    	$name = $req->input('nome');

    	DB::table('prop_unit_type')
    			->where('id', $id)
    			->update(['name' => $name]);

    	return redirect('/unidades');
    }

    public function ativar($id) {

        $unidades = PropUnitType::find($id);
        $unidades->state = 'active';
        $unidades->save();

    	//$state = array('state' => 'active');
    	/*$estado = 'active';

    	DB::table('prop_unit_type')
    			->where('id', $id)
    			->update(['state' => $estado]);

    	//return view('homeUnidades', compact('unidades', 'unidade'));*/
    	return redirect('/unidades');
    }

    public function desativar($id) {

    	$unidades = PropUnitType::find($id);
        $unidades->state = 'inactive';
        $unidades->save();

        return redirect('/unidades');
    }
}
