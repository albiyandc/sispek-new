<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('nama_kecamatan');
            $table->string('subdomain')->nullable();
            $table->text('maklumat_isi')->nullable();
            $table->string('maklumat_penandatangan')->nullable();
            $table->string('ikm_nilai', 50)->nullable();
            $table->string('ikm_kategori', 100)->nullable();
            $table->string('ikm_tahun', 20)->nullable();
            $table->string('ikm_responden', 50)->nullable();
            $table->string('ikm_periode')->nullable();
            $table->text('jam_kerja')->nullable();
            $table->string('jumlah_pelaksana')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->text('kualifikasi_pelaksana')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('mekanisme_pengaduan_global')->nullable();
            $table->timestamps();
        });

        Schema::create('layanan_publik', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->unsignedBigInteger('simat_layanan_id')->nullable();
            $table->string('kecamatan_id', 20)->nullable();
            $table->string('nama_layanan');
            $table->string('slug')->nullable();
            $table->text('persyaratan')->nullable();
            $table->text('sistem_mekanisme_prosedur')->nullable();
            $table->string('waktu_penyelesaian')->nullable();
            $table->string('biaya_tarif')->nullable();
            $table->string('produk_pelayanan')->nullable();
            $table->string('jumlah_pelaksana_teknis')->nullable();
            $table->string('penanggung_jawab_teknis')->nullable();
            $table->text('kualifikasi_pelaksana')->nullable();
            $table->text('pengaduan_langsung')->nullable();
            $table->text('mekanisme_pengaduan_tindak_lanjut')->nullable();
            $table->json('pengaduan_channels')->nullable();
            $table->text('pengaduan_pelayanan')->nullable();
            $table->string('status_layanan', 50)->default('aktif');
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_publik');
        Schema::dropIfExists('kecamatans');
    }
};
