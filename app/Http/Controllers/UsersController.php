<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() {

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

    return view('admin.users.index', compact('users'));
    }

    public function create () {

    	return view('admin.users.create');
    }

      public function store (Request $request) {

    	User::create($request->all());
    	return 'sucess';
    	return $request->all();
    }

}
