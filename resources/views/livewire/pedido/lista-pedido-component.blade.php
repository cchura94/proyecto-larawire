<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>FECHA PEDIDO</th>
                <th>CLIENTE</th>
                <th>ATENDIDO POR</th>
                <th>PRODUCTOS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->fecha_pedido }}</td>
                <td>{{ $pedido->cliente->nombre_completo }}</td>
                <td>{{ $pedido->user->email }}</td>
                <td>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="mostrarProductos({{$pedido->id}})">
  VER PRODUCTOS
</button>


                </td>
            </tr>
                
            @endforeach
        </tbody>

    </table>

    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
            </tr>

            @foreach ($productos as $prod)
            <tr>
                <td>{{ $prod->id }}</td>
                <td>{{ $prod->nombre }}</td>
                <td>{{ $prod->precio }}</td>
                <td>{{ $prod->pivot->cantidad }}</td>
            </tr>
                
            @endforeach

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</div>
