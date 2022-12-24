<?php
include ("coneksi.php")

$nomor = $_GET["no"];
$sql = "SELECT * FROM pantai WHERE No=" . $nomor;
$hasil = $conn->query($sql);
echo "<br>";
if ($hasil->num_rows > 0) {
    while ($baris = $hasil->fetch_assoc()) {
        $nama_pantai = $baris['nama_pantai'];
        $lokasi      = $baris['lokasi'];
        $review      = $baris['review'];
        $harga_tiket = $baris['harga_tiket'];
        $jam_buka    = $baris['jam_buka'];
        $gambar      = $baris['gambar'];
        echo "<img height=200px src='$gambar'>";
        echo "<br>";
        echo "nama_pantai: " . $nama_pantai;
        echo "<br>";
        echo "lokasi: " . $lokasi;
        echo "<br>";
        echo "review: " . $review;
        echo "<br>";
        echo "harga_tikete: " . $harga_tiket;
        echo "<br>";
        echo "jam_buka: " . $jam_buka;
        echo "<br><br><br>";
        echo "<a href='update.php?no=$nomor'>Ubah Data</a>";
        echo "<a href='delet.php?no=$nomor'>Delet Data</a>";
    }

} else {
    echo "Tidak ada hasil";
}
?>