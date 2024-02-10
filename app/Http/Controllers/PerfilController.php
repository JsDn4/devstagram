<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store (Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => [
                'required',
                'min:3',
                'max:25',
                'unique:users,username,' . auth()->user()->id,
                'not_in:twitter,editar-perfil'
            ],
            // 'email' => [
            //     'email',
            //     'unique:users,email,' . Auth::user()->id ,
            //     'max:60'
            // ],
            // 'password' => [
            //     'min:8',
            //     'confirmed'
            // ]
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();


            //? Esto viene desde InterventionImage
            $imagenServidor  = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        //Guardar los cambios
        $usuario = User::find( Auth::user()->id );
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? '';


        // $usuario->email =  $request->email ?? Auth::user()->email;
        // $usuario->password =  Hash::make($request->password) ?? Auth::user()->password;

        $usuario->save();

        // auth()->attempt([
        //     'email' => $usuario->email,
        //     'password' => $usuario->password
        // ]);

        return redirect()->route('posts.index', $usuario->username);

    }
}
