<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowJadwal extends Component
{
    public $jadwals; // Data jadwal dokter
    public $nip, $nama_dokter, $poli, $sesi, $jam_mulai, $jam_selesai; 
    public $updateMode;
    public $search;
    public $poli_filter; 
    protected $queryString = ['search', 'poli_filter']; 

    public function render()
    {
        $jadwal_dokter = JadwalDokter::query()
        ->when($this->poli_filter, function($query) {
            $query->where('poli', $this->poli_filter);
        })
        ->when($this->search, function($query) {
            $query->where('nama_dokter', 'like', '%' . $this->search . '%')
                  ->orWhere('nip', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);


        $poli_list = JadwalDokter::select('poli')->distinct()->pluck('poli');

        return view('livewire.jadwal.show-jadwal', [
            'jadwal_dokter' => $jadwal_dokter,
            'poli_list' => $poli_list
        ]);
    }
    

    public function resetInputFields()
    {
        $this->nip = '';
        $this->nama_dokter = '';
        $this->poli = '';
        $this->sesi = '';
        $this->jam_mulai = '';
        $this->jam_selesai = '';
    }

    public function store()
    {
        $this->validate([
            'nip' => 'required|unique:jadwal_dokter',
            'nama_dokter' => 'required',
            'poli' => 'required',
            'sesi' => 'required|in:Pagi,Siang,Sore,Malam',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        JadwalDokter::create([
            'nip' => $this->nip,
            'nama_dokter' => $this->nama_dokter,
            'poli' => $this->poli,
            'sesi' => $this->sesi,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
        ]);

        session()->flash('message', 'Jadwal dokter berhasil ditambahkan.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $this->nip = $jadwal->nip;
        $this->nama_dokter = $jadwal->nama_dokter;
        $this->poli = $jadwal->poli;
        $this->sesi = $jadwal->sesi;
        $this->jam_mulai = $jadwal->jam_mulai;
        $this->jam_selesai = $jadwal->jam_selesai;
        $this->updateMode = true;
    }

    public function update($id)
    {
        $this->validate([
            'nip' => 'required|unique:jadwal_dokter,nip,' . $id,
            'nama_dokter' => 'required',
            'poli' => 'required',
            'sesi' => 'required|in:Pagi,Siang,Sore,Malam',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->update([
            'nip' => $this->nip,
            'nama_dokter' => $this->nama_dokter,
            'poli' => $this->poli,
            'sesi' => $this->sesi,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
        ]);
    

        $this->updateMode = false;
        session()->flash('message', 'Jadwal dokter berhasil diperbarui.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        JadwalDokter::findOrFail($id)->delete();
        session()->flash('message', 'Jadwal dokter berhasil dihapus.');
    }

    public function resetFilters()
    {
        $this->reset(['poli_filter', 'search']);
    }

    
}
