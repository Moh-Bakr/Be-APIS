<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'role' => 'string',
                'phone' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myapp-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {
        try {
            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }
        $token = $user->createToken('myapp-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function users()
    {
        return User::orderBy('id', 'ASC')->get();
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }

    public function approve_user_by_email(Request $request)
    {
        if ($request->email == "admin@gmail.com") {
            $response = [
                'message' => "Cannot Change Role",
            ];
            return response($response, 201);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['role' => 'Employee']);
        return $user;
    }

    public function disapprove_user_by_email(Request $request)
    {
        if ($request->email == "admin@gmail.com") {
            $response = [
                'message' => "Cannot Change Role",
            ];
            return response($response, 201);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['role' => 'visitor']);
        return $user;
    }

    public function read_request(Request $request)
    {
        if ($request->email == "admin@gmail.com") {
            $response = [
                'message' => "Cannot Change permission",
            ];
            return response($response, 201);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['permission' => 'read']);
        return $user;
    }

    public function write_request(Request $request)
    {
        if ($request->email == "admin@gmail.com") {
            $response = [
                'message' => "Cannot Change permission",
            ];
            return response($response, 201);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['permission' => 'write']);
        return $user;
    }


}
