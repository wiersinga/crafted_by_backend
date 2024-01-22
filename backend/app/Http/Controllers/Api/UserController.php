<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        User::create($request->all());
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

}




//    public function getUsers()
//    {
//        return  User::all();
//    }
//
//    public function getUser($id){
//
//        $user = User::find($id);
//
//        if (!$user){
//            return response('User not Found',404);
//        }
//        return $user;
//    }
//
//    public function storeUser(Request $request)
//    {
//        $request->validate([
//            'firstName' =>'required|string',
//            'lastName' => 'required|string',
//            'birthdate' => 'required|date',
//            'email' => 'required|email:rfc,dns|unique:users',
//            'password' => 'required',
//            'address_id' => 'required|exists:App\Models\Address,id',
//            'role_id' => 'required|exists:App\Models\Role,id',
//        ]);
//
//        User::create($request->all());
//
//        return response('User created successfully');
//    }
//
//    public function updateUser(Request $request, $id)
//    {
//        $request->validate([
//            'firstName' =>'sometimes|required|string',
//            'lastName' => 'sometimes|required|string',
//            'birthdate' => 'sometimes|required|date',
//            'email' => 'sometimes|required|email:rfc,dns',
//            'password' => 'sometimes|required|string',
//            'address_id' => 'exists:App\Models\Address,id',
//            'role_id' => 'exists:App\Models\Role,id',
//        ]);
//
//        $user = User::find($id);
//
//        if (!$user){
//            return response('User not Found',404);
//        }
//        $user->update($request->all());
//        return response('User updated successfully');
//    }
//
//    public function deleteUser($id)
//    {
//        $user = User::find($id);
//
//        if($user){
//            $user->delete();
//            return response('User deleted successfully');
//        }
//        return response('User not Found',404);
//    }

