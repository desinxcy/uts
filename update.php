<?php
include "database.php";

// Validasi: cek apakah id ada di URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data lama
$data_lama = $data->query("SELECT * FROM daftar WHERE id=$id")->fetch_assoc();

if (!$data_lama) {
    die("Data tidak ditemukan di database.");
}

// Jika form dikirim
if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];

    $sql = "UPDATE daftar SET nama='$nama', nomor='$nomor', email='$email' WHERE id=$id";
    if ($data->query($sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Gagal update: " . $data->error;
    }
}
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="tambah.css"> 
</head>
<body>
    <form method="POST">
        <h2>Ubah Data</h2>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $data_lama['nama'] ?>" required>

        <label for="nomor">Nomor</label>
        <input type="text" name="nomor" id="nomor" value="<?= $data_lama['nomor'] ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $data_lama['email'] ?>" required>

        <button type="submit" name="ubah">Update Data</button>
    </form>
</body>
</html>

