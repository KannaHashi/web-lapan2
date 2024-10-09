<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;

use App\Models\Modis;
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

    public function mount()
    {
        // Mengambil semua data dari model Modis
        $this->modis = Modis::all();
        $this->selectedData = null;
    }

    public function filterData()
    {
        $this->modis = DB::table('modis')
            ->where('nama_data', $this->namadata)
            ->where('satelit', $this->satelit)
            ->whereBetween('tanggal', [$this->datestart, $this->dateend])
            ->get();

            $this->tanggal = $this->datestart . '-' . $this->dateend;
            // $this->tanggal = Carbon::parse($this->datestart, null). ' - '.  Carbon::parse($this->dateend, null);
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

namespace App\Livewire;

use Livewire\Component;
use App\Models\Modis;

class DataModis extends Component
{
    public $modis;
    public $namadata;
    public $datestart;
    public $dateend;
    public $satelit;
    public $tanggal;

    public $selectedData;

    public function mount()
    {
        // Load initial data
        $this->modis = Modis::all();
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
            'tanggal' => $this->tanggal,
            'datestart' => $this->datestart,
            'dateend' => $this->dateend,
            'selectedData' => $this->selectedData ? Modis::find($this->selectedData) : null,
        ]);
    }
}
