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
use App\RelType;
use App\PropUnitType;
use App\PropUnitTypeName;
use DB;


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

    public function editarEntidade($id) {

        $propriedades = Property::all();
        $propriedade = Property::find($id);
        $unidades = PropUnitType::all();
        $entidades = EntType::all();


        $values_type_enum = Property::getValoresEnum('value_type');
        $form_field_types = Property::getValoresEnum('form_field_type');

    	return view('editaPropsEnt', compact ('propriedade', 'propriedades', 'values_type_enum', 'form_field_types', 'unidades', 'entidades'));
    }

    public function ativarRelacao($id) {

        $propriedades = Property::find($id);
        $propriedades->state = 'active';
        $propriedades->save();

        return redirect('/propriedades/relacao');
    }

     public function desativarRelacao($id) {

        $propriedades = Property::find($id);
        $propriedades->state = 'inactive';
        $propriedades->save();

        return redirect('/propriedades/relacao');
    }

     public function editarRelacao($id) {

        //$propriedades = Property::all();
        $propriedade = Property::find($id);
        $unidades = PropUnitType::all();

        $values_type_enum = Property::getValoresEnum('value_type');
        $form_field_types = Property::getValoresEnum('form_field_type');

        return view('editaPropsRel', compact ('propriedade', 'propriedades', 'values_type_enum', 'form_field_types', 'unidades', 'entidades'));
    }

    public function updateEntidade(Request $req, $id) {

        $rules = ['nome_{{$propriedade->id}}' => ['required', 'string' , Rule::unique('property_name' , 'name')->where('language_id', '1')],
                'tipoValor_{{ $propriedade->id}}' => ['required'],
                'tipoCampo_{{ $propriedade->id}}' => ['required'],


        ];

        $errors = Validator::make($req->all(), $rules);

        if ($errors->fails()) {

        }

        $propriedade = Property::find($id);

        $name = $req->input('nome_'.$propriedade->id);
        $tipoValor = $req->input('tipoValor_'.$propriedade->id);
        $tipoCampo = $req->input('tipoCampo_'.$propriedade->id);
        $tipoUnidade = $req->input('tipoUnidade_'.$propriedade->id);
        $ordem = $req->input('ordem_'.$propriedade->id);
        $tamanho = $req->input('tamanho_'.$propriedade->id);
        $obrigatorio = $req->input('obrigatorio_'.$propriedade->id);
        $entidadeReferenciada = $req->input('entidadeReferenciada_'.$propriedade->id);

        DB::table('property')
                ->where('id', $id)
                ->update([
                    'name'             => $name,
                    'value_type'       => $tipoValor,
                    'form_field_type'  => $tipoCampo,
                    'unit_type_id'     => $tipoUnidade,
                    'form_field_order' => $ordem,
                    'form_field_size'  => $tamanho,
                    'mandatory'        => $obrigatorio,
                    'fk_ent_type_id'   => $entidadeReferenciada
                    ]);

        return redirect('/propriedades/entidade');
    }

    public function updateRelacao(Request $req, $id) {

        $propriedade = Property::find($id);

        $name = $req->input('nome_'.$propriedade->id);
        $tipoValor = $req->input('tipoValor_'.$propriedade->id);
        $tipoCampo = $req->input('tipoCampo_'.$propriedade->id);
        $tipoUnidade = $req->input('tipoUnidade_'.$propriedade->id);
        $ordem = $req->input('ordem_'.$propriedade->id);
        $tamanho = $req->input('tamanho_'.$propriedade->id);
        $obrigatorio = $req->input('obrigatorio_'.$propriedade->id);
        $entidadeReferenciada = $req->input('entidadeReferenciada_'.$propriedade->id);

        DB::table('property')
                ->where('id', $id)
                ->update([
                    'name'             => $name,
                    'value_type'       => $tipoValor,
                    'form_field_type'  => $tipoCampo,
                    'unit_type_id'     => $tipoUnidade,
                    'form_field_order' => $ordem,
                    'form_field_size'  => $tamanho,
                    'mandatory'        => $obrigatorio
                    ]);

        return redirect('/propriedades/relacao');
    }

    public function introducaoPropsEnt($id) {

        //$entidade = PropUnitType::all();

        $values_type_enum = Property::getValoresEnum('value_type');
        $form_field_types = Property::getValoresEnum('form_field_type');
        $entidade = EntType::find($id);
        $entidades = EntType::all();
        $unidades = PropUnitType::all();

        return view('introducaoPropriedadesEntidade', compact('entidade', 'values_type_enum', 'form_field_types', 'unidades', 'entidades'));
    }


    public function inserirPropsEnt(Request $req, $id) {

        $name = $req->input('nome');
        $ent_type_id = $id;
        $tipoValor = $req->input('tipoValor');
        $tipoCampo = $req->input('tipoCampo');
        $tipoUnidade = $req->input('tipoUnidade');
        $ordem = $req->input('ordem');
        $tamanho = $req->input('tamanho');
        $obrigatorio = $req->input('obrigatorio');
        $entidadeReferenciada = $req->input('entidadeReferenciada');
        

        $data = array('name'           => $name,
                    'ent_type_id'      => $ent_type_id,
                    'value_type'       => $tipoValor,
                    'form_field_type'  => $tipoCampo,
                    'unit_type_id'     => $tipoUnidade,
                    'form_field_order' => $ordem,
                    'form_field_size'  => $tamanho,
                    'mandatory'        => $obrigatorio,
                    'fk_ent_type_id'   => $entidadeReferenciada
            );

        DB::table('property')->insert($data);
        return redirect('/propriedades/entidade');
    }

    public function introducaoPropsRel($id) {

        //$entidade = PropUnitType::all();

        $values_type_enum = Property::getValoresEnum('value_type');
        $form_field_types = Property::getValoresEnum('form_field_type');
        $relacao = RelType::find($id);
        $relacoes = RelType::all();
        $unidades = PropUnitType::all();

        return view('introducaoPropsRel', compact('relacao', 'values_type_enum', 'form_field_types', 'unidades', 'relacoes'));
    }

    public function inserirPropsRel(Request $req, $id) {

        $name = $req->input('nome');
        $rel_type_id = $id;
        $tipoValor = $req->input('tipoValor');
        $tipoCampo = $req->input('tipoCampo');
        $tipoUnidade = $req->input('tipoUnidade');
        $ordem = $req->input('ordem');
        $tamanho = $req->input('tamanho');
        $obrigatorio = $req->input('obrigatorio');

        echo "O nome inserido foi: ".$name." e o id é: ".$rel_type_id."e o tipo de valor: ".$tipoValor."<br>";

        $data = array('rel_type_id'     => $rel_type_id,
                    'value_type'       => $tipoValor,
                    'form_field_type'  => $tipoCampo,
                    'unit_type_id'     => $tipoUnidade,
                    'form_field_order' => $ordem,
                    'form_field_size'  => $tamanho,
                    'mandatory'        => $obrigatorio
            );

        $prop = Property::create($data);
        // pegar o id da nova propriedade inserida
        $id = $prop->id;

        // inserir o nome da propriedade
        $dados = ['property_id' => $id, 'language_id' => 1, 'name' => $name];
        PropertyName::create($dados);

        //DB::table('property')->insert($data);
        return redirect('/propriedades/relacao');
    }
}
