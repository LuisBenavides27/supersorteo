<?php

namespace App\Http\Livewire;

use App\Models\Grupo;
use Livewire\Component;
use Livewire\WithPagination;

class Etiquetas extends Component
{
    use WithPagination;
    public $search;
    //public $etiqueta;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
       // $etiquetas = Grupo::where('user_id', auth()->user()->id)->get();
        $etiquetas = Grupo::where('name', 'LIKE','%'. $this->search .'%')->where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.etiquetas',compact('etiquetas'));
    }
}
