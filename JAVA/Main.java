import java.util.Scanner;

    public static void main(String[] args) {
        // loop utama untuk menerima perintah user
        while (true) {
            
            System.out.println("\n~ Perintah CRUD Produk Elektronik ~");
            System.out.println("1. Tambah");
            System.out.println("2. Tampilkan");
            System.out.println("3. Update");
            System.out.println("4. Hapus");
            System.out.println("5. Cari");
            System.out.println("6. Keluar");
            System.out.print("Masukkan perintah: ");
            String perintah = sc.next(); // input perintah user

            // eksekusi perintah berdasarkan input user
            // jika perintah sesuai, panggil metode terkait
            // jika perintah tidak dikenal, tampilkan pesan error
            // jika perintah adalah "Keluar", hentikan loop dan akhiri program
            if (perintah.equalsIgnoreCase("Tambah")) {
                tambahData();
            } 
            else if (perintah.equalsIgnoreCase("Tampilkan")) {
                tampilkanSemua();
            } 
            else if (perintah.equalsIgnoreCase("Update")) {
                updateData();
            } 
            else if (perintah.equalsIgnoreCase("Hapus")) {
                hapusData();
            } 
            else if (perintah.equalsIgnoreCase("Cari")) {
                cariData();
            } 
            else if (perintah.equalsIgnoreCase("Keluar")) {
                System.out.println("Program selesai.");
                return;
            } else {
                System.out.println("Perintah tidak dikenal.");
            }
        }
    }

