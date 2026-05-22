<?php
date_default_timezone_set('Asia/Makassar');
require 'Model.php';

$edit = false;
$data = ['nama_member'=>'','nomor_member'=>'','alamat'=>'','tgl_mendaftar'=>''];

if (isset($_GET['id'])) {
    $edit = true;
    $data = getMemberById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = [
        'nama_member'      => $_POST['nama_member'],
        'nomor_member'     => $_POST['nomor_member'],
        'alamat'           => $_POST['alamat'],
        'tgl_mendaftar'    => $_POST['tgl_mendaftar'],
    ];
    if (isset($_POST['id']) && $_POST['id'] != '') {
        updateMember($_POST['id'], $input);
    } else {
        insertMember($input);
    }
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $edit ? 'Edit' : 'Tambah' ?> Member</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; margin: 0; padding: 30px; }
        .container { background: white; padding: 25px; border-radius: 8px;
                     max-width: 500px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; }
        label { display: block; margin-top: 12px; font-size: 14px; color: #555; }
        input, textarea { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ccc;
                          border-radius: 5px; box-sizing: border-box; font-size: 14px; }
        textarea { height: 80px; resize: vertical; }
        .btn-submit { margin-top: 18px; background: #27ae60; color: white; border: none;
                      padding: 9px 20px; border-radius: 5px; cursor: pointer; font-size: 14px; }
        .btn-submit:hover { background: #1e8449; }
        .btn-back { display: inline-block; margin-top: 10px; color: #2980b9;
                    text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <h2><?= $edit ? 'Edit' : 'Tambah' ?> Member</h2>
    <form method="POST">
        <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $data['id_member'] ?>">
        <?php endif; ?>
        <label>Nama Member</label>
        <input type="text" name="nama_member" value="<?= htmlspecialchars($data['nama_member']) ?>" required>
        <label>Nomor Member</label>
        <input type="text" name="nomor_member" value="<?= htmlspecialchars($data['nomor_member']) ?>" required>
        <label>Alamat</label>
        <textarea name="alamat"><?= htmlspecialchars($data['alamat']) ?></textarea>
        <label>Tanggal Mendaftar</label>
        <input type="datetime-local" name="tgl_mendaftar"
               value="<?= $data['tgl_mendaftar'] ? date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar'])) : date('Y-m-d\TH:i') ?>">
        <br>
        <button class="btn-submit" type="submit"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
    <a class="btn-back" href="Member.php">← Kembali</a>
</div>
</body>
</html>