
<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO data_barang
    (nama, kategori, harga_jual, harga_beli, stok)
    VALUES
    ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: index.php');
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>

        <form method="post" action="tambah.php">
            <p>
                <label>Nama Barang</label><br>
                <input type="text" name="nama" required>
            </p>

            <p>
                <label>Kategori</label><br>
                <select name="kategori">
                    <option value="Komputer">Komputer</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Hand Phone">Hand Phone</option>
                </select>
            </p>

            <p>
                <label>Harga Jual</label><br>
                <input type="number" name="harga_jual" required>
            </p>

            <p>
                <label>Harga Beli</label><br>
                <input type="number" name="harga_beli" required>
            </p>

            <p>
                <label>Stok</label><br>
                <input type="number" name="stok" required>
            </p>

            <button type="submit" name="submit">Simpan</button>
        </form>

        <p><a href="index.php">Kembali</a></p>
    </div>
</body>
</html>
