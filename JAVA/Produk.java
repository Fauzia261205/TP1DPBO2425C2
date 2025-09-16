import java.util.Scanner;

// kelas ProdukElektronik dengan atribut dan metode dasar
class ProdukElektronik {
    private String nama;
    private String kode;
    private String merk;
    private String warna;
    private int stok;

    // konstruktor default
    public ProdukElektronik() {
        this.nama = "";
        this.kode = "";
        this.merk = "";
        this.warna = "";
        this.stok = 0;
    }

    // konstruktor dengan parameter
    public ProdukElektronik(String nama, String kode, String merk, String warna, int stok) {
        this.nama = nama;
        this.kode = kode;
        this.merk = merk;
        this.warna = warna;
        this.stok = stok;
    }

    // getter dan setter
    // getset untuk kode hanya getter karena kode tidak boleh diubah
    public String getKode() { 
        return kode; 
    }
    // getset untuk nama
    public String getNama() { 
        return nama; 
    }
    public void setNama(String nama) { 
        this.nama = nama; 
    }
    // getset untuk merk
    public String getMerk() { 
        return merk; 
    }
    public void setMerk(String merk) { 
        this.merk = merk; 
    }
    // getset untuk warna
    public String getWarna() { 
        return warna; 
    }
    public void setWarna(String warna) { 
        this.warna = warna; 
    }
    // getset untuk stok
    public int getStok() { 
        return stok; 
    }
    public void setStok(int stok) { 
        this.stok = stok; 
    }

    // metode untuk menampilkan data produk
    public void tampilkanData() {
        System.out.println("Nama Produk    : " + nama);
        System.out.println("Kode           : " + kode);
        System.out.println("Merk           : " + merk);
        System.out.println("Warna          : " + warna);
        System.out.println("Stok           : " + stok);
    }
}

// kelas utama dengan metode CRUD
public class Main {
    static final int MAKS = 255; // kapasitas maksimum array
    static ProdukElektronik[] daftar = new ProdukElektronik[MAKS]; // array untuk menyimpan objek ProdukElektronik
    static int jumlah = 0; // jumlah data saat ini
    
    // scanner untuk input user
    static Scanner sc = new Scanner(System.in);

    // metode untuk mencari indeks produk berdasarkan kode
    static int cariIndexKode(String kode) {
        // mengembalikan indeks produk dengan kode tertentu, atau -1 jika tidak ditemukan
        for (int i = 0; i < jumlah; i++) {
            if (daftar[i].getKode().equals(kode)) {
                return i;
            }
        }
        return -1;
    }

    // metode CRUD
    // tambah data
    static void tambahData() {
        // cek apakah array sudah penuh
        if (jumlah >= MAKS) {
            System.out.println("Data penuh!");
            return;
        }

        // input data produk baru
        System.out.print("Nama Produk    : "); String nama = sc.next();
        System.out.print("Kode           : "); String kode = sc.next();
        System.out.print("Merk           : "); String merk = sc.next();
        System.out.print("Warna          : "); String warna = sc.next();
        System.out.print("Stok           : "); int stok = sc.nextInt();

        // cek apakah kode sudah ada
        // jika ada, batalkan penambahan
        if (cariIndexKode(kode) != -1) {
            System.out.println("Kode sudah ada!");
            return;
        }
        // buat objek baru dan tambahkan ke array
        daftar[jumlah] = new ProdukElektronik(nama, kode, merk, warna, stok);
        jumlah++;

        System.out.println("Data berhasil ditambahkan!");
    }

    // tampilkan semua data
    static void tampilkanSemua() {
        // tampilkan semua data produk yang ada
        if (jumlah == 0) {
            System.out.println("Belum ada data.");
            return;
        }
        // loop melalui array dan panggil metode tampilkanData() untuk setiap produk
        for (int i = 0; i < jumlah; i++) {
            System.out.println("\nData ke-" + (i+1));
            daftar[i].tampilkanData();
        }
    }

    // update data
    static void updateData() {
        System.out.print("Masukkan kode produk yang akan diupdate: ");
        String kode = sc.next(); // input kode produk yang akan diupdate
        // cari indeks produk dengan kode tersebut
        int idx = cariIndexKode(kode);

        // jika tidak ditemukan, batalkan update
        if (idx == -1) {
            System.out.println("Produk tidak ditemukan.");
            return;
        }

        // input data baru
        System.out.print("Nama Produk    : "); String nama = sc.next();
        System.out.print("Merk           : "); String merk = sc.next();
        System.out.print("Warna          : "); String warna = sc.next();
        System.out.print("Stok           : "); int stok = sc.nextInt();

        // update data produk di indeks tersebut
        daftar[idx].setNama(nama);
        daftar[idx].setMerk(merk);
        daftar[idx].setWarna(warna);
        daftar[idx].setStok(stok);

        System.out.println("Data berhasil diupdate!");
    }

    // hapus data
    static void hapusData() {
        System.out.print("Masukkan kode produk yang akan dihapus: ");
        String kode = sc.next(); // input kode produk yang akan dihapus
        // cari indeks produk dengan kode tersebut
        int idx = cariIndexKode(kode);

        // jika tidak ditemukan, batalkan hapus
        if (idx == -1) {
            System.out.println("Produk tidak ditemukan.");
            return;
        }

        // geser elemen setelah indeks tersebut ke kiri untuk menimpa data yang dihapus
        for (int i = idx; i < jumlah-1; i++) {
            daftar[i] = daftar[i+1];
        }
        jumlah--;
        
        System.out.println("Data berhasil dihapus!");
    }

    // cari data
    static void cariData() {
        System.out.print("Masukkan kode produk yang ingin dicari: ");
        String kode = sc.next(); // input kode produk yang ingin dicari
        // cari indeks produk dengan kode tersebut
        int idx = cariIndexKode(kode);

        // jika tidak ditemukan, tampilkan pesan
        if (idx == -1) {
            System.out.println("Produk tidak ditemukan.");
        } else {
            // jika ditemukan, tampilkan data produk tersebut
            daftar[idx].tampilkanData();
        }
    }

