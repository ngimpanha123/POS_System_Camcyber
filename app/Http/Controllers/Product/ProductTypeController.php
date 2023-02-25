<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Type;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function listing()
    {
        $data = Type::select('id', 'name')
            ->withCount(['products as n_of_products'])
            ->orderBy('name', 'ASC')
            ->get();
        return $data;
    }
    public function create(Request $req)
    {
        //==============================>> Check validation
        $this->validate(
            $req,
            [

                'name'             => 'required|max:20',
            ],
            [
                'name.required'    => 'Please enter the name.',
                'name.max'         => 'Total cannot be more than 20 characters.',
            ]
        );

        //==============================>> Start Adding data

        $product_type               =   new Type;
        $product_type->name         =   $req->name;

        $product_type->save();

        return response()->json([
            'product_type' => $product_type,
            'message' => 'ទិន្នន័យត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], 200);
    }
    public function update(Request $req, $id = 0)
    {
        //==============================>> Check validation
        $this->validate(
            $req,
            [

                'name'             =>  'required|max:20',

            ],
            [
                'name.required' => 'Please enter the name.',
                'name.max' => 'Name cannot be more than 20 characters.',
            ]
        );

        //==============================>> Start Updating data
        $product_type                         = Type::find($id);
        if ($product_type) {

            $product_type->name              = $req->input('name');
            $product_type->save();

            return response()->json([
                'status' => 'success',
                'message' => 'ប្រភេទផលិតផលត្រូវបានកែប្រែជោគជ័យ!',
                'product_type' => $product_type,
            ], 200);
        } else {

            return response()->json([
                'message' => 'ទិន្នន័យមិនត្រឹមត្រូវ។',
            ], 400);
        }
    }
    public function delete($id = 0)
    {
        $data = Type::find($id);

        //==============================>> Start deleting data
        if($data){

            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'ទិន្នន័យត្រូវបានលុប',
                'type'    => $data
            ], 200);

        }else{

            return response()->json([
                'message' => 'ទិន្នន័យមិនត្រឹមត្រូវ។',
            ], 400);

        }
    }
}
