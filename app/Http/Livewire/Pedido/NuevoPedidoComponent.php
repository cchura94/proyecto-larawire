<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\Producto;

class NuevoPedidoComponent extends Component
{
    // atributos
    public $productos;
    public $carrito;

    // metodos
    public function render()
    {
        return view('livewire.pedido.nuevo-pedido-component');
    }

    // cargar informacion cuando cargue el componente
    public function mount()
    {
        $this->productos = Producto::all();
        $this->carrito = array();
        // $this->productos = ["Mesa", "Silla", "Escritorio"];                
    }

    public function addCarrito($prod){
        $p = [
            "id" => $prod["id"],
            "nombre" => $prod["nombre"],
            "precio" => $prod["precio"],
            "cantidad" => 1
        ];
        // falta reducir el stock del inv
        array_push($this->carrito, $p);
    }

    public function quitarCarrito($id){
        $index = 0;
        foreach ($this->carrito as $prod)
        {
            if ($prod['id']==$id) unset($this->carrito[$index]);
            $index++;
        }
    }
}
