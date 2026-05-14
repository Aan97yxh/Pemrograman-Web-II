<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            border: 1px solid black;
            width: 40px;
            height: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST">
        Panjang : <input type="number" name="panjang" value="<?php echo isset($_POST['panjang']) ? $_POST['panjang'] : ''; ?>"><br>
        Lebar : <input type="number" name="lebar" value="<?php echo isset($_POST['lebar']) ? $_POST['lebar'] : ''; ?>"><br>
        Nilai : <input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $nilai = $_POST['nilai'];

        // Memecah string berdasarkan spasi menjadi array
        $isiMatriks = explode(" ", $nilai);

        // Validasi jumlah angka == matriks
        if (count($isiMatriks) == ($panjang * $lebar)) {
            echo "<table>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {

                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $isiMatriks[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
        }
    }
    ?>
</body>
</html>