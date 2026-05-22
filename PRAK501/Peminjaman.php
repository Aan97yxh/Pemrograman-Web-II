<?php
require 'Model.php';
$peminjamans = getAllPeminjaman();

if (isset($_GET['delete'])) {
    deletePeminjaman($_GET['delete']);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; margin: 0; padding: 20px; }
        h2 { color: #2c3e50; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .nav { margin-bottom: 15px; }
        .nav a { margin-right: 10px; text-decoration: none; background: #2980b9; color: white;
                 padding: 7px 14px; border-radius: 5px; font-size: 14px; }
        .nav a:hover { background: #1f6391; }
        .btn-add { display: inline-block; margin-bottom: 15px; background: #27ae60; color: white;
                   padding: 8px 16px; border-radius: 5px; text-decoration: none; }
        .btn-add:hover { background: #1e8449; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #2980b9; color: white; padding: 10px; text-align: left; }
        td { padding: 9px 10px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f5f5f5; }
        .btn-edit { background: #f39c12; color: white; padding: 5px 10px; border-radius: 4px;
                    text-decoration: none; font-size: 13px; }
        .btn-del  { background: #e74c3c; color: white; padding: 5px 10px; border-radius: 4px;
                    text-decoration: none; font-size: 13px; }
        .btn-edit:hover { background: #d68910; }
        .btn-del:hover  { background: #c0392b; }
    </style>
</head>
<body>
<div class="container">
    <div class="nav">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <h2>Data Peminjaman</h2>
    <a class="btn-add" href="FormPeminjaman.php">+ Tambah Peminjaman</a>
    <table>
        <tr>
            <th>No</th><th>Nama Member</th><th>Judul Buku</th>
            <th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Aksi</th>
        </tr>
        <?php if (empty($peminjamans)): ?>
        <tr><td colspan="6" style="text-align:center;">Belum ada data.</td></tr>
        <?php else: $no = 1; foreach ($peminjamans as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= $row['tgl_pinjam'] ?></td>
            <td><?= $row['tgl_kembali'] ?></td>
            <td>
                <a class="btn-edit" href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>">Edit</a>
                <a class="btn-del"  href="Peminjaman.php?delete=<?= $row['id_peminjaman'] ?>"
                   onclick="return confirm('Hapus data peminjaman ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; endif; ?>
    </table>
</div>
</body>
</html>