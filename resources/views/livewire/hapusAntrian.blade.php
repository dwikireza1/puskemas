<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

class HapusAntrianLivewire extends Component
{
    public function hapusAntrian()
    {
        DB::table('antrian')->where('tanggal', '<', now()->toDateString())->delete();
        Log::info('Antrean lama berhasil dihapus.');
    }

    public function mount()
    {
        $this->hapusAntrian();
    }

    public function render()
    {
        return view('livewire.hapus-antrian');
    }
}