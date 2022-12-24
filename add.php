<?php 
    // connect database
include("coneksi.php");

    // kode ini akan dijalankan ketika user menekan button dengan name submit
if(isset($_POST["submit"])){
        // membuat variabel yang berisi input dari form
    $nama_pantai   = $conn->real_escape_string($_POST['nama_pantai']);
    $lokasi        = $conn->real_escape_string($_POST['lokasi']);
    $review        = $conn->real_escape_string($_POST['review']);
    $harga_tiket   = $conn->real_escape_string($_POST['harga_tiket']);
    $jam_buka      = $conn->real_escape_string($_POST['jam_buka']);
        //membuat alamat gambarnya
    $filename = $_FILES['gambar']["name"];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $new_name = date('YmdHis');
    $tempname = $_FILES['gambar']['tmp_name'];
    $folder = "./images/".$name.".".$extension;

        // melakukan upload gambar ke folder image
        // jika ada gambar yang diunggah maka kita akan memasukkan seluruh data
        // jika tidak ada gambar maka kita akan memasukkan seluruh data kecuali kolom image
if(move_uploaded_file($tempname, $folder)){
    $sql = "INSERT INTO pantai(nama_pantai, lokasi, review, harga_tiket, jam_buka, gambar ) VALUES ('$nama_pantai', '$lokasi', '$review', $harga_tiket, 'jam_buka', 'gambar')";        
    } else {
    $sql = "INSERT INTO pantai (nama_pantai, lokasi, review, harga_tiket, jam_buka,) VALUES ('$nama_pantai', '$lokasi', '$review', $harga_tiket, 'jam_buka')";
    } 
        // menjalankan query
    $result = $conn->query($sql);

    if($result) {
            // jika query sukses maka akan diarahkan ke page index.php
            header('Location: index.php');
    } else {
        echo "error";
    }
}
?>
<html>
    <head>
        <title>tambahkan data</title>
    </head>
    <body>
        <h1>Tambahkan data</h1>
        <!-- Ini settingan untuk membuat form yang dapat mengupload gambar -->
        <form method="POST" action="add.php" enctype="multipart/form-data">
            <label>nama pantai</label>
            <br>
            <input type="text" name="nama_pantai">
            <br>
            <label>lokasi</label>
            <br>
            <input type="text" name="lokasi">
            <br>
            <label>review<label>
            <br>
            <input type="text" name="review">
            <br>
            <label>harga tiket</label>
            <br>
            <input type="text" name="harga_tiket">
            <br>
            <label>jam buka</label>
            <br>
            <input type="text" name="jam_buka">
            <br>
            <label>gambar</label>
            <br>
            <input type="file" name="gambar">
            <br>
            <br>
            <!-- button type submit ini berfungsi untuk submit form -->
            <button type="submit" name="submit" value="submit">Submit</button>
        </form>
    </body>
<html>
