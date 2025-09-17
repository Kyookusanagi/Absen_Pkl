<?php
require_once "koneksi.php";
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
        <?php if ($success): ?>
            <div class="notif">Absen berhasil disimpan!</div>
        <?php endif; ?>
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