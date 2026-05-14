<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403</title>
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
        .revisi {
            background-color: red;
        }
        .tidak-revisi {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <?php
    // Data multi-dimensional associative array
    $mahasiswa = [
        [
            "nama" => "Ridho",
            "matkul" => [
                ["sub" => "Pemrograman I", "sks" => 2],
                ["sub" => "Praktikum Pemrograman I", "sks" => 1],
                ["sub" => "Pengantar Lahan Basah", "sks" => 2],
                ["sub" => "Arsitektur Komputer", "sks" => 3]
            ]
        ],
        [
            "nama" => "Ratna",
            "matkul" => [
                ["sub" => "Basis Data I", "sks" => 2],
                ["sub" => "Praktikum Basis Data I", "sks" => 1],
                ["sub" => "Kalkulus", "sks" => 3]
            ]
        ],
        [
            "nama" => "Tono",
            "matkul" => [
                ["sub" => "Rekayasa Perangkat Lunak", "sks" => 3],
                ["sub" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["sub" => "Komputasi Awan", "sks" => 3],
                ["sub" => "Kecerdasan Bisnis", "sks" => 3]
            ]
        ]
    ];

    // Hitung total SKS dan Keterangan
    foreach ($mahasiswa as &$m) {
        $total = 0;
        foreach ($m['matkul'] as $mk) {
            $total += $mk['sks'];
        }
        $m['total_sks'] = $total;
        $m['keterangan'] = ($total < 7) ? "Revisi KRS" : "Tidak Revisi";
    }
    unset($m); 
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($mahasiswa as $index => $m) : ?>
            <?php foreach ($m['matkul'] as $i => $mk) : ?>
                <tr>
                    <td><?php echo ($i == 0) ? $index + 1 : ""; ?></td>
                    <td><?php echo ($i == 0) ? $m['nama'] : ""; ?></td>
                    <td><?php echo $mk['sub']; ?></td>
                    <td><?php echo $mk['sks']; ?></td>
                    <td><?php echo ($i == 0) ? $m['total_sks'] : ""; ?></td>
                    <td class="<?php 
                        if ($i == 0) {
                            echo ($m['total_sks'] < 7) ? "revisi" : "tidak-revisi";
                        }
                    ?>">
                        <?php echo ($i == 0) ? $m['keterangan'] : ""; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>