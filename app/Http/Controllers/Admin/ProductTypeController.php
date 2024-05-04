<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//=============================================================================>> Third Party Library

//=============================================================================>> Custom Library
use App\Http\Controllers\MainController;
use App\Models\Product\Type;           // for getting Type data form database


class ProductTypeController extends Controller
{
    //
    public function create(Request $req)
    {
        // ===>> Check validation
        $this->validate(
            $req,
            [
                'name'             => 'required|max:20',
            ],
            [
                'name.required'    => 'សូមបញ្ចូលឈ្មោះម៉ាកផលិតផល',
                'name.max'         => 'ឈ្មោះម៉ាកផលិតផលមិនអាចលើសពី២០ខ្ទង់',
            ]
        );

        //==============================>> Start Adding data
        $data           =   new Type;
        $data->name     =   $req->name;
        $data->save();

        return response()->json([
            'data'          => $data,
            'message'       => 'ទិន្នន័យត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], Response::HTTP_OK);
    }

    public function update(Request $req, $id = 0)
    {
        // ===>> Check validation
        $this->validate(
            $req,
            [
                'name'             => 'required|max:20',
            ],
            [
                'name.required'    => 'សូមបញ្ចូលឈ្មោះម៉ាកផលិតផល',
                'name.max'         => 'ឈ្មោះម៉ាកផលិតផលមិនអាចលើសពី២០ខ្ទង់',
            ]
        );

        //==============================>> Start updating data
        $data           =   Type::find($id);

        if ($data) {

            $data->name     =   $req->name;
            $data->save();

            return response()->json([
                'status'        => 'ជោគជ័យ',
                'message'       => 'ប្រភេទផលិតផលត្រូវបានកែប្រែជោគជ័យ!',
                'data'          => $data,
            ], Response::HTTP_OK);

        }else {

            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ], Response::HTTP_BAD_REQUEST);

        }
    }


}
