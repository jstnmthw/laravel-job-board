<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Login the user.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $remember    = $request->input('remember');

        $rules = [
            'email' => 'bail|required|email|exists:users,email',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        return Auth::attempt($credentials, $remember)
            ? response()->json(null, 203)
            : response()->json([
                'errors' => [
                    'password' => [
                        'Password error text'
                    ]
                ]
            ], 401);
    }

    /**
     * Logout the user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json('Logged out.');
    }
}
