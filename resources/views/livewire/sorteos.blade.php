<div>
    <div class="card">
        <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="ingrese nombre de sorteo a buscar">
        </div>

        <div class="card-header">
            <a class="btn btn-outline-primary" href="{{ route('admin.sorteos.create') }}"> Crear Sorteo </a>
            <a class="btn btn-outline-success" href="{{route('admin.etiquetas.create')}}">Crear Etiqueta</a> 
            <a class="btn btn-outline-warning" href="{{route('admin.clientes.create')}}">Generar Reportes</a> 
        </div>
       
        @if ($sorteos->count())

            <div class="card-body">

                <div class="card header">
                    @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{session('danger')}}                
                    </div>
                    @endif
                </div>

                <br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DEL SORTEO</th>
                            <th>ESTADO</th>
                            <th>TIPO</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sorteos as $sorteo)
                            @if ($sorteo->user_id == auth()->user()->id)
                                <tr>
                                    <td>{{ $sorteo->id }}</td>
                                    <td>{{ $sorteo->name }}</td>
                                    <td>
                                        @if ($sorteo->status == 1)
                                            Sorteo Pendiente
                                        @else
                                            Sorteo Realizado
                                        @endif
                                    </td>
                                    <td>
                                        @if ($sorteo->grupo == 0)
                                            Pendiente
                                        @elseif($sorteo->grupo == 1)
                                            Sorteo Simple
                                        @else
                                            {{-- @foreach ($etiqueta as $item)
                                                {{$item->name}}
                                            @endforeach --}}                                   
                                            Sorteo Compuesto
                                        @endif                                        
                                    </td>
                                 
                                    @if ($sorteo->status == 1 && $sorteo->grupo == 0)
                                        <td width="10px">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.sorteos.edit', $sorteo) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-up-square-fill"
                                                    viewBox="0 0 16 16">
                                                    <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 
                                                        1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 
                                                        0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                                                </svg>
                                            </a>
                                        </td>
                                    @else
                                        <td width="10px"><a></a></td>
                                    @endif
                                    
{{--                                     @if ($sorteo->status == 1 )                                        
                                    
                                        <td width="10px">
                                            <a class="btn btn-success btn-sm" href="{{route('admin.clientes.edit', $sorteo)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                                    class="bi bi-card-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 
                                                    1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 
                                                    0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505
                                                    0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    @else
                                        <td width="10px"><a></a></td>
                                    @endif --}}

                                    <td width="10px">
                                        <form action="{{ route('admin.sorteos.destroy', $sorteo) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button data-name="{{ $sorteo->name }}" type="submit"
                                                class="btn btn-danger btn-sm delete-confirm"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('admin.reporte.generar', $sorteo) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 
                                                8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
     </div>
    <div class="row">{{ $sorteos->links() }} </div>
@else
    <div class="card-body">
        <strong>No existen sorteos con ese nombre por favor verifica el sorteo que buscas</strong>
    </div>

    @endif

</div>
