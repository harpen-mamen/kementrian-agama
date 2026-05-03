<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->nullOnDelete();
        });

        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete();
            $table->string('nama');
        });

        Schema::create('agamas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        Schema::create('rumah_ibadah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->foreignId('agama_id')->constrained('agamas')->restrictOnDelete();
            $table->string('denominasi')->nullable();
            $table->text('alamat');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->restrictOnDelete();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('jumlah_jemaat')->nullable();
            $table->integer('jumlah_kk')->nullable();
            $table->integer('kapasitas')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->text('jadwal_ibadah')->nullable();
            $table->string('nama_pengurus')->nullable();
            $table->string('kontak_resmi')->nullable();
            $table->string('status_data')->default('draft');
            $table->text('catatan_verifikasi')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('foto_rumah_ibadah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumah_ibadah_id')->constrained('rumah_ibadah')->cascadeOnDelete();
            $table->string('file_path');
            $table->string('keterangan')->nullable();
            $table->boolean('is_utama')->default(false);
            $table->timestamps();
        });

        Schema::create('sekolah_keagamaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->foreignId('agama_id')->constrained('agamas')->restrictOnDelete();
            $table->text('alamat');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->restrictOnDelete();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->integer('jumlah_guru')->nullable();
            $table->string('status_izin')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('kontak')->nullable();
            $table->string('status_data')->default('draft');
            $table->text('catatan_verifikasi')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('data_umat', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->restrictOnDelete();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->foreignId('agama_id')->constrained('agamas')->restrictOnDelete();
            $table->integer('jumlah');
            $table->string('sumber_data')->nullable();
            $table->string('status_data')->default('draft');
            $table->text('catatan_verifikasi')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('pengajuan_data', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_data');
            $table->unsignedBigInteger('data_id');
            $table->foreignId('submitted_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status');
            $table->text('catatan')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_berita_id')->nullable()->constrained('kategori_berita')->nullOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('isi');
            $table->string('gambar')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('layanan_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('kontak');
            $table->string('kategori');
            $table->text('isi_laporan');
            $table->string('status')->default('diterima');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });

        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('aksi');
            $table->string('tabel')->nullable();
            $table->unsignedBigInteger('data_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_id']);
        });

        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('layanan_pengaduan');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('kategori_berita');
        Schema::dropIfExists('pengajuan_data');
        Schema::dropIfExists('data_umat');
        Schema::dropIfExists('sekolah_keagamaan');
        Schema::dropIfExists('foto_rumah_ibadah');
        Schema::dropIfExists('rumah_ibadah');
        Schema::dropIfExists('agamas');
        Schema::dropIfExists('desas');
        Schema::dropIfExists('kecamatans');
    }
};
