<?php

namespace App\Livewire;

use App\Models\Modis;
use App\Models\Pleiades;
use Livewire\Component;

class SatelitOption extends Component
{
    public $datas;
    public $selectedData;

    public function mount($datas)
    {
        // Mengambil semua data dari model Modis
        $this->selectedData = null;
        $this->datas = $datas;
    }

    public function selectData($id)
    {
        $this->selectedData = $id;
    }

    public function render()
    {
        return view('livewire.satelit-option', [
            'datas' => $this->datas,
            'selectedData' => $this->selectedData ? Modis::find($this->selectedData) : null,
        ]);
    }
}
