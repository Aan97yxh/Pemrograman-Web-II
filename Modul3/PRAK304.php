<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK304</title>
</head>
<body>
    <?php
    // Inisialisasi variabel awal
    $jumlah = 0;

    // Logika jika tombol Submit, Tambah, atau Kurang ditekan
    if (isset($_POST['jumlah'])) {
        $jumlah = $_POST['jumlah'];
    }

    if (isset($_POST['tambah'])) {
        $jumlah++;
    }

    if (isset($_POST['kurang'])) {
        $jumlah--;
    }
    ?>

    <?php if ($jumlah == 0) : ?>
        <form method="POST">
            Jumlah bintang <input type="number" name="jumlah" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php endif; ?>

    <?php if ($jumlah > 0) : ?>
        <p>Jumlah bintang <?php echo $jumlah; ?></p>
        
        <?php for ($i = 0; $i < $jumlah; $i++) : ?>
            <img src="star-images-9441.png" width="80px">
        <?php endfor; ?>

        <form method="POST">
            <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>
</body>
</html>