<?php
$conn = new mysqli("localhost", "root", "", "absensi_pkl");
$result = $conn->query("SELECT * FROM absen ORDER BY waktu DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Absen PKL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <a href="absen.php" class="back-btn">Kembali ke Form Absen</a>
        <h2>Dashboard Admin - Data Absen PKL</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal Sekolah</th>
                    <th>Status Kehadiran</th>
                    <th>Waktu Absen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $statusClass = '';
                        if ($row['status'] == 'Hadir') $statusClass = 'status-hadir';
                        elseif ($row['status'] == 'Sakit') $statusClass = 'status-sakit';
                        elseif ($row['status'] == 'Izin') $statusClass = 'status-izin';
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['sekolah']}</td>
                            <td class='$statusClass'>{$row['status']}</td>
                            <td>" . date('d-m-Y H:i', strtotime($row['waktu'])) . "</td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>Belum ada data absen.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>