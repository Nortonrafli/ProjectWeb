    <?php
//membuat koneksi
$conn=mysqli_connect("localhost", "root", "", "perpustakaan");
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
//ambil data dari tabel mahasiswa/query data mahasiswa
$Mahasiswa=mysqli_query($conn, "SELECT*FROM Mahasiswa");
// function query akan menerima isi parameter dari string query yg ada pada index2.php (line 3)
function query($query_ketiga){
    //dikarenakan $conn diiluar function query maka dibutuhkan scope global $conn
    global $conn;
    $Mahasiswa = mysqli_query($conn, $query_ketiga);
    //wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ($row = mysqli_fetch_assoc($Mahasiswa)){
        $rows[]=$row;
    }
return $rows;
}

function tambah ($data)
{
    global $conn;
    $Nim = $_POST["Nim"];
    $Nama = $_POST["Nama"];
    $No_hp = $_POST["No_hp"];
    $Tanggal_lahir = $_POST["Tanggal_lahir"];
    $Jurusan = $_POST["Jurusan"];

        $query = " INSERT INTO Mahasiswa
                    VALUES
                    ('','$Nim','$Nama','$No_hp','$Tanggal_lahir','$Jurusan')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM Mahasiswa WHERE id =$id");
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;   
    $Nim = $data["Nim"];
    $Nama = htmlspecialchars($data["Nama"]);
    $No_hp = htmlspecialchars($data["No_hp"]);
    $Tanggal_lahir = htmlspecialchars($data["Tanggal_lahir"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);

    $query= " UPDATE Mahasiswa SET
                Nim = '$Nim',
                Nama= '$Nama',
                No_hp = '$No_hp',
                Tanggal_lahir = '$Tanggal_lahir',
                Jurusan = '$Jurusan',
                WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql= "SELECT * FROM mahasiswa WHERE
            Nim LIKE '%$keyword%' OR
            Nama LIKE '%$keyword%' OR
            No_hp LIKE '%$keyword%' OR
            Tanggal_lahir LIKE '%$keyword%' OR
            Jurusan LIKE '%$keyword%'
        ";
    // kembalikan ke function query dengan parameter $sql
    return query($sql);
    // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}