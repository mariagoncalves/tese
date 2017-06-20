<?php

namespace App\Http\Controllers;

use App\EntType;
use App\TransactionType;
use App\TState;
use App\EntTypeName;
use Illuminate\Http\Request;
use DB;
use Response;

class EntTypes extends Controller
{
    //
    public function getAll($id = null)
    {
        if ($id == null)
        {
            $url_text = 'PT';
            $ents = EntType::with(['language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }, 'transactionsType.language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }, 'tStates.language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }, 'entType.language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }])->whereHas('language', function ($query) use ($url_text){
                return $query->where('slug', $url_text);
            })->paginate(5);

            return response()->json($ents);
        }
        else
        {
            return $this->getSpec($id);
        }
    }

    public function index()
    {
        return view('entTypes');
    }

    public function insert(Request $request)
    {
        $entitytype = new EntType;
        $entitytypename = new EntTypeName;

        DB::beginTransaction();
        try {
            $entitytype->state = $request->input('state');
            $entitytype->transaction_type_id = $request->input('transaction_type_id');

            if ($request->input('ent_type_id') != "")
            {
                $entitytype->ent_type_id = $request->input('ent_type_id');
            }

            $entitytype->t_state_id = $request->input('t_state_id');
            $entitytype->save();

            $entitytypename->name = $request->input('name');
            $entitytypename->language_id = $request->input('language_id');
            $entitytypename->ent_type_id = $entitytype->id;
            $entitytypename->save();

            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        $returnData = array(
            'message' => 'An error occurred!'
        );

        if ($success) {
            return Response::json(null,200);
        }
        else
        {
            return Response::json($returnData, 400);
        }
    }

    public function update(Request $request, $id)
    {

    }

    public function getSpec($id)
    {
        $url_text = 'PT';
        $ents = EntType::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }, 'transactionsType.language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }, 'tStates.language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }, 'entType.language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text);
        })->find($id);

        return response()->json($ents);
    }

    public function getAllTransactionTypes()
    {
        $url_text = 'PT';
        $transactiontypes = TransactionType::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text)->orderBy('transaction_type_name.t_name','asc');
        })->get();

        return response()->json($transactiontypes);
    }

    public function getAllTStates()
    {
        $url_text = 'PT';
        $tstates = TState::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text)->orderBy('t_state_name.name','asc');
        })->get();

        return response()->json($tstates);
    }

    public function getAllEntTypes()
    {
        $url_text = 'PT';
        $enttypes = EntType::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text)->orderBy('ent_type_name.name','asc');
        })->get();

        return response()->json($enttypes);
    }
}
