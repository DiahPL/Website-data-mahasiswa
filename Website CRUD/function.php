<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    $sql = "INSERT INTO mahasiswa(nim, nama, jurusan, semester) VALUES ('$nim','$nama','$jurusan','$semester')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nim)
{
    global $koneksi;

    $nim = htmlspecialchars($nim);
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    $sql = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', semester = '$semester' WHERE nim = $nim";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

