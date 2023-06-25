<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function listing(Request $req)
    {
        $data = Product::select('*')->with(['type']);
        //Filter
        if ($req->key && $req->key != '') {
            $data = $data->where('code', 'LIKE', '%' . $req->key . '%')->Orwhere('name', 'LIKE', '%' . $req->key . '%');
        }
        if ($req->type && $req->type != 0) {
            $data = $data->where('type_id', $req->type);
        }
        $data = $data->orderBy('id', 'desc')->paginate($req->limit ? $req->limit : 10,'per_page');
        return response()->json($data, Response::HTTP_OK);
    }

    public function view($id = 0)
    {
        $data = Product::select('*')->find($id); 
        if($data){
            return response()->json($data, Response::HTTP_OK);
        }else{
            return response()->json([
                'status'    => 'fil',
                'message'   => 'គ្មានទិន្ន័យ',
            ], Response::HTTP_BAD_REQUEST);
        }
        
    }

    public function create(Request $req)
    {
        //==============================>> Check validation
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
                'type_id.exists'        => 'សូមជ្រើសរើសឈ្មោះផលិតផល',
                'code.required'         => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផល',
                'code.max'              => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផលមិនអាចលើសពី២០ខ្ទង់',
                'unit_price.required'   => 'សូមបញ្ចូលឈ្មោះ unit_price'
            ]
        );

        //==============================>> Start Adding data

        $product                =   new Product;
        $product->name          =   $req->name;
        $product->code          =   $req->code;
        $product->type_id       =   $req->type_id;
        $product->unit_price    =   $req->unit_price;
        $product->save();

        //==============================>> Start Uploading Image     
        if ($req->image) {
            // Need to create folder before storing images       
            $folder = Carbon::today()->format('d') . '-' . Carbon::today()->format('M') . '-' . Carbon::today()->format('Y');
            $image  = FileUpload::uploadFile($req->image, 'products/' . $folder, $req->fileName);
            if ($image['url']) {
                $product->image = $image['url'];
                $product->save();
            }
        }

        return response()->json([
            'data'      =>  Product::select('*')->with(['type'])->find($product->id),
            'message'   => 'ផលិតផលត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], Response::HTTP_OK);
    }
    public function update(Request $req, $id = 0)
    {
        //==============================>> Check validation
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

        //==============================>> Start Updating data
        $product                         = Product::find($id);
        if ($product) {

            $product->name          = $req->name;
            $product->code          = $req->code;
            $product->type_id       = $req->type_id;
            $product->unit_price    = $req->unit_price;

            $product->save();

            // Need to create folder before storing images
            $folder = Carbon::today()->format('d') . '-' . Carbon::today()->format('M') . '-' . Carbon::today()->format('Y');
            if ($req->image) {
                $image  = FileUpload::uploadFile($req->image, 'products/' . $folder, $req->fileName);
                if ($image['url']) {
                    $product->image = $image['url'];
                    $product->save();
                }
            }

            $product = Product::select('*')
            ->with([
                'type'
            ])
            ->find($product->id);

            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ផលិតផលត្រូវបានកែប្រែជោគជ័យ',
                'product'   => $product,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function delete($id = 0)
    {
        $data = Product::find($id);

        //==============================>> Start deleting data
        if ($data) {
            $data->delete();
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ទិន្នន័យត្រូវបានលុប',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
