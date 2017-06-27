<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntType;
use App\Property;

class PropertiesManagment extends Controller {

    public function index() {

        return view('property'); 
    }

    public function getAllPropertiesOfEntities() {

    	return view('propertiesOfEntities');
    }

    public function getAll($id = null) {
        $language_id = '1';

    	$entidades = EntType::with('properties.propertiesNames')
                            ->with(['entTypeNames' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['properties.units.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->paginate(5);

        return response()->json($entidades); 

    }

    public function getStates() {
        $states = Property::getValoresEnum('state');
        return response()->json($states); 
    }

    public function getValueTypes() {
        $valueTypes = Property::getValoresEnum('value_type');
        return response()->json($valueTypes); 
    }

    public function getFieldTypes() {
        $fieldTypes = Property::getValoresEnum('form_field_type');
        return response()->json($fieldTypes); 
    }

    //CORRIGIR
    public function getMandatory() {
        $mandatory = Property::all();
        return response()->json($mandatory); 
    }

    public function getUnits() {
        $language_id = '1';

        $units = PropUnitType::with(['unitsNames' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }]);

        return response()->json($units); 

    }

    
}
