<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK202</title>
    <style>
        .error {
            color: red;
        }
        input[type="radio"] {
            accent-color: blue;
        }
    </style>
</head>
<body>
    <?php
    $nama = $nim = $jk = "";
    $namaErr = $nimErr = $jkErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "nama tidak boleh kosong";
        } else {
            $nama = $_POST["nama"];
        }

        if (empty($_POST["nim"])) {
            $nimErr = "nim tidak boleh kosong";
        } else {
            $nim = $_POST["nim"];
        }

        if (empty($_POST["jk"])) {
            $jkErr = "jenis kelamin tidak boleh kosong";
        } else {
            $jk = $_POST["jk"];
        }
    }
    ?>

    <form method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error">* <?php echo $namaErr; ?></span><br>
        
        Nim: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error">* <?php echo $nimErr; ?></span><br>
        
        Jenis Kelamin : <span class="error">* <?php echo $jkErr; ?></span><br>
        <input type="radio" name="jk" value="Laki-laki" <?php if (isset($jk) && $jk=="Laki-laki") echo "checked";?>> Laki-Laki <br>
        <input type="radio" name="jk" value="Perempuan" <?php if (isset($jk) && $jk=="Perempuan") echo "checked";?>> Perempuan <br>
        
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($nama) && !empty($nim) && !empty($jk)) {
            echo "<h1>Output:</h1>";
            echo "$nama <br>";
            echo "$nim <br>";
            echo "$jk <br>";
        }
    }
    ?>
</body>
</html>