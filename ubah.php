
<?php
include_once 'koneksi.php';

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $sql = "UPDATE data_barang SET
            nama = '$nama',
            kategori = '$kategori',
            harga_jual = '$harga_jual',
            harga_beli = '$harga_beli',
            stok = '$stok'
            WHERE id_barang = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: index.php');
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM data_barang WHERE id_barang = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Ubah Barang</h1>

    <form method="post" action="">
        <p>
            <label>Nama Barang</label><br>
            <input type="text" name="nama"
            value="<?= $data['nama']; ?>" required>
        </p>

        <p>
            <label>Kategori</label><br>
            <select name="kategori">
                <option value="Komputer"
                <?= $data['kategori'] == 'Komputer' ? 'selected' : ''; ?>>
                    Komputer
                </option>

                <option value="Elektronik"
                <?= $data['kategori'] == 'Elektronik' ? 'selected' : ''; ?>>
                    Elektronik
                </option>

                <option value="Hand Phone"
                <?= $data['kategori'] == 'Hand Phone' ? 'selected' : ''; ?>>
                    Hand Phone
                </option>
            </select>
        </p>

        <p>
            <label>Harga Jual</label><br>
            <input type="number" name="harga_jual"
            value="<?= $data['harga_jual']; ?>" required>
        </p>

        <p>
            <label>Harga Beli</label><br>
            <input type="number" name="harga_beli"
            value="<?= $data['harga_beli']; ?>" required>
        </p>

        <p>
            <label>Stok</label><br>
            <input type="number" name="stok"
            value="<?= $data['stok']; ?>" required>
        </p>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>

    <p><a href="index.php">Kembali</a></p>
</body>
</html>
