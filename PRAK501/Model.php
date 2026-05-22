<?php
require 'Koneksi.php';

// ===================== MEMBER =====================
function getAllMember() {
    $conn = getKoneksi();
    $result = mysqli_query($conn, "SELECT * FROM member ORDER BY id_member ASC");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMemberById($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM member WHERE id_member='$id'");
    return mysqli_fetch_assoc($result);
}

function insertMember($data) {
    $conn = getKoneksi();
    $nama   = mysqli_real_escape_string($conn, $data['nama_member']);
    $nomor  = mysqli_real_escape_string($conn, $data['nomor_member']);
    $alamat = mysqli_real_escape_string($conn, $data['alamat']);
    $daftar = mysqli_real_escape_string($conn, $data['tgl_mendaftar']);
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar)
            VALUES ('$nama','$nomor','$alamat','$daftar')";
    return mysqli_query($conn, $sql);
}

function updateMember($id, $data) {
    $conn = getKoneksi();
    $id     = mysqli_real_escape_string($conn, $id);
    $nama   = mysqli_real_escape_string($conn, $data['nama_member']);
    $nomor  = mysqli_real_escape_string($conn, $data['nomor_member']);
    $alamat = mysqli_real_escape_string($conn, $data['alamat']);
    $daftar = mysqli_real_escape_string($conn, $data['tgl_mendaftar']);
    $sql = "UPDATE member SET nama_member='$nama', nomor_member='$nomor', alamat='$alamat',
            tgl_mendaftar='$daftar' WHERE id_member='$id'";
    return mysqli_query($conn, $sql);
}

function deleteMember($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM member WHERE id_member='$id'");
}

// ===================== BUKU =====================
function getAllBuku() {
    $conn = getKoneksi();
    $result = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku ASC");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getBukuById($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
    return mysqli_fetch_assoc($result);
}

function insertBuku($data) {
    $conn = getKoneksi();
    $judul   = mysqli_real_escape_string($conn, $data['judul_buku']);
    $penulis = mysqli_real_escape_string($conn, $data['penulis']);
    $penerbit= mysqli_real_escape_string($conn, $data['penerbit']);
    $tahun   = mysqli_real_escape_string($conn, $data['tahun_terbit']);
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
            VALUES ('$judul','$penulis','$penerbit','$tahun')";
    return mysqli_query($conn, $sql);
}

function updateBuku($id, $data) {
    $conn = getKoneksi();
    $id      = mysqli_real_escape_string($conn, $id);
    $judul   = mysqli_real_escape_string($conn, $data['judul_buku']);
    $penulis = mysqli_real_escape_string($conn, $data['penulis']);
    $penerbit= mysqli_real_escape_string($conn, $data['penerbit']);
    $tahun   = mysqli_real_escape_string($conn, $data['tahun_terbit']);
    $sql = "UPDATE buku SET judul_buku='$judul', penulis='$penulis', penerbit='$penerbit',
            tahun_terbit='$tahun' WHERE id_buku='$id'";
    return mysqli_query($conn, $sql);
}

function deleteBuku($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");
}

// ===================== PEMINJAMAN =====================
function getAllPeminjaman() {
    $conn = getKoneksi();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku
            ORDER BY p.id_peminjaman ASC";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPeminjamanById($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    return mysqli_fetch_assoc($result);
}

function insertPeminjaman($data) {
    $conn = getKoneksi();
    $id_member = mysqli_real_escape_string($conn, $data['id_member']);
    $id_buku   = mysqli_real_escape_string($conn, $data['id_buku']);
    $tgl_pinjam  = mysqli_real_escape_string($conn, $data['tgl_pinjam']);
    $tgl_kembali = mysqli_real_escape_string($conn, $data['tgl_kembali']);
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
            VALUES ('$id_member','$id_buku','$tgl_pinjam','$tgl_kembali')";
    return mysqli_query($conn, $sql);
}

function updatePeminjaman($id, $data) {
    $conn = getKoneksi();
    $id        = mysqli_real_escape_string($conn, $id);
    $id_member = mysqli_real_escape_string($conn, $data['id_member']);
    $id_buku   = mysqli_real_escape_string($conn, $data['id_buku']);
    $tgl_pinjam  = mysqli_real_escape_string($conn, $data['tgl_pinjam']);
    $tgl_kembali = mysqli_real_escape_string($conn, $data['tgl_kembali']);
    $sql = "UPDATE peminjaman SET id_member='$id_member', id_buku='$id_buku',
            tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali'
            WHERE id_peminjaman='$id'";
    return mysqli_query($conn, $sql);
}

function deletePeminjaman($id) {
    $conn = getKoneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$id'");
}
?>