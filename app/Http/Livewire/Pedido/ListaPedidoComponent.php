<?php

namespace App\Http\Livewire\Pedido;

use App\Models\Pedido;
use Livewire\Component;

class ListaPedidoComponent extends Component
{
    public $productos = [];
    
    public function render()
    {
        $pedidos = Pedido::get();
        return view('livewire.pedido.lista-pedido-component', ["pedidos" => $pedidos]);
    }

    public function mostrarProductos($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        $this->productos = $pedido->productos;

    }
}
