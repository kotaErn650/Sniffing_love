<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => ['nullable', 'string', 'max:15'],
            'direccion' => ['nullable', 'string', 'max:200'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'genero' => ['nullable', 'in:Masculino,Femenino,Otro,Prefiero no decir'],
            'foto_perfil' => ['nullable', 'image', 'max:2048'],
            'terms' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'id_rol' => $request->id_rol ?? 2, // Rol por defecto 2 si no se especifica
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'contrasena' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'foto_perfil' => $request->file('foto_perfil') ? $request->file('foto_perfil')->store('perfiles', 'public') : null,
            'activo' => true,
            'verificado' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}