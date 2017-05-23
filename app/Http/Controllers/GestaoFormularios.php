<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomForm;

class GestaoFormularios extends Controller
{
    public function show() {

    	//CustomForm : nome do modelo
    	$custom = CustomForm::all();

    	foreach ($custom as $formulario) {
    		echo "Nome do Form: ".$formulario->name;
    		echo "Nr de props do formulario: ".$formulario->properties->count();
    	}

        return view('homeFormularios', compact('custom'));

    	//return view('homeFormularios');
    }
}
