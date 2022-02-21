<?php

namespace App\Http\Livewire\Categoria;

use Livewire\Component;
use App\Models\Categoria;

class CategoriaComponent extends Component
{
    public $titulo = "Gestión de Categorias";
    public $nombre, $detalle;
    public $editar= false;

    public function render()
    {
        $categorias = Categoria::get();
        return view('livewire.categoria.categoria-component', ["categorias" => $categorias]);
    }

    public function guardarCategoria()
    {
        // validar
        $this->validate([
            "nombre" => "required|min:2|max:50|unique:categorias"
        ]);
        // guardar
        $categoria = new Categoria;
        $categoria->nombre = $this->nombre;
        $categoria->detalle = $this->detalle;
        $categoria->save();
    }

    public function editarCategoria(Categoria $cat)
    {
        //print_r($cat);
        // $cat = Categoria::find($id);        
        $this->nombre = $cat->nombre;
        $this->detalle = $cat->detalle;
        
        $this->editar = true;
    }
}
