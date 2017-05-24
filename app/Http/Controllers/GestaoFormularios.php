<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomForm;
use App\EntType;
use App\Property;
use App\PropUnitType;

class GestaoFormularios extends Controller
{
    public function show() {

    	//CustomForm : nome do modelo
    	$custom = CustomForm::all();
    	$entidades = EntType::all();
    	$propriedades = Property::all();
    	$unidades = PropUnitType::all();

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

    	/*foreach ($propriedades as $propriedade) {
    		echo "Nome do prop: ".$propriedade->name."<br>";
    		echo "ID do prop: ".$propriedade->id."<br>";
    		//$numLinhas = $propriedade->entType->name;
    		//echo "Numero: ".$numLinhas."<br>";
    		//echo "nome da property ".$entity->properties->name."<br>";
    		//echo "numero de propriedade: ".$propriedade->name."<br><br>";
            echo "Unidades das propriedades: ".$propriedade->units."<br><br><br>";
    	}
    	

    	foreach ($unidades as $unidade) {
    		echo "Nome do unidade: ".$unidade->name."<br>";
    		echo "ID do unidades: ".$unidade->id."<br>";
    		$unidadesPropriedades= $unidade->properties;
    		echo "Numero: ".$unidadesPropriedades."<br>";
    		//echo "nome da property ".$entity->properties->name."<br>";
    		echo "numero de propriedade: ".$propriedade->units."<br><br>";
    	}*/

        return view('homeFormularios', compact('custom', 'entidades', 'propriedades', 'unidades'));

    	//return view('homeFormularios');
    }

    public function editar($id) {

        $customforms = CustomForm::all();
        $custom = CustomForm::find($id);
        $entidades = EntType::all();
        $propriedades = Property::all();
        $unidades = PropUnitType::all();

        return view('editarForm', compact('customforms', 'custom', 'entidades', 'propriedades', 'unidades'));

    }

    public function desativar(CustomForm $custom, $id) {

        $customforms = CustomForm::all();
        $custom = CustomForm::find($id);
        
        CustomForm::table('custom_form')
            ->where('id', $id)
            ->update(['state' => 'inactive']);

        return redirect('/formularios');

    }
}
