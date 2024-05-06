<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response; // For Responsing data back to Client
use Illuminate\Support\Facades\Hash; // For Encripting data

// ============================================================================>> Third Party Library
use Carbon\Carbon; // Data Time format & Calculation

// ============================================================================>> Custom Library
// Controller
use App\Http\Controllers\MainController;

// Service
use App\Services\FileUpload; // Upload Image/File to File Micro Serivce

// Model
use App\Models\User\Type;
use App\Models\User\User;


class UserController extends Controller
{
    //
    public function getUserType(){

        // ===>> Get Data from Database
        $data = Type::get();

        // ===>> Success Response Back to Client
        return response()->json($data, Response::HTTP_OK);

    }

    public function getData(Request $req){

        // ===>> Get Data from DB
        $data = User::select('id', 'name', 'phone', 'email', 'type_id', 'avatar', 'created_at', 'is_active')
        ->with([
            'type' // M:1
        ]);

        // ===>>> Filter
        // By Key for Name or Phone Number
        if ($req->key && $req->key != '') {
            $data = $data->where('name', 'LIKE', '%' . $req->key . '%')->Orwhere('phone', 'LIKE', '%' . $req->key . '%');
        }

        // Order Data from Latest ID
        $data = $data->orderBy('id', 'desc')

        // Pagination limited by 10
        ->paginate($req->limit ? $req->limit : 10,);

        // Success Response Back to Client
        return response()->json($data, Response::HTTP_OK);
    }

}
