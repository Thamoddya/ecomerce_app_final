<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Mail\ContactMail;
use App\Models\User;
use \Illuminate\Routing\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $verifyToken = Str::random(40);
        $user = User::create(array_merge($request->validated(),
            [
                'verify_token' => $verifyToken,
            ]
        ));

        $mailData = [
            'title' => 'Mail From Portfolio',
            'verify_token' => $verifyToken,
            'user_id' => $user['id']
        ];
        Mail::to($request->validated(['email']))->send(new ContactMail($mailData));

        return response()->json([
            "attempt" => true,
            "message" => "User Registration Successful"
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "attempt" => false,
                "message" => "Invalid Login Data"
            ], 401);
        }

        $userData = User::where('email', $credentials['email'])->first();
        return response()->json([
            "attempt" => true,
            "access_token" => $userData->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer',
            'userData' => new LoginResource($userData)
        ]);
    }

    public function verifyEmail(Request $request, $id, $verify_token)
    {
        $user = User::where('id', $id)
            ->where('verify_token', $verify_token)
            ->first();
        if ($user) {
            $user->update([
                'email_verified' => 1,
                'email_verified_at' => now(),
            ]);
            return response()->json([
                "message" => "Email Verified Successfully",
            ]);
        } else {
            return response()->json([
                "message" => "Invalid verification link",
            ], 404);
        }
    }
    public function resendEmail(Request $request,$id){
        $user = User::Where('id',$id)->first();
        $UserToken=$user['verify_token'];
        $mailData = [
            'title' => 'Verification Mail',
            'verify_token' => $UserToken,
            'user_id' => $user['id']
        ];
        Mail::to($user['email'])->send(new ContactMail($mailData));
        return response([
            "message"=>"Email sent successfully"
        ]);
    }
}
