<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
//        User::create([
//            'email'=> 'admin@admin.fr',
//            'password'=> Hash::make('Password123'),
//            'role_id'=> '9b2d49a3-054f-4607-beed-b661e35d9be5'
//        ]);
        $this->authorize('view',User::class);

          return UserResource::collection(User::all());
    }

    public function show($id)
    {
        return new UserResource(User::findOrfail($id));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create',User::class);

        $user = User::create($request->validated());

        return new UserResource($user);
    }



    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('create',User::class);

        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('create',User::class);

        $user->delete();

        return response('User deleted successfully');
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

