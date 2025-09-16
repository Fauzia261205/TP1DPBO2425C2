#include <iostream>
#include <string>

using namespace std;

// Definisi kelas produk_elektronik
class produk_elektronik {
    private:
    string nama;
    string kode;
    string merk;
    string warna;
    int stok;
    // Akses publik untuk konstruktor, getter, setter, dan metode lainnya
    public:
    // Konstruktor default
    produk_elektronik() {
        nama = "";
        kode = "";
        merk = "";
        warna = "";
        stok = 0;
    }
    // Konstruktor dengan parameter
    produk_elektronik(string nama, string kode, string merk, string warna, int stok) {
        this->nama = nama;
        this->kode = kode;
        this->merk = merk;
        this->warna = warna;
        this->stok = stok;
    }
    // Getter dan Setter
    // Getter dan Setter untuk atribut nama
    string get_nama() {
        return nama;
    }
    void set_nama(string nama) {
        this->nama = nama;
    }
    // Getter dan Setter untuk atribut kode
    string get_kode() {
        return kode;
    }
    void set_kode(string kode) {
        this->kode = kode;
    }
    // Getter dan Setter untuk atribut merk
    string get_merk() {
        return merk;
    }
    void set_merk(string merk) {
        this->merk = merk;
    }
    // Getter dan Setter untuk atribut warna
    string get_warna() {
        return warna;
    }
    void set_warna(string warna) {
        this->warna = warna;
    }
    // Getter dan Setter untuk atribut stok
    int get_stok() {
        return stok;
    }
    void set_stok(int stok) {
        this->stok = stok;
    }

    // Metode untuk menampilkan data produk
    void tampilkan_data() {
        cout << "Nama Produk    : " << nama << endl;
        cout << "Kode           : " << kode << endl;
        cout << "Merk           : " << merk << endl;
        cout << "Warna          : " << warna << endl;
        cout << "Stok           : " << stok << endl;
    }
};


const int MAKS = 255; // Maksimum data produk
produk_elektronik daftar[MAKS]; // Array untuk menyimpan data produk
int jumlah = 0; // Jumlah data produk saat ini

// metode untuk menambah data produk
void tambah_data() {
    // Cek apakah array sudah penuh
        if (jumlah >= MAKS) {
            cout << "Data penuh!\n";
            return;
        }

        // Input data produk
        string nama, kode, merk, warna;
        int stok;
        cout << "Nama Produk    : "; cin >> nama;
        cout << "Kode           : "; cin >> kode;
        cout << "Merk           : "; cin >> merk;
        cout << "Warna          : "; cin >> warna;
        cout << "Stok           : "; cin >> stok;

        for (int i = 0; i < jumlah; i++) {
            // Cek apakah kode sudah ada
            if (daftar[i].get_kode() == kode) {
                cout << "Kode sudah ada!\n";
                return;
            }
        }
        // Tambah data ke array
        daftar[jumlah] = produk_elektronik(nama, kode, merk, warna, stok);
        jumlah++;

        // Konfirmasi penambahan data
        cout << "Data produk berhasil ditambahkan!\n";
    }

    // metode untuk menampilkan semua data produk
    void tampilkan_semua() {
        // Cek apakah ada data produk
        if (jumlah == 0) {
            cout << "Belum ada data.\n";
            return;
        }
        // Tampilkan semua data produk
        for (int i = 0; i < jumlah; i++) {
            // Menampilkan nomor urut data
            cout << "\nData ke-" << i+1 << endl;
            // Menampilkan data produk
            daftar[i].tampilkan_data();
        }
    }

    // metode untuk mencari index produk berdasarkan kode
    int cari_index_kode(string kode) {
        // Cari index produk berdasarkan kode
        for (int i = 0; i < jumlah; i++) {
            // Bandingkan kode produk
            if (daftar[i].get_kode() == kode) {
                return i;
            }
        }
        return -1;
    }

    // metode untuk mengupdate data produk
    void update_data() {
        string kode;
        cout << "Masukkan kode produk yang akan diupdate: ";
        cin >> kode; // Input kode produk
        // Cari index produk berdasarkan kode
        int idx = cari_index_kode(kode);

        // Cek apakah produk ditemukan
        if (idx == -1) {
            cout << "Produk tidak ditemukan.\n";
            return;
        }
        // Input data produk baru
        string nama, merk, warna;
        int stok;
        cout << "Nama Produk    : "; cin >> nama;
        cout << "Merk           : "; cin >> merk;
        cout << "Warna          : "; cin >> warna;
        cout << "Stok           : "; cin >> stok;

        // Update data produk
        daftar[idx].set_nama(nama);
        daftar[idx].set_merk(merk);
        daftar[idx].set_warna(warna);
        daftar[idx].set_stok(stok);

        cout << "Data produk berhasil diupdate!\n";
    }

    // metode untuk menghapus data produk
    void hapus_data() {
        string kode;
        cout << "Masukkan kode produk yang akan dihapus: ";
        cin >> kode; // Input kode produk

        // Cari index produk berdasarkan kode
        int idx = cari_index_kode(kode);
        // Cek apakah produk ditemukan
        if (idx == -1) {
            cout << "Produk tidak ditemukan.\n";
            return;
        }

        // Hapus data produk dengan menggeser elemen setelahnya
        for (int i = idx; i < jumlah-1; i++) {
            daftar[i] = daftar[i+1];
        }
        // Kurangi jumlah data
        jumlah--;

        cout << "Data produk berhasil dihapus!\n";
    }

    // metode untuk mencari dan menampilkan data produk berdasarkan kode
    void cari_data() {
        string kode;
        cout << "Masukkan kode produk yang ingin cari: ";
        cin >> kode; // Input kode produk

        // Cari index produk berdasarkan kode
        int idx = cari_index_kode(kode);
        // Cek apakah produk ditemukan
        // Jika tidak ditemukan
        if (idx == -1) {
            cout << "Produk tidak ditemukan.\n";
        } else {
            // Jika ditemukan, tampilkan data produk
            daftar[idx].tampilkan_data();
        }
    }

   