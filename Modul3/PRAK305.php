<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK305</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="inputan" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $string = $_POST['inputan'];
        $panjang = strlen($string);
        
        echo "<h2>Input:</h2>";
        echo $string;
        
        echo "<h2>Output:</h2>";
        // Perulangan luar untuk mengambil setiap karakter
        for ($i = 0; $i < $panjang; $i++) {
            $karakter = $string[$i];
            
            // Perulangan dalam untuk mencetak karakter sebanyak panjang string
            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    // Karakter pertama dicetak kapital
                    echo strtoupper($karakter);
                } else {
                    // Karakter sisanya dicetak huruf kecil
                    echo strtolower($karakter);
                }
            }
        }
    }
    ?>
</body>
</html>