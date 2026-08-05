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
        // 1. Tabel Master Sektor
        Schema::create('sektors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sektor');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 2. Tabel Master Layanan
        Schema::create('master_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sektor_id')->constrained('sektors')->onDelete('cascade');
            $table->string('nama_layanan');
            $table->string('slug');
            $table->json('persyaratan_umum')->nullable();
            $table->timestamps();
        });

        // 3. Tabel Instansi / Penyelenggara
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_instansi', 50)->unique();
            $table->string('nama_instansi');
            $table->string('jenis', 50)->default('kecamatan');
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

        // 4. Tabel Layanan Instansi (Spesifik per Instansi)
        Schema::create('layanan_instansis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instansi_id')->constrained('instansis')->onDelete('cascade');
            $table->foreignId('master_layanan_id')->constrained('master_layanans')->onDelete('cascade');
            $table->string('external_id', 100)->nullable();
            $table->string('status_approval', 50)->default('disetujui');
            $table->string('status_layanan', 50)->default('aktif');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->text('catatan_revisi')->nullable();
            $table->string('waktu_penyelesaian')->nullable();
            $table->string('biaya_tarif')->nullable();
            $table->text('produk_pelayanan')->nullable();
            $table->json('persyaratan_khusus')->nullable();
            $table->json('prosedur')->nullable();
            $table->json('pengaduan_channels')->nullable();
            $table->string('created_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_instansis');
        Schema::dropIfExists('instansis');
        Schema::dropIfExists('master_layanans');
        Schema::dropIfExists('sektors');
    }
};
