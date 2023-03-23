<?php

namespace App\Http\Livewire;

use App\Models\Sorteo;
use Livewire\Component;
use Livewire\WithPagination;

class Sorteos extends Component
{
    use WithPagination;
    public $search;
    public $etiqueta;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {        
        $sorteos = Sorteo::where('name', 'LIKE','%'. $this->search .'%')->where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
        
        return view('livewire.sorteos', compact('sorteos'));
    }
}