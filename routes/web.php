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

//Rota que quando for digitado no url http://localhost:8000/formulários, vai chamar o controlador GestaoFormularios e vai para o método index. 
Route::get('/formularios', 'GestaoFormularios@show');
Route::get('/editar/{id}', 'GestaoFormularios@editar');
Route::get('/desativar/{id}', 'GestaoFormularios@desativar');