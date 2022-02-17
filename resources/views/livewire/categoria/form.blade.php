<label for="n">Nombre Categoria:</label>
<input type="text" wire:model="nombre">
@error('nombre') <span class="error">{{ $message }}</span> @enderror
<input type="text" wire:model="detalle">
<button wire:click="guardarCategoria">Guardar</button>