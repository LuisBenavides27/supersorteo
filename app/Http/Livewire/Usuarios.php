<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{

    use WithPagination;
    public $search;
   // public $users;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE','%'. $this->search .'%')
                        ->Orwhere('email', 'LIKE','%'. $this->search .'%')
                        ->paginate(10);
        return view('livewire.usuarios', compact('users'));
    }
}
