class ProdukElektronik:
    # atribut produk elektronik
    def __init__(self, nama="", kode="", merk="", warna="", stok=0):
        self.nama = nama
        self.kode = kode
        self.merk = merk
        self.warna = warna
        self.stok = stok

    # metode untuk menampilkan data produk
    def tampilkan_data(self):
        print("Nama Produk    :", self.nama)
        print("Kode           :", self.kode)
        print("Merk           :", self.merk)
        print("Warna          :", self.warna)
        print("Stok           :", self.stok)

MAKS = 255 # array untuk menyimpan data produk
daftar = [None] * MAKS # inisialisasi array dengan None
jumlah = 0 # jumlah data produk saat ini

# metode untuk mencari index produk berdasarkan kode
def cari_index_kode(kode):
    # mengembalikan index produk jika ditemukan, -1 jika tidak ditemukan
    for i in range(jumlah):
        if daftar[i].kode == kode:
            return i
    return -1

# metode untuk menambah data produk
def tambah_data():
    global jumlah
    # cek apakah array sudah penuh
    if jumlah >= MAKS:
        print("Data penuh!")
        return

    # input data produk dari user  
    nama = input("Nama Produk    : ")
    kode = input("Kode           : ")
    merk = input("Merk           : ")
    warna = input("Warna          : ")
    stok = int(input("Stok          : "))

    # cek apakah kode sudah ada
    for i in range(jumlah):
        if daftar[i].kode == kode:
            print("Kode sudah ada!")
            return

    # tambah data ke array
    daftar[jumlah] = ProdukElektronik(nama, kode, merk, warna, stok)
    jumlah += 1
    print("Data berhasil ditambahkan!")

# metode untuk menampilkan semua data produk
def tampilkan_semua():
    # menampilkan semua data produk yang ada
    if jumlah == 0:
        print("Belum ada data.")
        return

    # menampilkan data produk satu per satu
    for i in range(jumlah):
        print(f"\nData ke-{i+1}")
        daftar[i].tampilkan_data()

# metode untuk mengupdate data produk berdasarkan kode
def update_data():
    kode = input("Masukkan kode produk yang akan diupdate: ")
    idx = cari_index_kode(kode) # cari index produk berdasarkan kode

    # jika produk tidak ditemukan
    if idx == -1:
        print("Produk tidak ditemukan.")
        return

    # input data produk baru dari user
    nama = input("Nama Produk    : ")
    merk = input("Merk           : ")
    warna = input("Warna          : ")
    stok = int(input("Stok          : "))

    # update data produk
    daftar[idx].nama = nama
    daftar[idx].merk = merk
    daftar[idx].warna = warna
    daftar[idx].stok = stok
    print("Data berhasil diupdate!")

# metode untuk menghapus data produk berdasarkan kode
def hapus_data():
    global jumlah
    kode = input("Masukkan kode produk yang akan dihapus: ")
    idx = cari_index_kode(kode) # cari index produk berdasarkan kode

    # jika produk tidak ditemukan
    if idx == -1:
        print("Produk tidak ditemukan.")
        return

    # menggeser data produk setelah index yang dihapus
    for i in range(idx, jumlah - 1):
        daftar[i] = daftar[i + 1]
    jumlah -= 1
    print("Data berhasil dihapus!")

# metode untuk mencari dan menampilkan data produk berdasarkan kode
def cari_data():
    kode = input("Masukkan kode produk yang ingin dicari: ")
    idx = cari_index_kode(kode) # cari index produk berdasarkan kode

    # jika produk tidak ditemukan
    if idx == -1:
        print("Produk tidak ditemukan.")
    else:
        # jika ditemukan, tampilkan data produk
        daftar[idx].tampilkan_data()
