<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tipo;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipos = Tipo::latest()->get();
        //dd($tipos);
        return view('auth.register', compact('tipos'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        //dd($request);
        $user = User::create([
            'nombre' => $request['nombre'],
            'dni' => $request['dni'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
            'codigoPostal' => $request['codigoPostal'],
            'localidad' => $request['localidad'],
            'provincia' => $request['provincia'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if(isset($request['peligrosa'])){
            Mascota::create([
                'tipos_id' => $request['tipo'],
                'users_id' => $user->id,
                'nombre' => $request['nombreMascota'],
                'edad' => $request['edadMascota'],
                'peligrosa' => "si",
                'alergia' => $request['alergiaMascota'],
            ]);
        }
        else{
            Mascota::create([
                'tipos_id' => $request['tipo'],
                'users_id' => $user->id,
                'nombre' => $request['nombreMascota'],
                'edad' => $request['edadMascota'],
                'peligrosa' => "no",
                'alergia' => $request['alergiaMascota'],
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
