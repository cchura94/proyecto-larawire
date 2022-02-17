<h1>Lista de Categoria</h1>

<table class="w-full whitespace-no-wrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DETALLE</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->nombre }}</td>
            <td>{{ $cat->detalle }}</td>
            <td>
                <button wire:click="editarCategoria">editar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>