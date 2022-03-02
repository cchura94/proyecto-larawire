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
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-block btn-primary">Guardar Pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>