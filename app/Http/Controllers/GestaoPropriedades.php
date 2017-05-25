<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntType;
use App\Property;
use App\RelType;

class GestaoPropriedades extends Controller
{
    public function show() {

    	return view('homePropriedades');
    }

    public function entidade() {

    	$entidades = EntType::all();

    	if(count($entidades) == 0) {

    		echo "Não pode adicionar/gerir propriedades uma vez que ainda não existem tipos de entidades.<br>";
    		echo "Clique em <a href=''>Gestão de entidades</a> para criar um novo tipo de entidade.";
    	} else {
    		
    		/*foreach ($entidades as $entidade) {
    			$name = $entidade->name;
    			$id = $entidade->id;
    			$propriedadesEntidade = $entidade->properties;

    			$props = Property::all();

    			foreach($props as $prop) {

    				$propsdasents = $prop->entType;

    				echo $propsdasents."<br><br><br><br>";
    			}

    			echo "O nome da entidade é: ".$name." e o seu ID é: ".$id." e as suas propriedades são: ".$propriedadesEntidade."<br>";
    		}*/

    		//$props = Property::all();

    		return view('propriedadesEntidades', compact('entidades'));

    	}
    }

    public function relacao() {

    	$relacoes = RelType::all();

    	if(count($relacoes) == 0) {

    		echo "Não pode adicionar/gerir propriedades uma vez que ainda não existem tipos de relações.<br>";
    		echo "Clique em <a href=''>Gestão de relações</a> para criar um novo tipo de relação.";
    	} else {

    		return view('propriedadesRelacoes', compact('relacoes'));
    	}
    }

    public function ativarEntidade($id) {

    	$propriedades = Property::find($id);
        $propriedades->state = 'active';
        $propriedades->save();

        return redirect('/propriedades/entidade');
    }

    public function desativarEntidade($id) {

    	$propriedades = Property::find($id);
        $propriedades->state = 'inactive';
        $propriedades->save();

        return redirect('/propriedades/entidade');
    }

    public function editar($id) {

    	return view('editaProps');
    }

    public function introducao($id) {

		return view('introduzirProps');
    }
}
