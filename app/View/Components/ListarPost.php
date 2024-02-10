<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


//? Lógica del lado del servidor
class ListarPost extends Component
{
    //Propiedad del objeto
    public $posts;

    //? es la Informacion que se le pasa al componente
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-post');
    }
}
