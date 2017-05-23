<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomForm;
use App\EntType;
use App\Property;

class GestaoFormularios extends Controller
{
    public function show() {

    	//CustomForm : nome do modelo
    	$custom = CustomForm::all();
    	$entidades = EntType::all();
    	$propriedades = Property::all();

    	/*foreach ($custom as $formulario) {
    		echo "Nome do Form: ".$formulario->name;
    		$numLinhas = $formulario->properties->count();
    		echo $numLinhas;
    	}*/

    	/*foreach ($entidades as $entity) {
    		echo "Nome do Form: ".$entity->name."<br>";
    		$numLinhas = $entity->properties->count();
    		echo "Numero: ".$numLinhas."<br>";
    		//echo "nome da property ".$entity->properties->name."<br>";
    		echo "numero de entidades: ".$entity->name()."<br>";

    	}*/

    	foreach ($propriedades as $propriedade) {
    		echo "Nome do prop: ".$propriedade->name."<br>";
    		echo "ID do prop: ".$propriedade->id."<br>";
    		$numLinhas = $propriedade->entType->name;
    		echo "Numero: ".$numLinhas."<br>";
    		//echo "nome da property ".$entity->properties->name."<br>";
    		echo "numero de propriedade: ".$propriedade->name."<br><br>";

    	}

        return view('homeFormularios', compact('custom', 'entidades', 'propriedades'));

    	//return view('homeFormularios');
    }
}
