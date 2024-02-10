<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request); //dd() = dump and die
        //dd($request->get('name'));

        //Validar los datos
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|min:3|max:25|unique:users', //unique:users = que sea único en la tabla users
            'email' => 'required|email|unique:users|max:60', //unique:users = que sea único en la tabla users
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->get('name'), // toma el valor del input name y lo guarda en la columna name de la tabla users
            'username' => Str::slug($request->get('username')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        //?Autenticar al usuario
        auth()->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        //?otra forma de autenticar al usuario
        //auth()->attempt($request->only('email', 'password'));

        //?Redireccionar al usuario
        return redirect()->route('posts.index', Auth::user());
    }
}
