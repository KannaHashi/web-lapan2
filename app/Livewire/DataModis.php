<?php

namespace App\Livewire;

use App\Models\Modis;
use Livewire\Component;

class DataModis extends Component
{
    public $modis;
    public $selectedData;

    public function mount()
    {
        // Mengambil semua data dari model Modis
        $this->modis = Modis::all();
        $this->selectedData = null;
    }

    public function selectData($id)
    {
        $this->selectedData = $id;
    }

    public function render()
    {
        return view('livewire.data-modis', [
            'modis' => $this->modis,
            'selectedData' => $this->selectedData ? Modis::find($this->selectedData) : null,
        ]);
    }
}
