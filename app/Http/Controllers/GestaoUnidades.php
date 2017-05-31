<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropUnitType;
use DB;
//Bibliotecas para usar o validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

/*;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;*/

//Para usar o Validator???
//use Validator;
//use App\Http\Controllers\Controller;



class GestaoUnidades extends Controller
{
    public function show() {

    	$unidades = PropUnitType::all();

    	return view('homeUnidades', compact('unidades'));
    	//return view('homeFormularios', compact('custom', 'entidades', 'propriedades', 'unidades'));
    }

    public function inserir(Request $req) {

        $unidades = PropUnitType::all();
        //die(print_r($req->all()));
        //Não dá erro nem insere.
    	$errors = Validator::make($req->all(), ['name' => 'required|alpha']);

        // die(print_r($res->errors(), 1));
        /*if(empty($_REQUEST['nome'])) {
            echo "O campo nome é de preenchimento obrigatório.";
            return;
        }*/
        if ($errors->fails()) {
            //die($errors->errors());
            $res = $errors->errors()->messages();
            return view('homeUnidades', compact('res', 'unidades'));
        }

        //Pegar no valor do campo.
		$name = $req->input('name');

		$data = array('name'=> $name);

		DB::table('prop_unit_type')->insert($data);

        //return view('homeUnidades', compact('res', 'unidades'));
		return redirect('/unidades');
    }

    /*public function store(Request $req) {

        $validador = Validator::make($request->all(), [
            'name' => 'required|alpha|max:100',
        ]);

         if ($validator->fails()) {
            return redirect('unidades')
                        ->withErrors($validator)
                        ->withInput();
        }


    }*/

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
