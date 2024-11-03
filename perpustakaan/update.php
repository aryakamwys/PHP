<?php
include 'config.php';

$judul_buku = $_POST['judul_buku'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];
$genre = $_POST['genre'];

$sql = "UPDATE info_buku SET Tahun_Terbit=?, Genre=? WHERE Judul_Buku=? AND Penulis=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $tahun_terbit, $genre, $judul_buku, $penulis);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
