<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntType;
use App\Property;

class PropertiesManagment extends Controller
{
    public function index() {

        //return view('propertyTypes');
        return view('propertiesOfEntities');
    }

    public function getAllPropertiesOfEntities() {

       /*$entidades = EntType::all();

    	if(count($entidades) == 0) {

    		echo "Não pode adicionar/gerir propriedades uma vez que ainda não existem tipos de entidades.<br>";
    		echo "Clique em <a href=''>Gestão de entidades</a> para criar um novo tipo de entidade.";
    	} else {

    		return view('propriedadesEntidades', compact('entidades'));

    	}*/
    	//return view('propertiesOfEntities');
    	return view('propertyTypes');
    }

    public function getAllPropertiesOfRelations() {

    	
    }
}
