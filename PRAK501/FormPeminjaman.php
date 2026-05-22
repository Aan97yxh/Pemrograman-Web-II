<?php
date_default_timezone_set('Asia/Makassar');
require 'Model.php';

$edit = false;
$data = ['id_member'=>'','id_buku'=>'','tgl_pinjam'=>'','tgl_kembali'=>''];

$members = getAllMember();
$bukus   = getAllBuku();

if (isset($_GET['id'])) {
    $edit = true;
    $data = getPeminjamanById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = [
        'id_member'   => $_POST['id_member'],
        'id_buku'     => $_POST['id_buku'],
        'tgl_pinjam'  => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali'],
    ];
    if (isset($_POST['id']) && $_POST['id'] != '') {
        updatePeminjaman($_POST['id'], $input);
    } else {
        insertPeminjaman($input);
    }
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $edit ? 'Edit' : 'Tambah' ?> Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; margin: 0; padding: 30px; }
        .container { background: white; padding: 25px; border-radius: 8px;
                     max-width: 500px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; }
        label { display: block; margin-top: 12px; font-size: 14px; color: #555; }
        input, select { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ccc;
                        border-radius: 5px; box-sizing: border-box; font-size: 14px; }
        .btn-submit { margin-top: 18px; background: #27ae60; color: white; border: none;
                      padding: 9px 20px; border-radius: 5px; cursor: pointer; font-size: 14px; }
        .btn-submit:hover { background: #1e8449; }
        .btn-back { display: inline-block; margin-top: 10px; color: #2980b9;
                    text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <h2><?= $edit ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
    <form method="POST">
        <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $data['id_peminjaman'] ?>">
        <?php endif; ?>
        <label>Member</label>
        <select name="id_member" required>
            <option value="">-- Pilih Member --</option>
            <?php foreach ($members as $m): ?>
            <option value="<?= $m['id_member'] ?>"
                <?= ($data['id_member'] == $m['id_member']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($m['nama_member']) ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label>Buku</label>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($bukus as $b): ?>
            <option value="<?= $b['id_buku'] ?>"
                <?= ($data['id_buku'] == $b['id_buku']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($b['judul_buku']) ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam'] ?: date('Y-m-d') ?>" required>
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" value="<?= $data['tgl_kembali'] ?: date('Y-m-d', strtotime('+7 days')) ?>">
        <br>
        <button class="btn-submit" type="submit"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
    <a class="btn-back" href="Peminjaman.php">← Kembali</a>
</div>
</body>
</html>