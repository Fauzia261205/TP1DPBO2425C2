#include <iostream>
#include <string>
#include "Produk.cpp"
using namespace std;

int main() {
    string perintah; // Variabel untuk menyimpan perintah user

    // Loop utama program
    // Terus berjalan hingga user memilih
    while (true) {
        cout << "\n~ Perintah CRUD Produk Elektronik ~\n";
        cout << "1. Tambah\n";
        cout << "2. Tampilkan\n";
        cout << "3. Update\n";
        cout << "4. Hapus\n";
        cout << "5. Cari\n";
        cout << "6. Keluar\n\n";
        cout << "Masukkan perintah: ";
        cin >> perintah; // Input perintah user

        // Eksekusi perintah berdasarkan input user
        // jika perintah sesuai, panggil metode terkait
        // jika perintah tidak dikenal, tampilkan pesan error
        // jika perintah adalah "Keluar", hentikan loop dan akhiri program
        if (perintah == "Tambah") {
            tambah_data();
        } 
        else if (perintah == "Tampilkan") {
            tampilkan_semua();
        } 
        else if (perintah == "Update") {
            update_data();
        } 
        else if (perintah == "Hapus") {
            hapus_data();
        } 
        else if (perintah == "Cari") {
            cari_data();
        } 
        else if (perintah == "Keluar") {
            cout << "Program selesai.\n";
            return 0;
        } 
        else {
            cout << "Perintah tidak dikenal.\n";
        }
    }

    return 0;
}
