<?php

namespace App\Http\Livewire\Producto;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductoComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $nombre, $precio, $cantidad, $descripcion, $imagen, $categoria_id;
    public $prod_aux;

    public function render()
    {
        $categorias = Categoria::all();
        $productos = Producto::orderBy('id', 'desc')->paginate(10);
        return view('livewire.producto.producto-component', ["productos" => $productos, "categorias" => $categorias]);
    }

    public function guardarProducto()
    {
        // validar
        $this->validate([
            "nombre" => "required|unique:productos",
            "cantidad" => "required",
            "categoria_id" => "required"
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
        $this->emit("alerta", "Producto registrado correctamente");
        // enviar la alert
        session()->flash('mensaje', 'Producto registrado correctamente');
    }

    public function editarImagen($id)
    {
        $producto = Producto::find($id);
        $this->imagen = $producto->imagen;
        $this->prod_aux = $producto;
    }

    public function subirImagen()
    {
        $this->validate([
            'imagen' => 'image|max:1024', // 1MB Max
        ]);

        $nombreimg = time().'.'.$this->imagen->extension(); 

        $this->imagen->storeAs('imagenes', $nombreimg);

        $producto = Producto::find($this->prod_aux->id);
        $producto->imagen = $nombreimg;
        $producto->save();

        session()->flash('mensaje', 'Imagen registrada');

    }

    public function editar($id)
    {
        $producto = Producto::find($id);
        $this->nombre = $producto->nombre;
        $this->precio = $producto->precio;
        $this->cantidad = $producto->cantidad;
        $this->descripcion = $producto->descripcion;
        $this->categoria_id = $producto->categoria_id;
        $this->imagen = $producto->imagen;

        $this->prod_aux = $producto;
    }

    public function modificar()
    {
        $this->validate([
            "nombre" => "required|unique:productos,nombre,".$this->prod_aux->id,
            "cantidad" => "required",
            "categoria_id" => "required"
        ]);

        // 
        $producto = Producto::find($this->prod_aux->id);
        $producto->nombre = $this->nombre;
        $producto->precio = $this->precio;
        $producto->cantidad = $this->cantidad;
        $producto->descripcion = $this->descripcion;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();

        $this->emit("cerrarModal");
        $this->emit("alerta", 'Producto Modificado');

        session()->flash('mensaje', 'Producto Modificado');

    }
}
