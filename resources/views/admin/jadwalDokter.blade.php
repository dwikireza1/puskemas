<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Log;

class AdminJadwalDokter extends Component
{
    public $dokters;
    public $nama, $spesialis, $jadwal;

    public function mount()
    {
        $this->dokters = JadwalDokter::all();
    }

    public function tambahJadwal()
    {
        JadwalDokter::create([
            'nama' => $this->nama,
            'spesialis' => $this->spesialis,
            'jadwal' => $this->jadwal,
        ]);
        Log::info('Jadwal dokter ditambahkan: ' . $this->nama);
        $this->resetInputFields();
        session()->flash('success', 'Jadwal dokter berhasil ditambahkan!');
        $this->dokters = JadwalDokter::all();
    }

    public function hapusJadwal(JadwalDokter $dokter)
    {
        $dokter->delete();
        Log::info('Jadwal dokter dihapus: ' . $dokter->nama);
        session()->flash('success', 'Jadwal dokter berhasil dihapus!');
        $this->dokters = JadwalDokter::all();
    }

    private function resetInputFields()
    {
        $this->nama = '';
        $this->spesialis = '';
        $this->jadwal = '';
    }

    public function render()
    {
        return view('livewire.admin-jadwal-dokter', ['dokters' => $this->dokters]);
    }
}