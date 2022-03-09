<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class NuevoPedidoComponent extends Component
{
    // atributos
    public $productos;
    public $carrito;
    public $cliente;
    public $search;
    protected $queryString = ['search'];
    // datos de cliente
    public $nombre_completo, $telefono, $correo;


    // metodos
    public function render()
    {
        if($this->search != ""){
            $this->cliente = Cliente::where('nombre_completo', 'like', '%'.$this->search.'%')->first();
        }
        // $this->cliente = Cliente::all();        
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

    public function quitarCarrito($index){
        array_splice($this->carrito, $index, 1);
    }

    public function guardarCliente()
    {
        $this->search = "";

        $clie = new Cliente();
        $clie->nombre_completo = $this->nombre_completo;
        $clie->telefono = $this->telefono;
        $clie->correo = $this->correo;
        $clie->save();

        $this->cliente = $clie; 
        $this->search =  $clie->nombre_completo;             
    }

    public function guardarPedido()
    {
        $pedido = new Pedido();
        $pedido->fecha_pedido = date("Y-m-d H:i:s");
        $pedido->cliente_id = $this->cliente->id;
        $pedido->user_id = Auth::user()->id;
        $pedido->estado = 1; // en proceso
        $pedido->save();

        // agregar los productos al pedido
        foreach ($this->carrito as $prod) {
            $pedido->productos()->attach($prod['id'], ["cantidad" => $prod['cantidad']]);
        }
        $pedido->estado = 2; // completado
        $pedido->save();

        return redirect("/admin/pedido");
    }
}
