# TP1DPBO2425C2

/*Saya Fauzia Rahma Nisa mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman 
Berdasarkan Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah 
dispesifikasikan. Aamiin.*/


## Desain dan Flow Kode (CPP)

**Desain:**
- Menggunakan OOP dengan kelas `produk_elektronik`.
- Atribut: `nama`, `kode` (unik), `merk`, `warna`, `stok`.
- Metode: Getter/Setter, `tampilkan_data()`.
- Semua produk disimpan di array statis `daftar` (maks 255 produk).
- Variabel global `jumlah` menyimpan jumlah produk saat ini.

**Flow Kode:**
1. **Loop utama (`main`)**
   - Menu CRUD: Tambah, Tampilkan, Update, Hapus, Cari, Keluar.
   - Input user menentukan fungsi yang dijalankan.

2. **Tambah Data**
   - Cek apakah array penuh.
   - Input data, cek kode unik.
   - Simpan data di array dan update `jumlah`.

3. **Tampilkan Semua Data**
   - Jika tidak ada data, tampilkan pesan.
   - Loop array dan tampilkan semua produk.

4. **Update Data**
   - Input kode produk.
   - Cari produk, jika ada update atribut.
   - Jika tidak ada, tampilkan pesan error.

5. **Hapus Data**
   - Input kode produk.
   - Cari produk, geser elemen setelahnya ke kiri.
   - Kurangi `jumlah`.

6. **Cari Data**
   - Input kode produk.
   - Jika ditemukan, tampilkan data.
   - Jika tidak, tampilkan pesan error.

7. **Keluar**
   - Menghentikan loop dan menutup program.


## Desain dan Flow Kode (Java)

**Desain:**
- Menggunakan OOP dengan kelas `ProdukElektronik`.
- Atribut: `nama`, `kode` (unik, tidak bisa diubah), `merk`, `warna`, `stok`.
- Metode: Getter/Setter, `tampilkanData()`.
- Semua produk disimpan dalam array statis `daftar` dengan kapasitas maksimum 255.
- Variabel `jumlah` menyimpan jumlah produk saat ini.

**Flow Kode:**
1. **Loop utama (`main`)**
   - Menampilkan menu CRUD: Tambah, Tampilkan, Update, Hapus, Cari, Keluar.
   - Input user menentukan fungsi yang dijalankan.

2. **Tambah Data**
   - Cek kapasitas array.
   - Input atribut produk.
   - Validasi kode unik.
   - Tambahkan objek baru ke array dan update `jumlah`.

3. **Tampilkan Semua Data**
   - Jika array kosong, tampilkan pesan.
   - Loop array dan panggil `tampilkanData()` untuk setiap produk.

4. **Update Data**
   - Input kode produk.
   - Cari indeks produk.
   - Jika ditemukan, update atribut.
   - Jika tidak, tampilkan pesan error.

5. **Hapus Data**
   - Input kode produk.
   - Cari indeks produk.
   - Jika ditemukan, geser elemen setelahnya untuk menimpa data dihapus.
   - Kurangi `jumlah`.

6. **Cari Data**
   - Input kode produk.
   - Jika ditemukan, tampilkan data.
   - Jika tidak, tampilkan pesan error.

7. **Keluar**
   - Hentikan loop utama dan akhiri program.


## Desain dan Flow Kode (Python)

**Desain:**
- Menggunakan OOP dengan kelas `ProdukElektronik`.
- Atribut: `nama`, `kode` (unik), `merk`, `warna`, `stok`.
- Metode: `tampilkan_data()`.
- Semua produk disimpan dalam array statis `daftar` dengan kapasitas maksimum 255 (`MAKS`).
- Variabel `jumlah` menyimpan jumlah produk saat ini.

**Flow Kode:**
1. **Loop utama (`main`)**
   - Menampilkan menu CRUD: Tambah, Tampilkan, Update, Hapus, Cari, Keluar.
   - Input user menentukan fungsi yang dijalankan.

2. **Tambah Data**
   - Cek kapasitas array.
   - Input atribut produk.
   - Validasi kode unik.
   - Tambahkan objek baru ke array dan update `jumlah`.

3. **Tampilkan Semua Data**
   - Jika array kosong, tampilkan pesan.
   - Loop array dan panggil `tampilkan_data()` untuk setiap produk.

4. **Update Data**
   - Input kode produk.
   - Cari indeks produk.
   - Jika ditemukan, update atribut.
   - Jika tidak, tampilkan pesan error.

5. **Hapus Data**
   - Input kode produk.
   - Cari indeks produk.
   - Jika ditemukan, geser elemen setelahnya untuk menimpa data dihapus.
   - Kurangi `jumlah`.

6. **Cari Data**
   - Input kode produk.
   - Jika ditemukan, tampilkan data.
   - Jika tidak, tampilkan pesan error.

7. **Keluar**
   - Hentikan loop utama dan akhiri program.


## Desain dan Flow Kode (PHP)

**Desain:**
- Menggunakan PHP + session untuk menyimpan data produk secara sementara.
- Atribut produk: `nama`, `kode` (unik), `merk`, `warna`, `stok`, `image`.
- Semua produk disimpan di `$_SESSION['produk']` sebagai array asosiatif.
- Gambar produk diupload ke folder `uploads/`.
- Fungsi utama: `tambah`, `update`, `hapus`, `cari`.

**Flow Kode:**
1. **Inisialisasi**
   - Buat `$_SESSION['produk']` jika belum ada.
   - Buat folder `uploads/` 

2. **Tambah Produk**
   - Input data dari form (nama, kode, merk, warna, stok, gambar).
   - Cek kode unik.
   - Upload gambar ke folder `uploads/`.
   - Simpan data ke `$_SESSION['produk']`.

3. **Update Produk**
   - Input kode produk yang ingin diupdate.
   - Cari indeks produk.
   - Update atribut dan gambar jika ada yang baru diupload.

4. **Hapus Produk**
   - Input kode produk.
   - Cari indeks produk.
   - Hapus file gambar dari `uploads/` jika ada.
   - Hapus data produk dari array session.

5. **Cari Produk**
   - Input kode produk.
   - Tampilkan data produk beserta gambar jika ditemukan.

6. **Tampilan**
   - Semua data produk ditampilkan dalam tabel HTML.
   - Tombol hapus tersedia untuk tiap produk.
   - Form terpisah untuk tambah/update dan cari produk.

