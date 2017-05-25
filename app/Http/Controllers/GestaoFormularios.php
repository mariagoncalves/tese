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
    }

    public function editar($id) {

        $customforms = CustomForm::all();
        $custom = CustomForm::find($id);
        $entidades = EntType::all();
        $propriedades = Property::all();
        $unidades = PropUnitType::all();

        return view('editarForm', compact('customforms', 'custom', 'entidades', 'propriedades', 'unidades'));

    }

    /*public function update($Request $req, $id) {

        $escolher = $req->input('idProp');
        $ordem = $req->input('ordem');
        $obrigatorio = $req->input('obrigatorio');

        DB::table('custom_form_has_prop')
                ->where('id', $id)
                ->update(['name' => $name]);

        //return view('homeUnidades', compact('unidades', 'unidade'));
        return redirect('/unidades');

    }*/

    public function desativar($id) {

        $custom = CustomForm::find($id);
        $custom->state = 'inactive';
        $custom->save();

        return redirect('/formularios');

    }

    public function ativar($id) {

        $custom = CustomForm::find($id);
        $custom->state = 'active';
        $custom->save();

        return redirect('/formularios');

    }

    public function inserir(Request $req) {

        $name = $req->input('name');

        //Também podia ser assim para ir buscar todos os campos
        //$dados = $req->all();
        $data = array('name'=>$name);

        DB::table('prop_unit_type')->insert($data);
        return redirect('/unidades');

    }

}
