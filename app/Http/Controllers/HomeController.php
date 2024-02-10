<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function __invoke(){

        //Obtener a quien seguimos

        //? pluck trae los campos que se requieren conforme a la tabla
        $ids = Auth::user()->following->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home.home', [
            'posts'=>$posts
        ]);

    }
}
