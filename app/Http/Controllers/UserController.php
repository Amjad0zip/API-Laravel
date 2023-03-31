<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
            $randomChars = '/@&+,./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $token = Str::random(32, $randomChars); // Générer une chaîne de 32 caractères aléatoires avec des caractères spéciaux

    // Change encoding method to SHA-256 hash
            $hashedToken = Hash::make($token);
        
            $response = [
                'user' => $user,
                'token' => $hashedToken
            ];
        
             return response($response, 201);
    }
}
