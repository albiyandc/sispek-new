-- SQL Dump untuk dummy_pelayanan_publik.json
-- Database: sispak_pelayanan
-- Dibuat otomatis sesuai struktur data pada file dummy_pelayanan_publik.json

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `layanan_publik`;
DROP TABLE IF EXISTS `kecamatans`;

CREATE TABLE `kecamatans` (
  `id` VARCHAR(20) NOT NULL,
  `nama_kecamatan` VARCHAR(255) NOT NULL,
  `subdomain` VARCHAR(255) NULL,
  `maklumat_isi` TEXT NULL,
  `maklumat_penandatangan` VARCHAR(255) NULL,
  `ikm_nilai` VARCHAR(50) NULL,
  `ikm_kategori` VARCHAR(100) NULL,
  `ikm_tahun` VARCHAR(20) NULL,
  `ikm_responden` VARCHAR(50) NULL,
  `ikm_periode` VARCHAR(255) NULL,
  `jam_kerja` TEXT NULL,
  `jumlah_pelaksana` VARCHAR(255) NULL,
  `penanggung_jawab` VARCHAR(255) NULL,
  `kualifikasi_pelaksana` TEXT NULL,
  `alamat` TEXT NULL,
  `telepon` VARCHAR(50) NULL,
  `email` VARCHAR(100) NULL,
  `mekanisme_pengaduan_global` TEXT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `layanan_publik` (
  `id_layanan` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `simat_layanan_id` BIGINT UNSIGNED NULL,
  `kecamatan_id` VARCHAR(20) NULL,
  `nama_layanan` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NULL,
  `persyaratan` TEXT NULL,
  `sistem_mekanisme_prosedur` TEXT NULL,
  `waktu_penyelesaian` VARCHAR(255) NULL,
  `biaya_tarif` VARCHAR(255) NULL,
  `produk_pelayanan` VARCHAR(255) NULL,
  `jumlah_pelaksana_teknis` VARCHAR(255) NULL,
  `penanggung_jawab_teknis` VARCHAR(255) NULL,
  `kualifikasi_pelaksana` TEXT NULL,
  `pengaduan_langsung` TEXT NULL,
  `mekanisme_pengaduan_tindak_lanjut` TEXT NULL,
  `pengaduan_channels` JSON NULL,
  `pengaduan_pelayanan` TEXT NULL,
  `status_layanan` VARCHAR(50) NOT NULL DEFAULT 'aktif',
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_layanan`),
  KEY `layanan_publik_kecamatan_id_index` (`kecamatan_id`),
  CONSTRAINT `layanan_publik_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kecamatans` (`id`, `nama_kecamatan`, `subdomain`, `maklumat_isi`, `maklumat_penandatangan`, `ikm_nilai`, `ikm_kategori`, `ikm_tahun`, `ikm_responden`, `ikm_periode`, `jam_kerja`, `jumlah_pelaksana`, `penanggung_jawab`, `kualifikasi_pelaksana`, `alamat`, `telepon`, `email`, `mekanisme_pengaduan_global`) VALUES
('327806', 'Kecamatan Cibeureum', 'kecamatan-cibeureum', 'Dengan ini kami berjanji akan memberikan pelayanan prima sesuai dengan Standar Pelayanan yang ditetapkan, dan apabila kami tidak menepati janji ini, kami siap menerima sanksi sesuai Peraturan Perundang-undangan yang berlaku.', 'Camat Cibeureum (H. Rahman, S.Sos, M.Si)', '88.35', 'A (SANGAT BAIK)', '2025', '103 Orang', 'Triwulan III dan Triwulan IV s.d. Bulan Oktober 2025 (Semester 2)', 'Senin – Kamis: 08.00 – 16.00 WIB | Jumat: 08.00 – 16.30 WIB', '4 (empat) orang petugas loket pelayanan', 'Kasi Tata Pemerintahan dan Pelayanan Publik', '• Pendidikan minimum SMA/Sederajat\n• Mampu mengoperasikan komputer\n• Mempunyai kemampuan berkomunikasi yang baik', 'Jl. KH. Khoer Affandi No. 160, Tasikmalaya (Kode Pos 46196)', '081312226045', 'kecamatan.cibeureum@tasikmalayakota.go.id', '• Pengaduan Ringan: Ditanggapi dan diselesaikan langsung oleh petugas loket atau via WhatsApp.\n• Pengaduan Sedang/Berat: Dikoordinasikan dengan Kepala Seksi / Camat dengan batas waktu penyelesaian maksimal 1 (satu) minggu.'),
('327801', 'Kecamatan Cihideung', 'kecamatan-cihideung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Cihideung No. 12, Tasikmalaya', '(0265) 331234', 'kecamatan.cihideung@tasikmalayakota.go.id', NULL);

INSERT INTO `layanan_publik` (`id_layanan`, `simat_layanan_id`, `kecamatan_id`, `nama_layanan`, `slug`, `persyaratan`, `sistem_mekanisme_prosedur`, `waktu_penyelesaian`, `biaya_tarif`, `produk_pelayanan`, `jumlah_pelaksana_teknis`, `penanggung_jawab_teknis`, `kualifikasi_pelaksana`, `pengaduan_langsung`, `mekanisme_pengaduan_tindak_lanjut`, `pengaduan_channels`, `pengaduan_pelayanan`, `status_layanan`) VALUES
(1, 1, '327806', 'Registrasi Surat Keterangan Pindah Penduduk WNI Antar Kecamatan Dalam Satu Daerah', 'registrasi-surat-keterangan-pindah-penduduk-wni-antar-kecamatan-dalam-satu-daerah', 'Surat Keterangan Pindah Penduduk Antar Kecamatan yang telah ditandatangani pejabat Kelurahan.\nFormulir Permohonan Pindah yang telah diisi.\nFotocopy KTP dan KK pemohon (masing-masing 1 lembar).', 'Pemohon datang ke loket pelayanan dengan membawa berkas persyaratan.\nPemohon menyerahkan berkas kepada petugas.\nPemohon menunggu berkas diverifikasi dan diproses.\nPemohon menerima Surat Keterangan Pindah yang telah diregister dan ditandatangani.', '15 – 30 menit (jika persyaratan lengkap dan pejabat ada di tempat)', 'Gratis', 'Surat Keterangan Pindah Penduduk WNI Antar Kecamatan dalam Satu Daerah yang telah diregister dan ditandatangani', '4 orang pelaksana teknis', 'Kasi Tata Pemerintahan dan Pelayanan Publik', '• Pendidikan minimum SMA/Sederajat\n• Mampu mengoperasikan komputer\n• Mempunyai kemampuan berkomunikasi yang baik', 'Melalui petugas di loket pelayanan Kantor Kec. Cibeureum', '• Pengaduan Ringan: Ditanggapi dan diselesaikan langsung oleh petugas loket atau via WhatsApp.\n• Pengaduan Sedang/Berat: Dikoordinasikan dengan Kepala Seksi / Camat dengan batas waktu penyelesaian maksimal 1 (satu) minggu.', '[{"jenis":"whatsapp","nilai":"081312226045"},{"jenis":"kotak_pengaduan","nilai":"Ruang pelayanan Kantor Kec. Cibeureum (Jl. KH. Khoer Affandi No. 160)"}]', 'Melalui petugas di loket pelayanan Kantor Kec. Cibeureum', 'aktif'),
(2, 2, '327801', 'Pengurusan Surat Keterangan Usaha (SKU)', 'pengurusan-surat-keterangan-usaha-sku', 'Surat Pengantar dari Kelurahan setempat.\nFotocopy KTP dan KK.', 'Pemohon menyerahkan berkas ke petugas.\nPetugas memproses dokumen SKU.', '1 Hari Kerja', 'Gratis', 'Surat Keterangan Usaha (SKU)', NULL, NULL, NULL, 'Loket Pelayanan Kantor Kecamatan Cihideung', NULL, '[{"jenis":"email","nilai":"pengaduan.cihideung@tasikmalayakota.go.id"}]', 'Loket Pelayanan Kantor Kecamatan Cihideung', 'aktif');

SET FOREIGN_KEY_CHECKS=1;
