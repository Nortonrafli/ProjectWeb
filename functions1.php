<?php
//membuat koneksi
$conn=mysqli_connect("localhost", "root", "", "perpustakaan");
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
//ambil data dari tabel mahasiswa/query data mahasiswa
$result=mysqli_query($conn, "SELECT*FROM Peminjaman");

// function query akan menerima isi parameter dari string query yg ada pada index2.php (line 3)
function query($query_kedua){
    //dikarenakan $conn diiluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn, $query_kedua);
    //wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
   }
return $rows;
}

function tambah ($data)
{
    global $conn;
    $No_Peminjaman = $_POST["No_Peminjaman"];
    $Nim = $_POST["Nim"];
    $Nama = $_POST["Nama"];
    $Kode_Buku = $_POST["Kode_Buku"];
    $Judul_Buku = $_POST["Judul_Buku"];
    $Tanggal_pinjam = $_POST["Tanggal_pinjam"];

        $query = " INSERT INTO Peminjaman
                    VALUES
                    ('','$No_Peminjaman','$Nim','$Nama','$Kode_Buku','$Judul_Buku','$Tanggal_pinjam')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM Peminjaman WHERE id =$id");
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;   
    $No_Peminjaman = $data["No_Peminjaman"];
    $Nim = htmlspecialchars($data["Nim"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Kode_Buku = htmlspecialchars($data["Kode_Buku"]);
    $Judul_Buku = htmlspecialchars($data["Judul_Buku"]);
    $Tanggal_pinjam = htmlspecialchars($data["Tanggal_pinjam "]);
    $query= " UPDATE Peminjaman SET
                No_Peminjaman = '$No_Peminjaman',
                Nim = '$Nim',
                Nama = '$Nama',
                Kode_Buku = '$Kode_Buku',
                Judul_Buku = '$Judul_Buku',
                Tanggal_pinjam = '$Tanggal_pinjam',
                WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql= "SELECT * FROM Peminjaman WHERE
            No_Peminjaman  LIKE '%$keyword%' OR
            Nim LIKE '%$keyword%' OR
            Nama LIKE '%$keyword%' OR
            Kode_Buku LIKE '%$keyword%' OR
            Judul_Buku LIKE '%$keyword%' OR
            Tanggal_pinjam LIKE '%$keyword%'
        ";
    // kembalikan ke function query dengan parameter $sql
    return query($sql);
    // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}
