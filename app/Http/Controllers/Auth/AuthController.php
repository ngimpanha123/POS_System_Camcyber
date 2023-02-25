<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $req)
    {
        $this->validate(
            $req,
            ['username' => ['required'], 'password' => 'required|min:6|max:20'],
            [
                'username.required' => 'Username is required.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 digit long.',
                'password.max' => 'Password is not allowed to be longer than 20 digit long.',
            ]
        );
        if (filter_var($req->post('username'), FILTER_VALIDATE_EMAIL)) {
            $credentials = array(
                'email' => $req->username,
                'password' => $req->password,
                'is_active' => 1,
                'deleted_at' => null,
            );
        } else {
            $credentials = array(
                'phone'             =>  $req->username,
                'password'          =>  $req->password,
                'is_active'         =>  1,
                'deleted_at'        =>  null,
            );
        }

        try {

            JWTAuth::factory()->setTTL(30); //30 min
            $token = JWTAuth::attempt($credentials);

            if (!$token) {

                return response()->json([
                    'status' => 'error',
                    'message' => 'ឈ្មោះអ្នកប្រើឬពាក្យសម្ងាត់មិនត្រឹមត្រូវ។'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'មិនអាចបង្កើតនិមិត្តសញ្ញាទេ!'
            ], 500);
        }

        return $this->respondWithToken($token);
    }

    /**
     * register new user
     */
    public function register(Request $req)
    {
        $this->validate(
            $req,
            [
                'username' => ['required'],
                'password' => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password'
            ],
            [
                'username.required' => 'Username is required.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 digit long.',
                'password.max' => 'Password is not allowed to be longer than 20 digit long.',
                'password_confirmation.required'     => 'សូមបញ្ចូលពាក្យសម្ងាត់របស់អ្នកឡើងវិញ',
                'password_confirmation.same'         => 'សូមបញ្ចូលពាក្យសម្ងាត់បញ្ជាក់របស់អ្នកឡើងវិញទៅពាក្យសម្ងាត់ថ្មីដដែល',
            ]
        );
    }

    /**
     * changePassword
     */
    public function changePassword()
    {
        return "hi";
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function view()
    {
        return response()->json(JWTAuth::parseToken()->authenticate()); //auth()->user()
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        JWTAuth::factory()->setTTL(30); //30 min
        return $this->respondWithToken(JWTAuth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user = auth()->user();
        $dataUser = [
            'id'        => $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'avatar'    => $user->avatar,
            'phone'     => $user->phone

        ];
        $role = '';
        if ($user->type_id == 2) { //
            $role = 'Staff';
        } else {
            $role = 'Admin';
        }

        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => JWTAuth::factory()->getTTL() * 60 . ' seconds',
            'user'          => $dataUser,
            'role'          => $role
        ]);
    }
}
