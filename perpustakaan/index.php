<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Daftar Buku</h2>
    <a href="create.php" class="btn btn-success mb-3">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $query = "SELECT * FROM info_buku";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['Judul_Buku']}</td>
                        <td>{$row['Penulis']}</td>
                        <td>{$row['Tahun_Terbit']}</td>
                        <td>{$row['Genre']}</td>
                        <td>
                            <a href='edit.php?judul_buku=" . urlencode($row['Judul_Buku']) . "&penulis=" . urlencode($row['Penulis']) . "' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete.php?judul_buku=" . urlencode($row['Judul_Buku']) . "&penulis=" . urlencode($row['Penulis']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\");'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>
