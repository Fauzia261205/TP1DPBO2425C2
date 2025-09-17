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

        if perintah == "tambah":
            tambah_data()
        elif perintah == "tampilkan":
            tampilkan_semua()
        elif perintah == "update":
            update_data()
        elif perintah == "hapus":
            hapus_data()
        elif perintah == "cari":
            cari_data()
        elif perintah == "keluar":
            print("Program selesai.")
            return
        else:
            print("Perintah tidak tersedia.")

main()
