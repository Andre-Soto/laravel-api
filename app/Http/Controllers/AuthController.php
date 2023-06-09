<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccessToken;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //

    public function store(Request $request){

        $ip = request()->ip();
        Log::info('Se creo un nuevo usuario de acceso desde la ip:'.$ip);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $data = [
            'message' => 'User was created successfully',
            'user' => $user
        ];

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {

        $ip = request()->ip();
        Log::info('Se inicio sesión desde la ip:'.$ip);

        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }

            $check = Hash::check($request->password, $user->password);
            if (!$check) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }
            
            $accessToken = AccessToken::updateOrCreate(
                [ 'user_id' => $user->id ],
                [ 'access_token' => sha1($user->email.$user->created_at.random_int(200, 500)) ]
            );
            return response()->json([ 'access_token' =>  $accessToken->access_token ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(Request $request)
    {
        try {
            $accessToken = AccessToken::where('access_token', $request->access_token)->first();
            if ($accessToken) {
                $accessToken->delete();
                return response()->json([ 'success' => true ]);
            }
            
            return response()->json([ 'success' => false ]); 
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   
    
}
