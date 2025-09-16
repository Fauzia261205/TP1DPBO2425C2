<?php
session_start();

// Inisialisasi array produk jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// Buat folder uploads jika belum ada
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Fungsi cari index produk berdasarkan kode
function cariIndexKode($kode) {
    foreach ($_SESSION['produk'] as $i => $p) {
        if ($p['kode'] === $kode) return $i;
    }
    return -1;
}

// Fungsi upload gambar
function uploadImage() {
    // Cek apakah ada file yang diupload
    if (!empty($_FILES['image']['name'])) {
        $namaFile = time() . '_' . basename($_FILES['image']['name']);
        $tujuan = 'uploads/' . $namaFile;
        // Cek apakah file berhasil diupload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $tujuan)) {
            return $namaFile;
        }
    }
    return null;
}

// Tambah data produk
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];

    // Cek duplikat kode
    if (cariIndexKode($kode) != -1) {
        $error = "⚠️ Kode sudah ada, data tidak ditambahkan.";
    } else {
        // Jika kode belum ada, lanjutkan dengan upload gambar dan tambah data
        $image = uploadImage();
        $_SESSION['produk'][] = [
            'nama' => $_POST['nama'],
            'kode' => $kode,
            'merk' => $_POST['merk'],
            'warna' => $_POST['warna'],
            'stok' => (int)$_POST['stok'],
            'image' => $image
        ];
        // Tampilkan pesan sukses
        $sukses = "✅ Data produk berhasil ditambahkan!";
    }
}

// Hapus data produk
if (isset($_GET['hapus'])) {
    // Cek apakah produk ada
    $kodeHapus = $_GET['hapus'];
    // Cari index produk
    $idx = cariIndexKode($kodeHapus);
    // Jika produk ditemukan
    if ($idx != -1) {
        // Hapus file gambar jika ada
        if (!empty($_SESSION['produk'][$idx]['image'])) {
            @unlink('uploads/' . $_SESSION['produk'][$idx]['image']);
        }
        // Hapus data produk dari array
        array_splice($_SESSION['produk'], $idx, 1);
        $sukses = "✅ Data produk berhasil dihapus!";
    }
}

// Update data produk
if (isset($_POST['update'])) {
    // Cari index produk
    $idx = cariIndexKode($_POST['kode']);
    // Jika produk ditemukan
    if ($idx != -1) {
        $fotoLama = $_SESSION['produk'][$idx]['image'] ?? null;
        $fotoBaru = uploadImage();

        // Jika ada gambar baru yang diupload, hapus gambar lama
        $_SESSION['produk'][$idx] = [
            'nama' => $_POST['nama'],
            'kode' => $_POST['kode'],
            'merk' => $_POST['merk'],
            'warna' => $_POST['warna'],
            'stok' => (int)$_POST['stok'],
            'image' => $fotoBaru ?: $fotoLama
        ];
        $sukses = "✅ Data produk berhasil diupdate!";
    } else {
        $error = "⚠️ Produk tidak ditemukan.";
    }
}

// Cari data produk
$hasilCari = null;
if (isset($_POST['cari'])) {
    // Cari index produk
    $idx = cariIndexKode($_POST['kode_cari']);
    // Jika produk ditemukan
    if ($idx != -1) {
        $hasilCari = $_SESSION['produk'][$idx];
        // Jika produk tidak ditemukan
    } else {
        $error = "⚠️ Produk dengan kode tersebut tidak ditemukan.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Produk Elektronik</title>
    <style>
        /* Styling dasar halaman */
        body { font-family: Arial, sans-serif; margin: 20px; }
        img { max-width: 100px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        table, th, td { border: 1px solid #aaa; padding: 8px; text-align: center; }
        .msg { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Manajemen Produk Elektronik</h1>

    <!-- Pesan sukses atau error -->
    <?php if (!empty($sukses)) echo "<p class='msg' style='color:green;'>$sukses</p>"; ?>
    <?php if (!empty($error)) echo "<p class='msg' style='color:red;'>$error</p>"; ?>

    <!-- Form tambah / update produk -->
    <h2>Tambah / Update Produk</h2>
    <form method="post" enctype="multipart/form-data">
        Nama Produk : <input type="text" name="nama" required><br>
        Kode        : <input type="text" name="kode" required><br>
        Merk        : <input type="text" name="merk" required><br>
        Warna       : <input type="text" name="warna" required><br>
        Stok        : <input type="number" name="stok" required><br>
        Gambar      : <input type="file" name="image" accept="image/*"><br><br>
        <!-- Tombol tambah dan update -->
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="update">Update</button>
    </form>

    <!-- Form untuk mencari produk berdasarkan kode -->
    <h2>Cari Produk</h2>
    <form method="post">
        Kode : <input type="text" name="kode_cari" required>
        <button type="submit" name="cari">Cari</button>
    </form>

    <!-- Menampilkan hasil pencarian jika ada -->
    <?php if ($hasilCari): ?>
        <h3>Hasil Pencarian</h3>
        <table>
            <tr>
                <th>Gambar</th><th>Nama</th><th>Kode</th><th>Merk</th><th>Warna</th><th>Stok</th>
            </tr>
            <tr>
                <td>
                    <?php 
                    // Tampilkan gambar produk jika ada
                    if ($hasilCari['image']) echo "<img src='uploads/{$hasilCari['image']}'>"; 
                    ?>
                </td>
                <td><?= htmlspecialchars($hasilCari['nama']) ?></td>
                <td><?= htmlspecialchars($hasilCari['kode']) ?></td>
                <td><?= htmlspecialchars($hasilCari['merk']) ?></td>
                <td><?= htmlspecialchars($hasilCari['warna']) ?></td>
                <td><?= htmlspecialchars($hasilCari['stok']) ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <!-- Tabel daftar semua produk -->
    <h2>Daftar Produk</h2>
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Merk</th>
            <th>Warna</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['produk'] as $p): ?>
        <tr>
            <td>
                <?php 
                // Tampilkan gambar jika ada
                if ($p['image']) echo "<img src='uploads/{$p['image']}'>"; 
                ?>
            </td>
            <td><?= htmlspecialchars($p['nama']) ?></td>
            <td><?= htmlspecialchars($p['kode']) ?></td>
            <td><?= htmlspecialchars($p['merk']) ?></td>
            <td><?= htmlspecialchars($p['warna']) ?></td>
            <td><?= htmlspecialchars($p['stok']) ?></td>
            <td>
                <!-- Tombol hapus untuk tiap produk -->
                <a href="?hapus=<?= urlencode($p['kode']) ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>