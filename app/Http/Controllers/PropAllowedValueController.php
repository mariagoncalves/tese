<?php namespace App\Http\Controllers;

use App\EntType;
use App\Property;
use App\PropAllowedValueName;
use App\PropAllowedValue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Http\Request;

class PropAllowedValueController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('propAllowedValue');
	}

    public function getAll($id = null)
    {
        if ($id == null)
        {
            $url_text = 'PT';

            $prop_allowed_value = EntType::with(['language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }, 'properties.language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }, 'properties.propAllowedValues.language' => function($query) use ($url_text) {
                $query->where('slug', $url_text);
            }])->whereHas('language', function ($query) use ($url_text){
                return $query->where('slug', $url_text);
            })->paginate(5);

            return response()->json($prop_allowed_value);
        }
        else
        {
            return $this->getSpec($id);
        }
    }

    public function getSpec($id)
    {
        $url_text = 'PT';

        $prop_allowed_value = PropAllowedValue::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text);
        })->find($id);


        return response()->json($prop_allowed_value);
    }

    public function insert(Request $request)
    {
        $prop_allowed_value = new PropAllowedValue;
        $prop_allowed_value_name = new PropAllowedValueName;

        DB::beginTransaction();

        try {
            $prop_allowed_value->state = $request->input('state');
            $prop_allowed_value->property_id = $request->input('property_id');
            $prop_allowed_value->save();

            $prop_allowed_value_name->name = $request->input('name');
            $prop_allowed_value_name->prop_allowed_value_id = $prop_allowed_value->id;
            $prop_allowed_value_name->language_id = 1;
            $prop_allowed_value_name->save();
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
    }



    public function getProp()
    {
        $url_text = 'PT';

        $property = Property::with(['language' => function($query) use ($url_text) {
            $query->where('slug', $url_text);
        }])->whereHas('language', function ($query) use ($url_text){
            return $query->where('slug', $url_text);
        })->get();

        return response()->json($property);
    }

    public function update(Request $request, $id)
    {
        $query = ['prop_allowed_value_id' => $id, 'language_id' => 1];
        $prop_allowed_value_name = PropAllowedValueName::where($query);
        $prop_allowed_value = PropAllowedValue::find($id);

        $prop_allowed_value_name->update([
            'name' => $request->input('name')
        ]);
        $prop_allowed_value->update([
            'state' => $request->input('state')
        ]);;
    }
}
