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
use App\Models\pic;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $pic = pic::all();
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
            'pic' => ['required'],
            'nrp' => ['required', 'numeric' , 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'pic.required' => 'pic harus dipilih',
            'nrp.unique:'.User::class => 'nrp sudah dipakai',
            'nrp.required' => 'nrp haris diisi'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nrp' => $request->nrp,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->pic);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
