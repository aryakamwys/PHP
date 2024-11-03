<?php
include 'config.php';

$judul_buku = $_POST['judul_buku'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];
$genre = $_POST['genre'];

$sql = "INSERT INTO info_buku (Judul_Buku, Penulis, Tahun_Terbit, Genre) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $judul_buku, $penulis, $tahun_terbit, $genre);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
