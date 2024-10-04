<?php

namespace App\Livewire;

use App\Models\Sensors;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DataKatalog extends Component
{
    public $sensor;
    public $selectedData;

    public function mount()
    {
        // $this->datas = DB::table('Modis')->pluck('satelit');
        $this->sensor = Sensors::all();
        $this->selectedData = null;
    }

    public function selectData($id)
    {
        $this->selectedData = $id;
    }

    public function render()
    {
        return view('livewire.satelit-option', [
            'sensor' => $this->sensor,
            'selectedData' => $this->selectedData ? Sensors::find($this->selectedData) : null,
        ]);
    }
}
