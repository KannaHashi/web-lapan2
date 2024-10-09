<?php

namespace App\Livewire;

use Livewire\Component;

class SatelitOption extends Component
{
    public $datas;
    public $selectedData;

    public function mount($datas)
    {
        // Inisialisasi data dari parent component
        $this->selectedData = null;
        $this->datas = $datas;
    }

    public function selectData($id)
    {
        if ($id) {
            // Cari data yang sesuai dengan id yang dipilih dari $datas (bukan dari model Modis)
            $selectedData = collect($this->datas)->firstWhere('id', $id);
    
            if ($selectedData) {
                $this->selectedData = $selectedData['id'];
    
                // Ambil data satelit dari item yang dipilih (jika ada)
                $selectedSatelit = $selectedData['satelit'] ?? null;
    
            }
        } else {
            $selectedSatelit = null;
        }

        // Dispatch event dengan data satelit yang dipilih
        $this->dispatch('satelitSelected', satelit: $selectedSatelit);
    }

    public function render()
    {
        // Temukan data yang dipilih berdasarkan id dari $datas
        $selectedData = collect($this->datas)->firstWhere('id', $this->selectedData);

        return view('livewire.satelit-option', [
            'datas' => $this->datas,
            'selectedData' => $selectedData,
        ]);
    }
}
