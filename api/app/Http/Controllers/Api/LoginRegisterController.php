<?php

namespace App\Http\Controllers\Api;

use App\Models\Artist;
use App\Models\Role;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_type'=> 'required|exists:App\Models\Role,type',
            'siret' => 'required_if:role_type,artist|string', // Required if role_type is artist
            'speciality_name'=> 'required_if:role_type,artist|exists:App\Models\Speciality,name',
            'history' => 'required_if:role_type,artist|string', // Required if role_type is artist
            'craftingDescription' => 'required_if:role_type,artist|string', // Required if role_type is artist
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Errors!',
                'data' => $validator->errors()
            ], 403);
        }
        $role = Role::where('type', $request->role_type)->firstOrFail(); // Get role by name-

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id, // Use role id obtained from the query

            //'role_id'=> $request->role_id,
        ]);



        $data['token'] = $user->createToken($request->email)->plainTextToken;
        $data['user'] = $user;

        if ($request->role_type  == 'artist'){
            $speciality = Speciality::where('name', $request->speciality_name)->firstOrFail();


            $artist = Artist::create([
                'artist_id' =>$request->id,
                'user_id'=> $user->id,
                'siret'=> $request->siret,
                'history'=>$request->history,
                'craftingDescription'=>$request->craftingDescription,
                'speciality_id'=> $speciality->id
            ]);
        }

        $response = [
            'status' => 'success',
            'message' => 'User is created successfully.',
            'data' => $data,
        ];

        return response()->json($response, 201);

    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 401);
        }
// check email exist
        $user = User::where('email', $request->email)->first();

        if (!$user){
            return response()->json([
                'status'=> 'failed',
                'message'=>'No Account yet'
            ],401);
        }

        //check password
        else if(!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid credentials'
            ], 401);
        }

        $data['token'] = $user->createToken($request->email)->plainTextToken;
        $data['user'] = $user;

        $response = [
            'status' => 'success',
            'message' => 'User is logged in successfully.',
            'data' => $data,
        ];

        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
        ], 200);
    }
}
