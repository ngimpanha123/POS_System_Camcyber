<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listing(Request $req)
    {
        $data = Product::select('*')
            ->with([
                'type'
            ]);

        //Filter
        if ($req->key && $req->key != '') {
            $data = $data->where('code', 'LIKE', '%' . $req->key . '%')->Orwhere('name', 'LIKE', '%' . $req->key . '%');
        }

        if ($req->type && $req->type != 0) {
            $data = $data->where('type_id', $req->type);
        }

        $data = $data->limit(100)
            ->orderBy('id', 'DESC')
            ->get();

        return $data;
    }
    public function create(Request $req)
    {
        //==============================>> Check validation
        $this->validate(
            $req,
            [
                'name'              => 'required|max:20',
                'code'              => 'required|max:20',
                'unit_price'        => 'required|',
                'type_id'           => 'required|exists:products_type,id'
            ],
            [
                'name.required'         => 'Please enter the name.',
                'name.max'              => 'Name cannot be more than 20 characters.',
                'type_id.exists'        => 'Please select correct type.',
                'code.required'         => 'Please enter the product code.',
                'unit_price.required'   => 'Please enter the unit_price.'
            ]
        );

        //==============================>> Start Adding data

        $product                  =   new Product;
        $product->name            =   $req->name;
        $product->code            =   $req->code;
        $product->type_id         =   $req->type_id;
        $product->unit_price      =   $req->unit_price;
        $product->save();

        //==============================>> Start Uploading Image     
        if ($req->image) {
            // Need to create folder before storing images       
            $folder = Carbon::today()->format('d') . '-' . Carbon::today()->format('M') . '-' . Carbon::today()->format('Y');
            $image     = FileUpload::uploadFile($req->image, 'products/' . $folder, '');
            if ($image['url']) {

                $product->image = $image['url'];
                $product->save();
            }
        }


        return response()->json([
            'data' => $product,
            'message' => 'ផលិតផលត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], 200);
    }
    public function update(Request $req, $id = 0)
    {
        //==============================>> Check validation
        $this->validate(
            $req,
            [

                'name'              => 'required|max:20',
                'type_id'           => 'required|exists:products_type,id'

            ],
            [
                'name.required'         => 'Please enter the name.',
                'name.max'              => 'Name cannot be more than 20 characters.',
                'type_id.exists'        => 'Please select correct type.'
            ]
        );

        //==============================>> Start Updating data
        $product                         = Product::find($id);
        if ($product) {

            $product->name               = $req->input('name');
            $product->code               = $req->input('code');
            $product->type_id            = $req->input('type_id');
            $product->unit_price         = $req->input('unit_price');

            $product->save();

            // Need to create folder before storing images
            $date_today = Carbon::today()->format('d') . '-' . Carbon::today()->format('M') . '-' . Carbon::today()->format('Y');
            if ($req->image) {
                $image     = FileUpload::uploadFile($req->image, 'product/' . $date_today, '');
                if ($image['url']) {
                    $product->image = $image['url'];
                    $product->save();
                }
            }

            $product           = Product::select('*')
                ->with([
                    'type'
                ])
                ->find($product->id);

            return response()->json([
                'status' => 'success',
                'message' => 'ផលិតផលត្រូវបានកែប្រែជោគជ័យ!',
                'product' => $product,
            ], 200);
        } else {

            return response()->json([
                'message' => 'ទិន្នន័យមិនត្រឹមត្រូវ។',
            ], 400);
        }
    }
    public function delete($id = 0)
    {
        $data = Product::find($id);

        //==============================>> Start deleting data
        if ($data) {

            $data->delete();
            return response()->json([
                // 'data'   => $data,
                'status' => 'success',
                'message' => 'ទិន្នន័យត្រូវបានលុប',
            ], 200);
        } else {

            return response()->json([
                'message' => 'ទិន្នន័យមិនត្រឹមត្រូវ។',
            ], 400);
        }
    }
}
