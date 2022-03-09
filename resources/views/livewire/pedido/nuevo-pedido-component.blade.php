<div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Datos del pedido</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Fecha: {{ date('d M, Y - H:i:s') }}</h5>
                        </div>
                        <div class="col-md-5">
                            <h4>Cuenta: {{ Auth::user()->name }} - {{ Auth::user()->email }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h2>En Proceso</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5>Lista de Productos</h5>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>PRECIO</th>
                                <th>STOCK</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td>{{ $prod->precio }}</td>
                                <td>{{ $prod->cantidad }}</td>
                                <td>
                                    <button wire:click="addCarrito({{ $prod }})" class="btn btn-info btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Carrito</h5>
                            <table class="table">
                                <tr>
                                    <td>NOM</td>
                                    <td>P.U.</td>
                                    <td>Cant.</td>
                                    <td>S.T.</td>
                                    <td></td>
                                </tr>
                                @foreach ($carrito as $p)
                                <tr>
                                    <td>{{$p['nombre']}}</td>
                                    <td>{{$p['precio']}}</td>
                                    <td>{{$p['cantidad']}}</td>
                                    <td>{{$p['precio'] * $p['cantidad'] }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-xs" wire:click="quitarCarrito({{$loop->index}})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Cliente</h5>
                            <div class="row">
                                <div class="col-md-8">
                                    <input wire:model="search" type="search" class="form-control" placeholder="buscar por nombre...">
                                    
                                </div>
                                <div class="col-md-4">
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
  Nuevo Cliente
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="">Nombre Completo</label>
          <input type="text" wire:model="nombre_completo" class="form-control">
          <label for="">Telefono</label>
          <input type="text" wire:model="telefono" class="form-control">
          <label for="">Correo</label>
          <input type="text" wire:model="correo" class="form-control">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click="guardarCliente()">Guardar Cliente</button>
      </div>
    </div>
  </div>
</div>
                                </div>
                            </div>
                            <div>
                                <h5>Cliente: {{ ($cliente)?$cliente->nombre_completo:'Cliente No Existe' }}</h5>
                                <h5>Telefono: {{ ($cliente)?$cliente->telefono:'' }}</h5>
                                <h5>Correo: {{ ($cliente)?$cliente->correo:'' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-block btn-primary" wire:click="guardarPedido()">Guardar Pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>