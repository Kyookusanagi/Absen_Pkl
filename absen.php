<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "absensi_pkl");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST["nama"]);
    $sekolah = $conn->real_escape_string($_POST["sekolah"]);
    $status = $conn->real_escape_string($_POST["status"]);

    $sql = "INSERT INTO absen (nama, sekolah, status) VALUES ('$nama', '$sekolah', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: absen.php?success=1");
        exit();
    }
}

$success = isset($_GET['success']) && $_GET['success'] == '1';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Absen PKL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Absen Anak PKL</h2>
        <div class="notif" style="display:<?= $success ? 'block' : 'none' ?>;">Absen berhasil disimpan!</div>
        <form method="POST" autocomplete="off">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>

            <label for="sekolah">Asal Sekolah</label>
            <input type="text" id="sekolah" name="sekolah" required>

            <label for="status">Status Kehadiran</label>
            <select id="status" name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
            </select>

            <button type="submit" class="btn">Kirim</button>
             <div style="margin-top:18px; text-align:center;">
                <a href="login.php" class="btn" style="background:green; color:white; text-decoration:none; display:inline-block; width:auto; padding:10px 24px;">Login sebagai Admin</a>
            </div>
        </form>
    </div>
</body>
</html>