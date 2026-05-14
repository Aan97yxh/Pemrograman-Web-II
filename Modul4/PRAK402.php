<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            background-color: lightgray;
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    $mahasiswa = [
        ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
        ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
        ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
        ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75],
    ];

    // Melakukan perhitungan nilai akhir dan menentukan huruf
    for ($i = 0; $i < count($mahasiswa); $i++) {
        $mahasiswa[$i]['akhir'] = ($mahasiswa[$i]['uts'] * 0.4) + ($mahasiswa[$i]['uas'] * 0.6);

        if ($mahasiswa[$i]['akhir'] >= 80) {
            $mahasiswa[$i]['huruf'] = 'A';
        } elseif ($mahasiswa[$i]['akhir'] >= 70) {
            $mahasiswa[$i]['huruf'] = 'B';
        } elseif ($mahasiswa[$i]['akhir'] >= 60) {
            $mahasiswa[$i]['huruf'] = 'C';
        } elseif ($mahasiswa[$i]['akhir'] >= 50) {
            $mahasiswa[$i]['huruf'] = 'D';
        } else {
            $mahasiswa[$i]['huruf'] = 'E';
        }
    }
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $mhs['nama']; ?></td>
                <td><?php echo $mhs['nim']; ?></td>
                <td><?php echo $mhs['uts']; ?></td>
                <td><?php echo $mhs['uas']; ?></td>
                <td><?php echo $mhs['akhir']; ?></td>
                <td><?php echo $mhs['huruf']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>