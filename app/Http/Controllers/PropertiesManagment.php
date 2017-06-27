<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntType;
use App\Property;
use App\PropertyName;
use App\PropUnitType;
use App\RelType;

class PropertiesManagment extends Controller {

    public function index() {

        return view('property'); 
    }

    public function getAllPropertiesOfEntities() {

    	return view('propertiesOfEntities');
    }

    public function getAllEnt($id = null) {
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

    public function getUnits() {

        $language_id = '1';

        $units = PropUnitType::with(['unitsNames' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);

                            }])->get();

        return response()->json($units);
    }

    //MÉTODOS DAS RELAÇÕES
    public function getAllPropertiesOfRelations() {

        return view('propertiesOfRelations');
    }

    public function getAllRel($id = null) {
        $language_id = '1';

        $relations = RelType::with('properties.propertiesNames')
                            ->with(['relTypeNames' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['properties.units.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->paginate(5);

        return response()->json($relations); 
    }


    public function insertPropsRel(Request $request) {

        $property = new Property;
        $property_name = new PropertyName;

        DB::beginTransaction();

        try {

            $property->rel_type_id      = $request->input('relation');
            $property->value_type       = $request->input('property_valueType');
            $property->form_field_type  = $request->input('property_fieldType');
            $property->unit_type_id     = $request->input('units');
            $property->form_field_order = $request->input('property_fieldOrder');
            $property->mandatory        = $request->input('property_mandatory');
            $property->state            = $request->input('property_state');
            //$property->fk_ent_type_id   = $request->input(''); //não tem nas relações
            $property->form_field_size  = $request->input('property_fieldSize');
            $property->save();

            $property_name->name = $request->input('property_name');
            $property_name->property_id = $property->id;
            $property_name->language_id = 1;
            //$property_name->form_field_name = $request->input('property_name');
            $property_name->save();
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

    }
}
