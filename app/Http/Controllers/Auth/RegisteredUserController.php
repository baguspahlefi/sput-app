<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\PIC;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $pic = PIC::all();
        return view('auth.register',
        ['pic' => $pic]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'PIC' => ['required'],
            'NRP' => ['required', 'numeric' , 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'PIC.required' => 'PIC harus dipilih',
            'NRP.unique:'.User::class => 'NRP sudah dipakai',
            'NRP.required' => 'NRP haris diisi'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'NRP' => $request->NRP,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->PIC);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
