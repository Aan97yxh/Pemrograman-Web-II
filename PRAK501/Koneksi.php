<?php
function getKoneksi() {
    $host = "sql208.infinityfree.com"; 
    $user = "if0_41928437";    
    $pass = "Caf53gQQQ6";    
    $db   = "if0_41928437_prak501";         

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}
?>