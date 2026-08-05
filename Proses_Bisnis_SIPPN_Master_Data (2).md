# Proses Bisnis Sistem Layanan Publik (Konsep SIPPN + Master Data)

## 1. Tujuan

Sistem mengadopsi alur pencarian seperti SIPPN, namun menggunakan
**Master Data** agar data layanan tidak berulang dan mudah dipelihara.

------------------------------------------------------------------------

# 2. Persiapan Awal (One Time Setup)

Dilakukan oleh **Admin Diskominfo**.

## 2.1 Membuat Master Sektor

Contoh: - Kependudukan & Catatan Sipil - Kesehatan - Pendidikan -
Sosial - Perizinan & Investasi - dan lain-lain

## 2.2 Membuat Master Layanan

Contoh:

Nama Layanan: - Penerbitan KTP-el

Sektor: - Kependudukan & Catatan Sipil

Persyaratan Umum: - Fotokopi KK - Surat Pengantar RT/RW - dll

Seluruh layanan hasil konsolidasi (±295 layanan) dimasukkan sebagai
**Master Layanan**.

> Proses ini hanya dilakukan sekali di awal implementasi.

------------------------------------------------------------------------

# 3. Registrasi Instansi

Admin Diskominfo mendaftarkan seluruh instansi.

Contoh: - Kelurahan Nagarasari - Kelurahan Cibeureum - Kelurahan
Sambongjaya - Disdukcapil Kota Tasikmalaya - dan instansi lainnya.

------------------------------------------------------------------------

# 4. Admin Instansi Mengaktifkan Layanan

Admin instansi login ke sistem.

Langkah:

1.  Klik **Tambah Layanan**
2.  Cari layanan pada Master Layanan
3.  Pilih layanan yang tersedia

Contoh:

-   [x] Penerbitan KTP-el
-   [x] Kartu Keluarga
-   [x] Surat Domisili

Admin **tidak perlu mengetik ulang** nama layanan maupun persyaratan
umum.

Kemudian admin mengisi data khusus instansi seperti:

-   Jam pelayanan
-   Kontak
-   Lokasi
-   Status layanan
-   Persyaratan tambahan (jika ada)

Opsional: Sistem dapat memberikan rekomendasi menggunakan **fuzzy
matching** apabila nama layanan yang dicari sangat mirip dengan Master
Layanan yang sudah ada.

------------------------------------------------------------------------

# 4.1 Persetujuan (Approval)

Setelah admin instansi menyimpan data, layanan **tidak langsung tayang**.
Status awal: **Menunggu Persetujuan**.

Verifikator Diskominfo (APTIKA) meninjau dua hal:

-   Data khusus instansi masuk akal (jam pelayanan, kontak valid, lokasi
    sesuai).
-   Persyaratan tambahan (jika ada) tidak bertentangan dengan
    persyaratan umum pada Master Layanan.

Hasil peninjauan:

-   **Disetujui** → status berubah menjadi Publikasi, layanan tayang di
    portal publik.
-   **Ditolak** → dikembalikan ke admin instansi beserta catatan
    perbaikan, admin instansi revisi dan mengajukan ulang.

Karena data layanan sudah mengikuti Master Layanan, proses tinjau ini
tergolong ringan (verifikator tidak perlu cek ulang nama layanan atau
persyaratan umum, cukup cek data spesifik instansi).

------------------------------------------------------------------------

# 5. Publikasi

Setelah disetujui verifikator, layanan otomatis tampil pada portal
publik.

Contoh:

Penerbitan KTP-el → Kelurahan Nagarasari

------------------------------------------------------------------------

# 5.1 Sinkronisasi dari SIMAT / SISPEK (Webhook)

Untuk layanan yang datanya bersumber dari SIMAT atau SISPEK, portal
tidak melakukan pengecekan berkala (polling per jam/hari) ke server
sumber. Sebaliknya, portal menyediakan **endpoint webhook** yang
menerima kiriman data begitu ada perubahan di sisi SIMAT/SISPEK.

Alur:

1.  Data di SIMAT/SISPEK berubah (mis. admin instansi edit persyaratan
    atau kontak).
2.  Server SIMAT/SISPEK mengirim (push) payload perubahan ke endpoint
    webhook portal.
3.  Portal menerima payload, memvalidasi sumber pengirim (token/secret
    key), lalu memperbarui data `layanan_instansi` yang bersangkutan.

Pendekatan ini dipilih supaya server SIMAT/SISPEK tidak terbebani proses
pengecekan rutin — pembaruan data terjadi seketika saat ada perubahan,
bukan menunggu jadwal.

