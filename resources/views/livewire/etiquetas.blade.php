<div>
    <div class="card">
        <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="ingrese nombre de sorteo a buscar">
        </div>

        @if ($etiquetas->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DE LA ETIQUETA</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etiquetas as $sorteo)
                            @if ($sorteo->user_id == auth()->user()->id)
                                <tr>
                                    <td>{{ $sorteo->id }}</td>
                                    <td>{{ $sorteo->name }}</td>
                                    

                                    <td width="10px">
                                        <form action="{{ route('admin.etiquetas.destroy', $sorteo) }}" method="get">
                                            @csrf
                                            @method('delete')
                                            <button data-name="{{ $sorteo->name }}" type="submit"
                                                class="btn btn-danger btn-sm delete-confirm"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
     </div>
    <div class="row">{{ $etiquetas->links() }} </div>
@else
    <div class="card-body">
        <strong>No existen etiquetas con ese nombre por favor verifica la etiqueta que buscas</strong>
    </div>

    @endif

</div>
