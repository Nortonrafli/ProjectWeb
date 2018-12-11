<?php
//membuat koneksi
$conn=mysqli_connect("localhost", "root", "", "perpustakaan");
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
//ambil data dari tabel mahasiswa/query data mahasiswa
$result=mysqli_query($conn, "SELECT*FROM buku");

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
    $Kode_Buku = $_POST["Kode_Buku"];
    $Judul_Buku = $_POST["Judul_Buku"];
    $Jenis_Buku = $_POST["Jenis_Buku"];
    $Tanggal_terbit = $_POST["Tanggal_terbit"];
    $Pengarang = $_POST["Pengarang"];

        $query = " INSERT INTO buku
                    VALUES
                    ('','$Kode_Buku','$Judul_Buku','$Jenis_Buku','$Tanggal_terbit','$Pengarang')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id =$id");
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;   
    $Kode_Buku = $data["Kode_Buku"];
    $Judul_Buku = htmlspecialchars($data["Judul_Buku"]);
    $Jenis_buku = htmlspecialchars($data["Jenis_buku"]);
    $Tanggal_terbit = htmlspecialchars($data["Tanggal_terbit"]);
    $Pengarang = htmlspecialchars($data["Pengarang"]);

    $query= " UPDATE buku SET
                Kode_Buku = '$Kode_Buku',
                Judul_Buku = '$Judul_Buku',
                Jenis_buku = '$Jenis_buku',
                Tanggal_terbit = '$Tanggal_terbit',
                Pengarang = '$Pengarang',
                WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql= "SELECT * FROM Buku WHERE
            Kode_Buku LIKE '%$keyword%' OR
            Judul_Buku LIKE '%$keyword%' OR
            Jenis_buku LIKE '%$keyword%' OR
            Tanggal_terbit LIKE '%$keyword%' OR
            Pengarang LIKE '%$keyword%'
        ";
    // kembalikan ke function query dengan parameter $sql
    return query($sql);
    // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}
function registrasi($data) {
    global $conn;
    //stripcslashes digunakan untuk menghilangkan backslashes
    $username = strtolower(stripcslashes($data['username']));
    //mysqli_real_escape_string untuk memberikan perlindungan terhadap karakter-karakter unik (sql_injection)
    //pada mysqli_real_escape_string terdapat 2 parameter
    $password = mysqli_real_escape_string($conn, $data['password']);
    // cek username sudah ada apa belum
    $result = mysqli_query ($conn, "SELECT username FROM user WHERE username = '$username'");
    // cek kondisi jika line 175 bernilai true maka cetak echo
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah ada');
            </script>
        ";
        // agar proses insertnya gagal
        return false;
    }
    //cek konfirmasi password
// enkripsi password
   // $password = md5($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
   // var_dump($password);
// tambahkan user baru ke database
mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password','')");
return mysqli_affected_rows($conn);
}
?>