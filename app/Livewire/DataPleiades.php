<?php

namespace App\Livewire;

use App\Models\Pleiades;
use Livewire\Component;

class DataPleiades extends Component
{
    public $pleiades;
    public $selectedData;

    public function mount()
    {
        // Mengambil semua data dari model pleiades
        $this->pleiades = Pleiades::all();
        $this->selectedData = null;
    }

    public function selectData($id)
    {
        $this->selectedData = $id;
    }

    public function render()
    {
        return view('livewire.data-pleiades', [
            'pleiades' => $this->pleiades,
            'selectedData' => $this->selectedData ? Pleiades::find($this->selectedData) : null,
        ]);
    }
}
