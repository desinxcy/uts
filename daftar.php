<?php
session_start(); // Tambahkan ini di paling atas agar $_SESSION bisa digunakan

include "database.php";

$result = $data->query("SELECT * FROM daftar"); 

if (isset($_POST['daftar'])) {
    $username = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];

    $sql = "INSERT INTO daftar (nama, nomor, email) VALUES ('$username', '$nomor', '$email')";

    if ($data->query($sql)) {
        // Simpan data ke session
        $_SESSION['nama'] = $username;
        $_SESSION['nomor'] = $nomor;
        $_SESSION['email'] = $email;

        // Redirect ke dashboard
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sembako</title>
    <link rel="stylesheet" href="styling/style.css">
</head>
<body>
  <div class="container">
    <form action="daftar.php" method="post">
      <h2>Daftar</h2>
      <label for="name">Nama</label>
      <input type="text" name="nama" id="name" placeholder="Isi nama anda" required>
      <label for="nomor">Nomor Handphone</label>
      <input type="number" name="nomor" id="nomor" placeholder="Isi nomor anda" required>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Isi email anda" required>
      <button type="submit" name="daftar">Daftar</button>
    </form>
  </div>
</body>
</html>

