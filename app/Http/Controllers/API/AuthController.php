<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function response;

class AuthController extends Controller
{
    /**
     * Create User
     */
    public function createUser(Request $request){

        try {
            $validateUser = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|confirmed',
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'staus' => true,
                'message' => 'User create Successfully',
                'X-XSRF-TOKEN' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);


        } catch (\Throwable $throwable){
            return response()->json([
                'status' => false,
                'message' => $throwable->getMessage(),
            ], 500);
        }

    }

    public function loginUser(Request $request){
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ( $validateUser->fails() ){
                return \response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if ( !Auth::attempt($request->only(['email', 'password'])) ){
                return \response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return \response()->json([
                'status' => 200,
                'message'=> 'User logged in Successfully',
                'X-XSRF-TOKEN' => $user->createToken('API TOKEN')->plainTextToken
            ], 200);

        } catch ( \Throwable $throwable){
            return \response()->json([
                'status' => false,
                'message' => $throwable->getMessage()
            ], 500 );
        }
    }


    public function logout(Request $request) {
//        auth()->user()->tokens()->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

//        if ($request->user()) {
//            $request->user()->tokens()->delete();
//        }
        return \response()->json([
            'message' => 'Logged out'
        ], 200 );
    }

}
