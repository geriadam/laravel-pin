<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ResponseApi;

    public function register(SignupRequest $request)
    {
        DB::begintransaction();

        try {
            $request->merge(['name' => $request->email]);
            $request->merge(['password' => Hash::make($request->password)]);
            $user = User::create($request->all());
            DB::commit();
            return $this->sendResponse($user, "User Created Successfully", Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->sendError($th->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return $this->sendError('Email & Password does not match with our record.', [], Response::HTTP_UNAUTHORIZED);
            }

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken("auth_token");
            $data = [
                'user' => $user->toArray(),
                'access_token' => $token->plainTextToken,
                'token_type' => 'Bearer',
            ];

            return $this->sendResponse($data, "Login Successfully", Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    public function user()
    {
        $user = auth('sanctum')->user();
        return $this->sendResponse($user, "User get Successfully", Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        auth('sanctum')->user()->tokens()->delete();
        return $this->sendResponse(null, "Logout Successfully", Response::HTTP_OK);
    }
}
