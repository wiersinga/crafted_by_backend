<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
//        User::create([
//            'email'=> 'admin@admin.fr',
//            'password'=> Hash::make('Password123'),
//            'role_id'=> '9b2d49a3-054f-4607-beed-b661e35d9be5'
//        ]);

          return UserResource::collection(User::all());
    }

    public function store(StoreUserRequest $request)
    {

        $user = User::create($request->validated());

        return new UserResource($user);
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

