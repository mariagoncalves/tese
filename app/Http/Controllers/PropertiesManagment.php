<?php

namespace App\Http\Controllers;

//Bibliotecas para usar o validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;
use App\EntType;
use App\Property;
use App\PropertyName;
use App\PropUnitType;
use App\RelType;
use Illuminate\Support\Facades\Log;

class PropertiesManagment extends Controller {

    public function index() {

        return view('property');
    }


    //MÉTODOS DAS ENTIDADES
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

    public function insertPropsEnt(Request $request) {
        try {
            $dados = $request->all();

            $propertyFieldSize = '';
            if(isset($dados["property_fieldType"])) {
                if ($dados["property_fieldType"] === "text") {
                    $propertyFieldSize = 'required|integer';
                } else if ($dados["property_fieldType"] === "textbox") {
                    $propertyFieldSize = 'required|regex:[[0-9]{2}x[0-9]{2}]';
                }
            }

            $regras = [
                'entity_type'              => ['required', 'integer'],
                'property_name'            => ['required', 'string'],
                'property_valueType'       => ['required'],
                'property_fieldType'       => ['required'],
                'property_mandatory'       => ['required'],
                'property_fieldOrder'      => ['required', 'integer', 'min:1'],
                'unites_names'             => ['integer'],
                'property_fieldSize'       => $propertyFieldSize,
                'property_state'           => ['required'],
                'reference_entity'         => ['integer']
            ];

            $erros = Validator::make($dados, $regras);
            // Verificar se existe algum erro.
            if ($erros->fails()) {
                // Se existir, então retorna os erros
                $resultado = $erros->errors()->messages();
                return response()->json(['error' => $resultado], 400);
            }

            if(!isset($dados['unites_names']) || (isset($dados['unites_names']) && $dados['unites_names'] == "0")) {
                $dados['unites_names'] = NULL;
            }

            if(!isset($dados['reference_entity']) || (isset($dados['reference_entity']) && $dados['reference_entity'] == "0")) {
                $dados['reference_entity'] = NULL;
            }

            $data = array(
                'ent_type_id'      => $dados['entity_type'             ],
                'value_type'       => $dados['property_valueType'      ],
                'form_field_type'  => $dados['property_fieldType'      ],
                'unit_type_id'     => $dados['unites_names'            ],
                'form_field_order' => $dados['property_fieldOrder'     ],
                'form_field_size'  => $dados['property_fieldSize'      ],
                'mandatory'        => $dados['property_mandatory'      ],
                'state'            => $dados['property_state'          ],
                'fk_ent_type_id'   => $dados['reference_entity'        ]
            );

            $newProp   = Property::create($data);
            // pegar o id da nova propriedade inserida
            $idNewProp = $newProp->id;

            //Criar o form_field_name
            //Obter o nome da relação onde a propriedade vai ser inserida
            $entidade     = EntType::find($dados['entity_type']);
            $nomeEntidade = $entidade->entTypeNames->first()->name;
            $ent          = substr($nomeEntidade, 0 , 3);
            $traco        = '-';
            $nomeField    = preg_replace('/[^a-z0-9_ ]/i', '', $dados['property_name']);
            // Substituimos todos pos espaços por underscore
            $nomeField       = str_replace(' ', '_', $nomeField);
            $form_field_name = $ent.$traco.$dados['entity_type'].$traco.$nomeField;


            // inserir o nome da propriedade e o nome do campo form_field_name
            $dados = [
                'property_id'     => $idNewProp,
                'language_id'     => 1,
                'name'            => $dados['property_name'],
                'form_field_name' => $form_field_name
            ];
            PropertyName::create($dados);

            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro. Tente mais tarde.'], 500);
        }

    }


    //MÉTODOS DAS RELAÇÕES
    public function getAllPropertiesOfRelations() {

        return view('propertiesOfRelations');
    }

    public function getAllRel($id = null) {
        $language_id = '1';

        $relacoes = RelType::with('properties.propertiesNames')
                            ->with(['relTypeNames' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['properties.units.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->paginate(5);

        return response()->json($relacoes);
    }


    public function insertPropsRel(Request $request) {

        try {
            $dados = $request->all();

            $propertyFieldSize = '';
            if(isset($dados["property_fieldType"])) {
                if ($dados["property_fieldType"] === "text") {
                    $propertyFieldSize = 'required|integer';
                } else if ($dados["property_fieldType"] === "textbox") {
                    $propertyFieldSize = 'required|regex:[[0-9]{2}x[0-9]{2}]';
                }
            }

            $regras = [
                'relation_type'           => ['required', 'integer'],
                'property_name_rel'       => ['required', 'string'],
                'property_valueType_rel'  => ['required'],
                'property_fieldType_rel'  => ['required'],
                'property_mandatory_rel'  => ['required'],
                'property_fieldOrder_rel' => ['required', 'integer', 'min:1'],
                'units_name'              => ['integer'],
                'property_fieldSize_rel'  => $propertyFieldSize,
                'property_state_rel'      => ['required'],
            ];


            $erros = Validator::make($dados, $regras);
            // Verificar se existe algum erro.
            if ($erros->fails()) {
                // Se existir, então retorna os erros
                $resultado = $erros->errors()->messages();
                return response()->json(['error' => $resultado], 400);
            }

            if(!isset($dados['units_name']) || (isset($dados['units_name']) && $dados['units_name'] == "0")) {
                $dados['units_name'] = NULL;
            }

            $data = array(
                'rel_type_id'      => $dados['relation_type'          ],
                'value_type'       => $dados['property_valueType_rel' ],
                'form_field_type'  => $dados['property_fieldType_rel' ],
                'unit_type_id'     => $dados['units_name'             ],
                'form_field_order' => $dados['property_fieldOrder_rel'],
                'form_field_size'  => $dados['property_fieldSize_rel' ],
                'mandatory'        => $dados['property_mandatory_rel' ],
                'state'            => $dados['property_state_rel'     ]
            );

            $newProp   = Property::create($data);
            // pegar o id da nova propriedade inserida
            $idNewProp = $newProp->id;

            //Criar o form_field_name
            //Obter o nome da relação onde a propriedade vai ser inserida
            $relation    = RelType::find($dados['relation_type']);
            $relationName = $relation->relTypeNames->first()->name;
            $rel          = substr($relationName, 0 , 3);
            $traco        = '-';
            $nomeField    = preg_replace('/[^a-z0-9_ ]/i', '', $dados['property_name_rel']);
            // Substituimos todos pos espaços por underscore
            $nomeField       = str_replace(' ', '_', $nomeField);
            $form_field_name = $rel.$traco.$dados['relation_type'].$traco.$nomeField;


            // inserir o nome da propriedade e o nome do campo form_field_name
            $dados = [
                'property_id'     => $idNewProp,
                'language_id'     => 1,
                'name'            => $dados['property_name_rel'],
                'form_field_name' => $form_field_name
            ];
            PropertyName::create($dados);

            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro. Tente mais tarde.'], 500);
        }

    }

    //Métodos comuns
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
}
