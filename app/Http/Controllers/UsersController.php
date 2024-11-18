<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\user_requests;
use App\Http\Requests\Users_Update_Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function Store_user(user_requests $user_requests)
    {
        User::create($user_requests->all());
    }

    public function show_user($id)
    {
        $User = User::find($id);
        if (is_null($User)) {
            return response()->json('User not found', 404);
        }
        else{
            return response()->json(['message'=>'user exist','data'=> new UserResource($User)], 200);
        }
    }

    public function show_users_list()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function update_user(Users_Update_Request $Users_Update_Request, User $User)
    {
        $User->update($Users_Update_Request->all());
        return response()->json([
            'message'=>'user updated successfully',
            'data'=> new UserResource($User)
        ], 200);
    }

    public function delete_user(User $User)
    {
        $User->delete();
        return response()->json('User deleted successfully', 200);
    }
}
