<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropUnitType;
use DB;
use App\PropUnitTypeName;


//Bibliotecas para usar o validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

/*
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;*/

//Para usar o Validator???
//use Validator;
//use App\Http\Controllers\Controller;



class GestaoUnidades extends Controller
{
    public function show() {

    	$unidades = PropUnitType::with(['unitsNames' => function($query) {
                                    $query->where('language_id', '1');
                                }])->get();

    	return view('homeUnidades', compact('unidades'));
    }

    public function inserir(Request $req) {

        //die(print_r($req->all()));
    	$erros = Validator::make($req->all(), ['name' => ['required', 'string' , Rule::unique('prop_unit_type_name' , 'name')->where('language_id', '1')]]);

        if ($erros->fails()) {
            $unidades = PropUnitType::all();
            //die($erros->errors());
            $res = $erros->errors()->messages();
            return view('homeUnidades', compact('res', 'unidades'));
        }

        //Pegar no valor do campo.
		$name = $req->input('name');

		$data = array('name'=> $name);

		//DB::table('prop_unit_type')->insert($data);
        // inserir a unidade
        $uni = PropUnitType::create($data);
        // pegar o id da nova unidade inserida
        $id = $uni->id;

        // inserir o nome da unidade
        $dados = ['prop_unit_type_id' => $id, 'language_id' => 1, 'name' => $name];
        PropUnitTypeName::create($dados);

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

        //$unidade = PropUnitType::find($id)->toArray();
        $unidade = PropUnitType::with(['unitsNames' => function($query) {
                                    $query->where('language_id', '1');
                                }])->where('id', $id)->get();

    	return view('editarUnidades', compact('unidade'));
    }

    public function update(Request $req, $id) {

        $rules = ['name' => ['required', 'string' , Rule::unique('prop_unit_type_name' , 'name')->where('language_id', '1')]];

        $errors = Validator::make($req->all(), $rules);

        if ($errors->fails()) {
            $unidade = PropUnitType::with(['unitsNames' => function($query) {
                                    $query->where('language_id', '1');
                                }])->where('id', $id)->get();

            //die($errors->errors());
            $res = $errors->errors()->messages();
            return view('editarUnidades', compact('res', 'unidade'));
        }

        $name = $req->input('name');
        $data = array('name'=> $name);

        PropUnitTypeName::where('prop_unit_type_id', $id)
                        ->where('language_id', '1')
                        ->update($data);

        return redirect('/unidades');

    	/*$name = $req->input('nome');

    	DB::table('prop_unit_type')
    			->where('id', $id)
    			->update(['name' => $name]);

    	return redirect('/unidades');*/
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
