<?php

namespace App\Http\Controllers;

//Bibliotecas para usar o validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

use App\RelType;
use App\EntTypeName;
use App\TransactionTypeName;
use App\TStateName;
use Illuminate\Http\Request;

class RelationManagement extends Controller
{
    public function index() {

        return view('relTypes');
    }

    public function getAllRels() {

        $language_id = '1';

        $rels = RelType::with(['language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['ent1.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['ent2.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['properties.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['transactionsType.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['tStates.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['tStates.language' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->paginate(5);

        return response()->json($rels);
    }

    public function getStates() {

        $states = RelType::getValoresEnum('state');
        return response()->json($states);
    }

    public function getEntities() {

        $entities = EntTypeName::all();

        return response()->json($entities);
    }

    public function getTransactionTypes() {

        $transactionTypes = TransactionTypeName::all();

        return response()->json($transactionTypes);
    }

    public function getTransactionStates() {

        $transactionStates = TStateName::all();

        return response()->json($transactionStates);
    }

    public function insertRelations() {

       /*try {
            $data = $request->all();

            $rules = [
                'relation_name'     => ['required', 'string'],
                'entity_type1'      => ['required', 'integer'],
                'entity_type2'      => ['required', 'integer'],
                'transactionsType'  => ['required', 'integer'],
                'transactionsState' => ['required', 'integer'],
                'relation_state'    => ['required']
            ];

            $err = Validator::make($data, $rules);
            // Verificar se existe algum erro.
            if ($err->fails()) {
                // Se existir, então retorna os erros
                $result = $err->errors()->messages();
                return response()->json(['error' => $result], 400);
            }

            //Buscar o nr de propriedades de uma relação, porque o form_field_order vai ser o nr de props que tem +1
            $countPropEnt = Property::where('ent_type_id', '=', $data['entity_type'])->count();

            $data1 = array(
                'ent_type_id'      => $data['entity_type'             ],
                'value_type'       => $data['property_valueType'      ],
                'form_field_type'  => $data['property_fieldType'      ],
                'unit_type_id'     => $data['unites_names'            ],
                //'form_field_order' => $data['property_fieldOrder'     ],
                'form_field_order' => $countPropEnt + 1,
                'form_field_size'  => $data['property_fieldSize'      ],
                'mandatory'        => $data['property_mandatory'      ],
                'state'            => $data['property_state'          ],
                'fk_ent_type_id'   => $data['reference_entity'        ]
            );

            $newProp   = Property::create($data1);
            // pegar o id da nova propriedade inserida
            $idNewProp = $newProp->id;

            // inserir o nome da propriedade e o nome do campo form_field_name
            $data = [
                'property_id'     => $idNewProp,
                'language_id'     => 1,
                'name'            => $data['property_name'],
                'form_field_name' => $form_field_name
            ];
            PropertyName::create($data);

            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred. Try later.'], 500);
        }*/
        return response()->json([]);
    }

}
