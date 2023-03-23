<div class="card">
    <div class="card-body ">

        <div class="card header">
            @if (session('danger'))
            <div class="alert alert-danger" role="alert">
                {{session('danger')}}                
            </div>
            @endif
        </div>
        
        <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="ingrese nombre de sorteo a buscar">
        </div>


        @if($sorteos->count())

            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                
                                @foreach ($sorteos as $sorteo)
                                    <div class="cont">     
                                        @if ($sorteo->user_id == auth()->user()->id && $sorteo->status == '1')                      
                                                                                
                                                    <a href="{{route('admin.sorteos.girar',$sorteo)}}">
                                                        <h2 class="size">{{$sorteo->name}}</h2> 
                                                    </a>     
                                                    <hr><hr>                 
                                    </div> 
                                        @endif
                                @endforeach     

                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="row">{{ $sorteos->links() }} </div>  
         
        @else
        
            <div class="card-body">
                <strong>No existen sorteos con ese nombre por favor verifica el sorteo que buscas</strong>
            </div>    
            
        @endif

    </div>
</div>