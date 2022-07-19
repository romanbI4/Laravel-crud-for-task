<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request): RedirectResponse
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            return redirect()
                ->back()
                ->with('error', 'Incorrect login or password');
        } else {
            return redirect()
                ->route('tasks.index')
                ->with('message', 'You have successfully logged');
        }
    }

    public function registration(Request $request): RedirectResponse
    {
        $user = User::create([
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::loginUsingId($user->id);

        return redirect()
            ->route('tasks.index')
            ->with('message', 'You have successfully registered');
    }

    public function logout(): Redirector|Application|RedirectResponse
    {
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('message', 'You have successfully logout');
    }
}
