<?php
require 'Model.php';

$edit = false;
$data = ['judul_buku'=>'','penulis'=>'','penerbit'=>'','tahun_terbit'=>''];

if (isset($_GET['id'])) {
    $edit = true;
    $data = getBukuById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = [
        'judul_buku'   => $_POST['judul_buku'],
        'penulis'      => $_POST['penulis'],
        'penerbit'     => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit'],
    ];
    if (isset($_POST['id']) && $_POST['id'] != '') {
        updateBuku($_POST['id'], $input);
    } else {
        insertBuku($input);
    }
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $edit ? 'Edit' : 'Tambah' ?> Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; margin: 0; padding: 30px; }
        .container { background: white; padding: 25px; border-radius: 8px;
                     max-width: 500px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; }
        label { display: block; margin-top: 12px; font-size: 14px; color: #555; }
        input { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ccc;
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
    <h2><?= $edit ? 'Edit' : 'Tambah' ?> Buku</h2>
    <form method="POST">
        <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $data['id_buku'] ?>">
        <?php endif; ?>
        <label>Judul Buku</label>
        <input type="text" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']) ?>" required>
        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>" required>
        <br>
        <button class="btn-submit" type="submit"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
    <a class="btn-back" href="Buku.php">← Kembali</a>
</div>
</body>
</html>