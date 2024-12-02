<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtpRequest;
use App\Http\Requests\user_requests;
use App\Http\Requests\Users_Update_Request;
use App\Http\Resources\OtpCodeResource;
use App\Http\Resources\UserResource;
use App\Models\otp_code;
use App\Models\User;
use http\Env\Response;
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

    public function login_user(Request $request)
    {
        $user = User::where('number',$request->number)->first();
        if ($user) {
            $otp_code = otp_code::create([
                'code' => rand(100000, 999999),
                'number' => $user->number,
            ]);
            return Response()->json(['message'=>'user exist','data'=> new OtpCodeResource($otp_code)], 200);
        }
        else{
            return response()->json(['message'=>'user not found'], 200);
        }

    }

    public function check_otp(OtpRequest $otpRequest)
    {
        $otp_check = otp_code::where('number',$otpRequest->number)->where('code',$otpRequest->code)->first();
        if ($otp_check) {
            $otp_check->delete();
            $user = User::where('number',$otpRequest->number)->first();
            $token = $user->createToken('my-app-token');
            return response()->json(['message'=>'login successfully'], 200);
        }
    }
}
