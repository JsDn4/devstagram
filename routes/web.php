<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
?Create => Es lo que permite tener el formulario, osea que retorna la vista(GET)
?Store => Almacena en la base de datos
*/

Route::get('/', HomeController::class)->name('home');

//* Crear cuenta
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

//* Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
//?                                           !En esta parte es el método de la clase
Route::post('/login', [LoginController::class, 'store']);

//* Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//* Perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//* Muro
//? la url toma la variable que se encuentra en el controlador
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//* Comentarios
//? Petición post para la creación de comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

//* Imágenes
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');


//* Likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


//* Siguiendo usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/follow', [FollowerController::class, 'destroy'])->name('users.unfollow');
