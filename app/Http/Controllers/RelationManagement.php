<?php

namespace App\Http\Controllers;

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
                            ->with(['ent1' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->with(['ent2' => function($query) use ($language_id) {
                                $query->where('language_id', $language_id);
                            }])
                            ->paginate(2);

        return response()->json($rels);
    }

}
