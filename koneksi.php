<?php
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