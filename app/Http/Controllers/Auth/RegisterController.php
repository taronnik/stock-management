<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegisterController extends Controller
{
    public function showRegisterForm(): Factory|View|Application
    {
        return view('register');
    }

    /**
     * Handle an authentication attempt.
     */
    public function register(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ]);

        User::query()->create([
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        return response()->json(['success' => true], ResponseAlias::HTTP_OK);
    }
}
