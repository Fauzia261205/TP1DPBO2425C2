# main program untuk CRUD produk elektronik
from Produk import (
    ProdukElektronik, MAKS, daftar,
    tambah_data, tampilkan_semua, update_data, hapus_data, cari_data
)

# metode utama
def main():
    while True:
        print("\n~ Perintah CRUD Produk Elektronik ~")
        print("1. Tambah")
        print("2. Tampilkan")
        print("3. Update")
        print("4. Hapus")
        print("5. Cari")
        print("6. Keluar")

        # mengambil input perintah dari user
        perintah = input("Masukkan perintah: ").lower()

        # mengeksekusi perintah sesuai input user
        # jika perintah tersedia, jalankan metode terkait
        # jika tidak, tampilkan pesan kesalahan
        # jika perintah adalah "Keluar", hentikan program
        if perintah == "Tambah":
            tambah_data()

        elif perintah == "Tampilkan":
            tampilkan_semua()

        elif perintah == "Update":
            update_data()

        elif perintah == "Hapus":
            hapus_data()

        elif perintah == "Cari":
            cari_data()

        elif perintah == "Keluar":
            print("Program selesai.")
            return
        else:
            print("Perintah tidak tersedia.")

main()
