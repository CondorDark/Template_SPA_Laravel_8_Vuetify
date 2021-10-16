<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->tokens()->delete();

        return [
            'msj' => 'Logged out'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Fields
        $fields = $request->validate([
            // 'email'     => 'required|string|unique:users,email|email',
            'email'     => 'required|string|email|max:255',
            'password'  => 'required|string|min:8'
        ]);
        
        // Check User
        $user = User::where('email', $fields['email'])->first();

        // Check User Or Password
        if ( !$user || !Hash::check($fields['password'], $user->password ))
        {

            return response([
                'msj' => 'Invalid Credentials'
            ], 401);

        } else {
            
            if ( !$user->st_user ) {

                return response([
                    'msj' => 'Inactive User'
                ], 403);

            } else {
                
                // Generate Token
                $token = $user->createToken('auth_token')->plainTextToken;
                
                return response([
                    'user' => $user,
                    'Token' => $token,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage. (Register)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User;
            $user->name = $fields['name'];
            $user->email = $fields['email'];
            $user->password = Hash::make($fields['password']);
        $user->save();

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response ,201);
    }
}
