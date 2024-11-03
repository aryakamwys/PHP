<?php
include 'config.php';

$judul_buku = urldecode($_GET['judul_buku']);
$penulis = urldecode($_GET['penulis']);

$sql = "DELETE FROM info_buku WHERE Judul_Buku=? AND Penulis=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $judul_buku, $penulis);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
