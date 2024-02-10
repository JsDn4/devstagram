<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //? Estos son los campos que se envían hacia la base de datos
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];


    //? Esto es de una relación para acceder a las propiedades de posts
    /**
     * @ejemplo
     * foreach $posts as $post
     *
     * $post->user->username
     *
     * endforeach
     */
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function checkLikes(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
