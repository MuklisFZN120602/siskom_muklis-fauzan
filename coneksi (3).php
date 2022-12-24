<?php
    $namaserver ="sql200.epizy.com";
    $namauser ="epiz_33237979";
    $password ="0abScX7vBqQU";
    $namadb ="epiz_33237979_wisata";

$conn = new mysqli($namaserver, $namauser, $password, $namadb);
if ($conn->connect_error){
    die("koneksi ke server gagal!");
} else{
    echo "";
}
?>
