<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Login the user.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function login(Request $request): Response
    {

        $credentials = $request->only('email', 'password');
        $remember    = $request->input('remember');

        $rules = [
            'email' => 'bail|required|email|exists:users,email',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        return Auth::attempt($credentials, $remember)
            ? response(null, 204)
            : response(null, 401);
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'password.current_password' => 'Authentication failed.',
        ];
    }
}
