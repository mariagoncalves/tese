<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Criar uma nova
/*Route::get('users', function () {

	$users = [
		'0' => [
			'first_name' => 'Maria',
			'last_name' => 'Olim',
			'location' => 'Madeira'
		],
		'1' => [
			'first_name' => 'Jessica',
			'last_name' => 'Alba',
			'location' => 'USA'
		]
	];

    return $users;
});*/

Route::get('users', ['uses' => 'UsersController@index']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);


//Route::get('formularios', ['uses' => 'GestaoFormularios@index']);
/*Route::get('/formularios', function () {
    return view('homeFormularios');
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@dash');

//Rota que quando for digitado no url http://localhost:8000/formulários, vai chamar o controlador GestaoFormularios e vai para o método index. 
Route::get('/formularios', 'GestaoFormularios@show');
Route::get('/formularios/editar/{id}', 'GestaoFormularios@editar');
Route::get('/formularios/desativar/{id}', 'GestaoFormularios@desativar');
Route::get('/formularios/ativar/{id}', 'GestaoFormularios@ativar');
Route::post('/formularios/update/{id}', 'GestaoFormularios@update');


Route::get('/unidades', 'GestaoUnidades@show');
Route::post('/unidades/inserir', 'GestaoUnidades@inserir');
Route::get('/unidades/editar/{id}', 'GestaoUnidades@editar');
Route::post('/unidades/update/{id}', 'GestaoUnidades@update');
Route::get('/unidades/ativar/{id}', 'GestaoUnidades@ativar');
Route::get('/unidades/desativar/{id}', 'GestaoUnidades@desativar');


Route::get('/propriedades', 'GestaoPropriedades@show');


Route::get('/propriedades/entidade', 'GestaoPropriedades@entidade');
Route::get('/propriedades/entidade/desativar/{id}', 'GestaoPropriedades@desativarEntidade');
Route::get('/propriedades/entidade/ativar/{id}', 'GestaoPropriedades@ativarEntidade');
Route::get('/propriedades/entidade/editar/{id}', 'GestaoPropriedades@editarEntidade');
Route::post('/propriedades/entidade/updateEntidade/{id}', 'GestaoPropriedades@updateEntidade');
Route::get('/propriedades/entidade/introducaoEntidades/{id}', 'GestaoPropriedades@introducaoPropsEnt');
Route::post('/propriedades/entidade/inserirPropsEnt/{id}', 'GestaoPropriedades@inserirPropsEnt');



Route::get('/propriedades/relacao', 'GestaoPropriedades@relacao');
Route::get('/propriedades/relacao/desativar/{id}', 'GestaoPropriedades@desativarRelacao');
Route::get('/propriedades/relacao/ativar/{id}', 'GestaoPropriedades@ativarRelacao');
Route::get('/propriedades/relacao/editar/{id}', 'GestaoPropriedades@editarRelacao');
Route::post('/propriedades/relacao/updateRelacao/{id}', 'GestaoPropriedades@updateRelacao');
Route::get('/propriedades/relacao/introducaoRelacoes/{id}', 'GestaoPropriedades@introducaoPropsRel');
Route::post('/propriedades/relacao/inserirPropsRel/{id}', 'GestaoPropriedades@inserirPropsRel');


//Tipo entidades
Route::get('/entityTypesManage', 'EntTypes@index');
Route::get('/ents_types/get_ents_types/{id?}','EntTypes@getAll');
Route::post('/Entity_Type', 'EntTypes@insert');
Route::get('/ents_types/get_enttypes', 'EntTypes@getAllEntTypes');
Route::get('/ents_types/get_transacs_types', 'EntTypes@getAllTransactionTypes');
Route::get('/ents_types/get_tstates', 'EntTypes@getAllTStates');



//Prop_unit_type
Route::get('/propUnitTypeManage/', 'PropUnitTypes@index');
Route::get('/prop_unit_types/get_unit', 'PropUnitTypes@getAll');
Route::get('/prop_unit_types/get_unit/{id?}', 'PropUnitTypes@getAll');

Route::post('/Prop_Unit_Type', 'PropUnitTypes@insert');
Route::post('/Prop_Unit_Type/{id?}', 'PropUnitTypes@update');


//Properties Home Page
Route::get('/propertiesManage/', 'PropertiesManagment@index');

//Properties Of Entities
Route::get('/propertiesManage/entity', 'PropertiesManagment@getAllPropertiesOfEntities');
//Route::get('/propertiesManage/entity', 'EntTypes@insert');
Route::get('/properties/get_props_ents', 'PropertiesManagment@getAllEnt');

Route::get('/properties/states', 'PropertiesManagment@getStates');
Route::get('/properties/valueTypes', 'PropertiesManagment@getValueTypes');
Route::get('/properties/fieldTypes', 'PropertiesManagment@getFieldTypes');
Route::get('/properties/units', 'PropertiesManagment@getUnits');






//Properties Of Relations
Route::get('/propertiesManage/relation', 'PropertiesManagment@getAllPropertiesOfRelations');
Route::get('/properties/get_props_rel', 'PropertiesManagment@getAllRel');


Route::post('/PropertyRel', 'PropertiesManagment@insertPropsRel');