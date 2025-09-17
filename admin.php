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
    <style>
        .dashboard-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 32px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            color: #2d7cff;
            margin-bottom: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }
        th, td {
            padding: 12px 8px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }
        th {
            background: #f0f6ff;
            color: #2d7cff;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .status-hadir { color: #28a745; font-weight: bold; }
        .status-sakit { color: #ffc107; font-weight: bold; }
        .status-izin { color: #dc3545; font-weight: bold; }
        .back-btn {
            display: inline-block;
            margin-bottom: 18px;
            background: #555;
            color: #fff;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: #2d7cff;
        }
    </style>
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