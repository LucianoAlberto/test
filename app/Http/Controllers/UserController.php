<?php

namespace App\Http\Controllers;

use \Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        $roles = DB::table('roles')->get();
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recuperamos los roles existentes
        $roles = DB::table('roles')->get();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $validated = $request->validated();
        $datos = $request->except('_token');

        $usuario = new User;
        $usuario->name = $validated["name"];
        $usuario->email = $validated["email"];
        $usuario->password = bcrypt($request["password"]);
        $usuario->rol = $validated['rol'];
        $usuario->assignRole(Role::find($validated['rol']));
        $usuario->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = DB::table('roles')->get();

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $validated = $request->validated();
        $user->name = $validated["name"];
        $user->email = $validated["email"];
 
        if($request["password"] != $user->password){
            $user->password = bcrypt($request["password"]);
        }

        $user->rol = $validated['rol'];
        $user->assignRole(Role::find($validated['rol']));

        $user->update();

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }
}
