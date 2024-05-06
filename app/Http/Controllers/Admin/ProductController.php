<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ============================================================================>> Third Party Library កខគឃង
use Carbon\Carbon; // Data Time format & Calculation

// ============================================================================>> Custome Library
// Controller
use App\Http\Controllers\MainController;

// Service
use App\Services\FileUpload; // Upload Image/File to File Micro Serivce

// Model
use App\Models\Product\Product;


class ProductController extends Controller
{
    //
    public function getData(Request $request){
        
        //declare variable
        $data = Product::select('*')->with(['type']);

        if($request->key && $request->Key != ''){

            $data = $data->where('code', 'LIKE', '%' . $request->Key . '%')->OrWhere('name', 'LIKE', '%' . $request->Key .'%');

        }

        if($request->type && $request->type != 0){

            $data = $data->where('type_id', $request->type);
        }

        $data = $data->orderBy('id','desc')->paginate($request->limit ? $request->limit :10,'per_page');

        return response()->json($data,Response::HTTP_OK);

    }

    public function createData(Request $request){

        //check validation
        $this->validate(
            $request,
            [
                'name'              => 'required|max:50',
                'code'              => 'required|max:20',
                'unit_price'        => 'required|numeric',
                'type_id'           => 'required|exists:products_type,id'
            ],

            [
                'name.required'       =>'សូមបញ្ចូលឈ្មោះផលិតផល',
                'name.max'            => 'ឈ្មោះផលិតផលមិនអាចលើសពី៥០ខ្ទង់',

                'code.required'       => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផល',
                'code.max'              => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផលមិនអាចលើសពី២០ខ្ទង់',

                'unit_price.required'   => 'សូមបញ្ចូលតម្លៃរាយ',
                'unit_price.numeric'    => 'សូមបញ្ចូលតម្លៃរាយជាលេខ',

                'type_id.exists'        => 'សូមជ្រើសរើសឈ្មោះផលិតផល អោយបានត្រឹមត្រូវ កុំបោកពេក'
            ],

        );
        $product                =   new Product;
        $product->name          =   $request->name;
        $product->code          =   $request->code;
        $product->type_id       =   $request->type_id;
        $product->unit_price    =   $request->unit_price;

            // ===>> Save To DB
        $product->save();

        // ===>> Image Upload
        if ($request->image) {

            // Need to create folder before storing images
            $folder = Carbon::today()->format('d-m-y');

            // ===>> Send to File Service
            $image  = FileUpload::uploadFile($request->image, 'products', $request->fileName);

            // ===>> Check if image has been successfully uploaded
            if ($image['url']) {

                // Map field of table in DB Vs. uri from File Service
                $product->image     = $image['url'];

                // ===>> Save to DB
                $product->save();

            }
        }
        // ===> Success Response Back to Client
        return response()->json([
            'data'      =>  Product::select('*')->with(['type'])->find($product->id),
            'message'   => 'ផលិតផលត្រូវបានបង្កើតដោយជោគជ័យ។'
        ],Response::HTTP_OK);
    }

    public function update(Request $req, $id = 0){

        // ===>> Check validation
        $this->validate(
            $req,
            [
                'name'              => 'required|max:20',
                'code'              => 'required|max:20',
                'unit_price'        => 'required',
                'type_id'           => 'required|exists:products_type,id'
            ],
            [
                'name.required'         => 'សូមបញ្ចូលឈ្មោះផលិតផល',
                'name.max'              => 'ឈ្មោះផលិតផលមិនអាចលើសពី២០ខ្ទង់',
                'unit_price.required'   => 'សូមបញ្ចូលឈ្មោះ unit_price',
                'code.required'         => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផល',
                'code.max'              => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផលមិនអាចលើសពី២០ខ្ទង់',
                'type_id.exists'        => 'សូមជ្រើសរើសឈ្មោះផលិតផល'
            ]
        );

        // ===>> Update Product
        // Find record from DB
        $product                    = Product::find($id);

        // ===>> Check if data is valide
        if ($product) { //Yes

            // Map field of table in DB Vs. requested value from client
            $product->name          = $req->name;
            $product->code          = $req->code;
            $product->type_id       = $req->type_id;
            $product->unit_price    = $req->unit_price;

            // ===>> Save to DB
            $product->save();

            // ===>> Image Upload
            if ($req->image) {

                // Need to create folder before storing images
                $folder = Carbon::today()->format('d-m-y');

                // ===>> Send to File Service
                $image  = FileUpload::uploadFile($req->image, 'products/', $req->fileName);

                // ===>> Check if image has been successfully uploaded
                if ($image['url']) {

                    // Map field of table in DB Vs. uri from File Service
                    $product->image     = $image['url'];

                    // ===>> Save to DB
                    $product->save();

                }
            }

            // Prepare Data backt to Client
            $product = Product::select('*')
            ->with([
                'type'
            ])
            ->find($product->id);

            // ===> Success Response Back to Client
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ផលិតផលត្រូវបានកែប្រែជោគជ័យ',
                'product'   => $product,
            ], Response::HTTP_OK);

        } else { // No

            // ===> Failed Response Back to Client
            return response()->json([

                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ',

            ], Response::HTTP_BAD_REQUEST);

        }

    }

    public function delete($id = 0){

        // Find record from DB
        $data = Product::find($id);

        // ===>> Check if data is valide
        if ($data) { // Yes

            // ===>> Delete Data from DB
            $data->delete();

            // ===> Success Response Back to Client
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ទិន្នន័យត្រូវបានលុប',
            ], Response::HTTP_OK);

        } else { // No

            // ===> Failed Response Back to Client
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ], Response::HTTP_BAD_REQUEST);

        }
    }

}
