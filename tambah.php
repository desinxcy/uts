<?php
// Hubungkan ke database
include "database.php";

// Jika tombol submit ditekan
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];

    // Simpan data ke database
    $sql = "INSERT INTO daftar (nama, nomor, email) VALUES ('$nama', '$nomor', '$email')";
    if ($data->query($sql)) {
        // Redirect ke dashboard jika sukses
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $data->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styling/tambah.css">
    <title>Form Tambah Data</title>
</head>
<body>
    <form action="tambah.php" method="POST">
        <h2>Tambah Data</h2>

        <label>Nama</label><br>
        <input type="text" name="nama" required><br><br>
        <label>Nomor</label><br>
        <input type="text" name="nomor" required><br><br>
        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="tambah">Tambah Data</button>
    </form>
</body>
</html>
