<?php
include 'config.php';

$judul_buku = urldecode($_GET['judul_buku']);
$penulis = urldecode($_GET['penulis']);

$query = "SELECT * FROM info_buku WHERE Judul_Buku=? AND Penulis=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $judul_buku, $penulis);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

include 'header.php';
?>
<h2>Edit Buku</h2>
<form action="update.php" method="post" class="mt-3">
    <input type="hidden" name="judul_buku" value="<?php echo htmlspecialchars($row['Judul_Buku']); ?>">
    <input type="hidden" name="penulis" value="<?php echo htmlspecialchars($row['Penulis']); ?>">
    <div class="mb-3">
        <label for="judul_buku" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="judul_buku" name="judul_buku" required value="<?php echo htmlspecialchars($row['Judul_Buku']); ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="penulis" name="penulis" required value="<?php echo htmlspecialchars($row['Penulis']); ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required value="<?php echo htmlspecialchars($row['Tahun_Terbit']); ?>">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" required value="<?php echo htmlspecialchars($row['Genre']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update Buku</button>
</form>
<?php include 'footer.php'; ?>
