<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK302</title>
</head>
<body>
    <form method="POST">
        Tinggi : <input type="number" name="tinggi" value="<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>"><br>
        Alamat Gambar : <input type="text" name="url" value="<?php echo isset($_POST['url']) ? $_POST['url'] : ''; ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $url = $_POST['url'];

        $i = 1;
        while ($i <= $tinggi) {
            // Perulangan untuk spasi (menggunakan gambar transparan agar sejajar)
            $j = 1;
            while ($j < $i) {
                echo "<img src='$url' style='width:50px; opacity:0;'>";
                $j++;
            }

            // Perulangan untuk mencetak gambar
            $k = $tinggi;
            while ($k >= $i) {
                echo "<img src='$url' style='width:50px;'>";
                $k--;
            }

            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>