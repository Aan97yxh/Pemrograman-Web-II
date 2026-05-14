<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK301</title>
    <style>
        .ganjil {
            color: red;
        }
        .genap {
            color: green;
        }
    </style>
</head>
<body>
    <form method="POST">
        Jumlah Peserta : <input type="number" name="jumlah" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : ''; ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 != 0) {
                echo "<h1 class='ganjil'>Peserta ke-$i</h1>";
            } else {
                echo "<h1 class='genap'>Peserta ke-$i</h1>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>