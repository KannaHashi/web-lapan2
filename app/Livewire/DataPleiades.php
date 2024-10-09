<?php

namespace App\Livewire;

use App\Models\Pleiades;
use Livewire\Component;
use Livewire\Attributes\On;

class DataPleiades extends Component
{
    public $pleiades;
    public $tanggal;

    public $namadata;
    public $datestart;
    public $dateend;

    public $satelit;
    public $selectedData;

    public function mount()
    {
        // Mengambil semua data dari model pleiades
        $this->pleiades = Pleiades::all();
        $this->selectedData = null;
    }

    #[On('satelitSelected')]
    public function satelitSelected($satelit)
    {
        // Mengupdate variabel parent dengan nilai yang dipilih dari child
        $this->satelit = $satelit;
    }

    public function filterData()
    {
        // Inisialisasi query
        $query = Pleiades::query();

        // Filter berdasarkan nama_data jika ada
        if (!empty($this->namadata)) {
            $query->where('nama_data', 'like', '%' . $this->namadata . '%');
        }

        // Filter berdasarkan satelit jika ada
        if (!empty($this->satelit)) {
            $query->where('satelit', $this->satelit);
        }

        // Filter berdasarkan rentang tanggal jika ada
        if (!empty($this->datestart) && !empty($this->dateend)) {
            $query->whereBetween('tanggal', [$this->datestart, $this->dateend]);
            $this->tanggal = $this->datestart . ' - ' . $this->dateend;
        } else {
            $this->tanggal = "kosong";
        }

        // Update data modis
        $this->pleiades = $query->get();
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
