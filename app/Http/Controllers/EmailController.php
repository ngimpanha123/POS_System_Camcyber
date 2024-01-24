<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    //Just test implementation for send the eamil
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $details = [
            'title' => $request->title,
            'body' => $request->body,
            'otp'   => 123456
        ];

        // Mail::to($request->email)->send(new TestEmail($details));
        Mail::to($request->email)->send(new ResetPassword($details));

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}
