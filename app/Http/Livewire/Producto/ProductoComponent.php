<?php

namespace App\Http\Livewire\Producto;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class ProductoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre, $precio, $cantidad, $descripcion, $imagen, $categoria_id;

    public function render()
    {
        $productos = Producto::paginate(2);
        return view('livewire.producto.producto-component', ["productos" => $productos]);
    }

    public function guardarProducto()
    {
        // validar
        $this->validate([
            "nombre" => "required|unique:productos",
            "cantidad" => "required"
        ]);

        // guardar 
        $producto = new Producto;
        $producto->nombre = $this->nombre;
        $producto->precio = $this->precio;
        $producto->cantidad = $this->cantidad;
        $producto->descripcion = $this->descripcion;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();

        // sesion flash (enviar un mensaje producto registrado)

        // responder
        $this->emit("cerrarModal");
    }
}
