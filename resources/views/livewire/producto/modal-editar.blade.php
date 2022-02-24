
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <select wire:model="categoria_id" class="form-control">
            @foreach ($categorias as $cat)
            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>              
            @endforeach
          </select>
          <label for="">Descripción</label>
          <textarea class="form-control" wire:model="descripcion"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" wire:click="modificar()">Modificar producto</button>
        </div>
      </div>
    </div>
  </div>
