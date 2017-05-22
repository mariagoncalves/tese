<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomForm;

class GestaoFormularios extends Controller
{
    public function show() {


    	$custom = CustomForm::all();
        return view('homeFormularios', compact('custom'));



    	//return view('homeFormularios');
    }
}