------------------------------------------------------------------------

# 6. Landing Page

Landing Page memiliki dua fitur utama.

## A. Trending

Menampilkan layanan yang paling banyak dilihat.

Contoh:

-   Penerbitan KTP-el --- Kelurahan Nagarasari
-   Surat Domisili --- Kelurahan Cibeureum
-   Akta Kelahiran --- Kelurahan Sambongjaya

Catatan: Trending dihitung **per layanan pada instansi**, bukan digabung
berdasarkan master layanan.

------------------------------------------------------------------------

## B. Search

Pengguna mencari layanan menggunakan kata kunci.

Contoh:

Keyword: KTP

Filter:

-   Provinsi
-   Kabupaten/Kota
-   Sektor

------------------------------------------------------------------------

# 7. Hasil Pencarian

Hasil mengikuti konsep SIPPN.

Contoh:

-   Penerbitan KTP-el --- Kelurahan Nagarasari
-   Penerbitan KTP-el --- Kelurahan Cibeureum
-   Penerbitan KTP-el --- Disdukcapil Kota Tasikmalaya

Setiap hasil merupakan **layanan milik instansi**, bukan Master Layanan.

------------------------------------------------------------------------

# 8. Detail Layanan

Ketika pengguna memilih salah satu hasil pencarian atau layanan
trending, sistem menampilkan:

-   Nama layanan
-   Nama instansi
-   Persyaratan umum
-   Persyaratan tambahan (jika ada)
-   Alur pelayanan
-   Waktu pelayanan
-   Biaya
-   Kontak
-   Lokasi
-   Dasar hukum

Di bagian bawah halaman dapat ditampilkan:

**Layanan serupa tersedia di:**

-   Kelurahan Cibeureum
-   Kelurahan Sambongjaya
-   Disdukcapil Kota Tasikmalaya

Daftar tersebut diperoleh dari layanan yang memiliki Master Layanan yang
sama.

------------------------------------------------------------------------

# 9. Perhitungan Trending

Setiap kali halaman detail dibuka:

1.  View bertambah +1.
2.  Nilai view disimpan sebagai satu angka akumulatif (`view_count`)
    pada layanan instansi — bukan log per kejadian dengan waktu.
3.  Sistem mengurutkan berdasarkan jumlah view.

Catatan: karena hanya berupa counter, sistem tidak menyimpan riwayat
kapan tiap view terjadi. Trending yang tampil selalu bersifat akumulatif
sejak layanan pertama kali tayang (tidak ada breakdown "trending
minggu ini" atau "trending hari ini"). Ini sudah cukup untuk kebutuhan
saat ini: memastikan layanan yang paling sering dicari muncul di awal.

Contoh:

  Layanan   Instansi        View
  --------- ------------- ------
  KTP       Nagarasari       420
  KTP       Disdukcapil      210
  KTP       Cibeureum        120

Trending diperbarui berdasarkan data tersebut.

------------------------------------------------------------------------

# 10. Diagram Proses Bisnis

``` text
Admin Diskominfo
        │
        ▼
Membuat Master Sektor
        │
        ▼
Membuat Master Layanan
        │
        ▼
Admin Instansi
        │
        ▼
Memilih Master Layanan
        │
        ▼
Mengisi Data Khusus Instansi
        │
        ▼
Menunggu Persetujuan
        │
        ▼
Verifikator Diskominfo (APTIKA)
        │
 ┌──────┴─────────┐
 ▼                ▼
Disetujui        Ditolak
 │                │
 ▼                ▼
Publikasi   Kembali ke Admin Instansi
 │
 │◄── Webhook (SIMAT/SISPEK berubah) ── update data
 │
 ┌──────┴─────────┐
 ▼                ▼
Trending        Search
 │                │
 └──────┬─────────┘
        ▼
Detail Layanan Instansi
        │
View +1 (counter akumulatif)
        │
Ranking Trending
```

## Manfaat

-   Menghindari input layanan berulang.
-   Persyaratan umum cukup dibuat satu kali.
-   Admin instansi hanya mengelola data yang spesifik untuk instansinya.
-   Tetap mengikuti pola pencarian SIPPN.
-   Data lebih konsisten dan mudah dipelihara.
-   Ada lapisan persetujuan sebelum tayang, tanpa membebani verifikator
    (karena data sudah terstruktur lewat Master Layanan).
-   Sinkronisasi dari SIMAT/SISPEK real-time via webhook, tanpa
    membebani server sumber dengan pengecekan berkala.
