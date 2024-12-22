<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public bool $token = true;
  //Register 
     public function register(Request $request): JsonResponse
    {

        $input = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|digits:10|unique:users',
            'password' => 'required|min:6',
        ]);


        if ($input->fails()) {
            return response()->json(['error' => $input->errors()], 422);    //(Unprocessable Entity)
        }

        $user=User::query()->create([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
            ]
        ]);}

    

    //Log in
 public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|digits:10',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $credentials = $request->only('phone_number', 'password');

        
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid phone number or password',
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'Bearer',
            ],
        ]);
    }

    
 //logout
    public function logout(Request $request): JsonResponse
    {
          if(!Auth::guard('api')->user()){
              return response()->json([
                  'status' => 'error',
                  'message' => 'you are not logged in'
              ],401);
          }
            Auth::logout();
            return response()->json(['message' => 'Signed out successfully']);
        }

  

    public function getUser(Request $request): JsonResponse
    {
        try{
            $user = JWTAuth::authenticate($request->token);
            return response()->json(['user' => $user]);

        }catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'something went wrong']);
        }
    }

    //Add user information (update)
     public function addUserInformation(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'location' => 'required|string|max:255',
        ]);

        $user = Auth::guard('api')->user();                       //current user
        $image = $request->file('profile_photo');//save photo profile
        if ($request->hasFile('profile_photo')) {
            $image =time().'.'.$image->getClientOriginalExtension(); //add time to extension
            $image->move(public_path('images'), $image);         //path change
            $image='images/'.$image;
        }
        //update user information
        $user->update([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'profile_photo' => $image ?? $user->profile_photo,
            'location' => $data['location']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User Information updated successfully',
        ]);

    }


}
