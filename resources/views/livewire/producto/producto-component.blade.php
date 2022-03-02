<div>
  <div class="row">

    <div class="col-md-12">
      <div class="card card-outline-primary">
        <div class="card-body">
          <!-- Nuevo producto -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nuevo Producto
          </button>

          <!-- Modal -->
          <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label for="">Ingrese Nombre</label>
                  <input type="text" class="form-control @error('nombre')is-invalid @enderror" wire:model="nombre">
                  @error("nombre")
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <label for="">Precio</label>
                  <input type="number" step="0.01" class="form-control" wire:model="precio">
                  <label for="">Ingrese Cantidad</label>
                  <input type="number" class="form-control @error('cantidad')is-invalid @enderror" wire:model="cantidad">
                  @error("cantidad")
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <label for="">Categoria</label>
                  <select wire:model="categoria_id" class="form-control">
                    <option value=""></option>
                    @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                  </select>
                  @error("categoria_id")
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  {{ $categoria_id }}
                  <label for="">Descripción</label>
                  <textarea class="form-control" wire:model="descripcion"></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" wire:click="guardarProducto()">Guardar producto</button>
                </div>
                {{ $categoria_id }}
              </div>
            </div>
          </div>

          @include("livewire.producto.modal-imagen")
          @include("livewire.producto.modal-editar")
          <!-- end nuevo producto -->

          @if (session()->has('mensaje'))
          <div class="alert alert-success">
            {{ session('mensaje') }}
          </div>
          @endif


          <!-- Lista Producto -->
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>CATEGORIA</th>
                <th>IMG</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productos as $prod)

              <tr>
                <td>{{ $prod->id }}</td>
                <td>{{ $prod->nombre }}</td>
                <td>{{ $prod->precio }}</td>
                <td>{{ $prod->cantidad }}</td>
                <td>{{ $prod->categoria->nombre }}</td>
                <td>
                  <!--a href="{{ asset('imagenes/'.$prod->imagen) }}" target="_blank">{{ asset('imagenes/'.$prod->imagen) }}</a-->
                  <img src="{{ asset('imagenes/'.$prod->imagen) }}" width="70px" alt="">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCargaImagen" wire:click="editarImagen({{ $prod->id }})">
                    <i class="fa fa-image"></i>
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal" wire:click="editar({{ $prod->id }})">
                    <i class="fa fa-edit"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>

          {{ $productos->links() }}

          <!-- End Lista Producto -->

          <!-- paginación producto -->

        </div>
      </div>
    </div>

  </div>

</div>