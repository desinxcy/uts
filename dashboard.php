<?php include "database.php"; ?>

<?php
// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data->query("DELETE FROM daftar WHERE id=$id");
    header("Location: dashboard.php");
}
?>

<head>
    <link rel="stylesheet" href="styling/dash.css">
</head>
<body>
    <div class="dt">
    <h2>Selamat Datang di Dashboard</h2>
</div>

<table>
    <tr>
        <th>Nama</th>
        <th>Nomor</th>
        <th>Email</th>
        <th>Pengaturan</th>
    </tr>
    <?php
    $result = $data->query("SELECT * FROM daftar");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['nama']}</td>
            <td>{$row['nomor']}</td>
            <td>{$row['email']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Edit</a> <br/> 
                <a href='?hapus={$row['id']}'>Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>

<button><a href="tambah.php">Tambah Data</a><br><br></button>
</body>

