<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(Request $request)
    {
        User::create($request->all());
    }

    public function show($id)
    {
        return new UserResource(User::findOrfail($id));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        return new UserResource($user);
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
//
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

