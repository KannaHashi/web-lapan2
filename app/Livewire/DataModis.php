<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Modis;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class DataModis extends Component
{
    public $modis;
    public $tanggal;

    public $namadata;
    public $datestart;
    public $dateend;

    public $satelit;

    public $selectedData;

    // protected $listeners = ['satelitSelected'];

    public function mount()
    {
        // Mengambil semua data dari model Modis
        $this->modis = Modis::all();
        $this->selectedData = null;
    }

    #[On('satelitSelected')]
    public function satelitSelected($satelit)
    {
        // Mengupdate variabel parent dengan data yang dipilih berdasarkan ID dari child
        $selectedModis = Modis::find($satelit);

        // Jika data ditemukan, update variabel satelit
        if ($selectedModis) {
            $this->satelit = $selectedModis->satelit;
        } else {
            $this->satelit = null;
        }

        // Mengupdate variabel parent dengan nilai yang dipilih dari child
        $this->satelit = $satelit;
    }

    public function filterData()
    {
        // Inisialisasi query
        $query = Modis::query();

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
        $this->modis = $query->get();
    }

    public function selectData($id)
    {
        $this->selectedData = $id;
    }

    public function render()
    {
        return view('livewire.data-modis', [
            'modis' => $this->modis,
            'datestart' => $this->datestart,
            'dateend' => $this->dateend,
            'selectedData' => $this->selectedData ? Modis::find($this->selectedData) : null,
        ]);
    }
}
