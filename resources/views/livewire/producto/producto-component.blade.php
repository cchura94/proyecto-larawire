<div>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
          <input type="number" class="form-control" value="1" wire:model="categoria_id">
          <label for="">Descripción</label>
          <textarea class="form-control" wire:model="descripcion"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" wire:click="guardarProducto()">Guardar producto</button>
        </div>
      </div>
    </div>
  </div>

  @include("livewire.producto.modal-imagen")
  <!-- end nuevo producto -->

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
        <td>{{ $prod->categoria_id }}</td>
        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCargaImagen" wire:click="editarImagen({{ $prod->id }})">
            Imagen
          </button>
        </td>
        <td>

        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

  {{ $productos->links() }}

  <!-- End Lista Producto -->

  <!-- paginación producto -->
</div>