<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Antrian;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian');
            $table->foreignId('user_id')->nullable();
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('no_hp');
            $table->string('no_ktp');
            $table->enum('poli', ['umum', 'gigi', 'tht', 'lansia & disabilitas', 'balita', 'kia & kb', 'nifas/pnc']);
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->text('keluhan');
            $table->boolean('is_call')->default(false);
            $table->date('tanggal_antrian')->default(Carbon::now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrians');
    }
};
