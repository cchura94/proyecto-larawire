<div wire:ignore.self class="modal fade" id="ModalCargaImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Carga de Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div wire:loading wire:target="imagen">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>


                <input type="file" wire:model="imagen">
                @error('imagen') <span class="error">{{ $message }}</span> @enderror




                @if($prod_aux)
                <img src="{{ asset('imagenes/'.$prod_aux->imagen) }}" width="100%">
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" wire:click="subirImagen()">Guardar Imagen</button>
            </div>
        </div>
    </div>
</div>