<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK303</title>
</head>
<body>
    <form method="POST">
        Batas Bawah : <input type="number" name="bawah" value="<?php echo isset($_POST['bawah']) ? $_POST['bawah'] : ''; ?>"><br>
        Batas Atas : <input type="number" name="atas" value="<?php echo isset($_POST['atas']) ? $_POST['atas'] : ''; ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $i = $bawah;

        // Validasi agar loop tidak error jika batas bawah > batas atas
        if ($bawah <= $atas) {
            do {
                if (($i + 7) % 5 == 0) {
                    echo "<img src='star-images-9441.png' width='20px'> ";
                } else {
                    echo "$i ";
                }
                $i++;
            } while ($i <= $atas);
        }
    }
    ?>
</body>
</html>