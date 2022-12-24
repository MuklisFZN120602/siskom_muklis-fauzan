<?php 
// connect database
include("coneksi.php");

    // mengambil id dari URL dan mengambil data dari id tersebut
    if(isset($_GET['id'])){
        $id     = $conn->real_escape_string($_GET["id"]);
        $sql    = "SELECT id, nama_pantai, lokasi, review, harga_tiket, jam_buka, gambar FROM pantai WHERE id=".$id;
        $result = $conn->query($sql);
        $pantai = $result->fetch_assoc();
        $result ->free_result();
        $conn   ->close();
    }
  // mengambil data dari form yang memiliki button submit bernama update
    if(isset($_POST['update'])){
        // membuat variabel dari setiap data yang ada di form
        $id_to_update = $conn->real_escape_string($_POST['update']);
        $name_pantai  = $conn->real_escape_string($_POST['nama_pantai']);
        $lokasi       = $conn->real_escape_string($_POST['lokasi']);
        $review       = $conn->real_escape_string($_POST['review']);
        $harga_tiket  = $conn->real_escape_string($_POST['harga_tiket']);
        $jam_buka     = $conn->real_escape_string($_POST['jam_buka']);

        // membuat link dari gambar yang kita upload
        $filename  = $_FILES['gambar']["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name  = date('YmdHis');
        $tempname  = $_FILES['gambar']['tmp_name'];
        $folder    = "./img/".$new_name.".".$extension;
        
        // mengupload gambar. jika ada gambar maka akan mengupdate data gambar, jika tidak maka kita tidak akan mengupdate data gambar
        if(move_uploaded_file($tempname, $folder)){
            $sql = "UPDATE pantai SET name='$nama_pantai', lokasi='$lokasi', review='$review', harga_tiket=$harga_tiket, jam_buka='$jam_buka', gambar='$folder' WHERE id=$id_to_update";
        } else {
            $sql = "UPDATE pantai SET name='$nama_pantai', lokasi='$lokasi', review='$review', harga_tiket=$harga_tiket, jam_buka='$jam_buka', WHERE id=$id_to_update";
        }
        $result = $conn->query($sql);

        // menjalankan query
        if($result) {
            // jika query berhasil maka akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo "error";
        }   
    }
?>

<html>
    <head>
        <title>Update data</title>
    </head>
    <body>
        <h1>Update</h1>
         <form method="POST" action="update.php" enctype="multipart/form-data">
            <label>Nama pantai</label>
            <br>
            <!-- menambahkan attribute value yang nilainya dari database. jadi nanti di input formnya langsung terisi nilai -->
            <input type="text" name="nama_pantai" value=<?php echo $pantai['nama_pantai']; ?> >
            <br>
            <label>lokasi</label>
            <br>
            <input type="text" name="lokasi" value=<?php echo $pantai['lokasi']; ?> >
            <br>
            <label>review<label>
            <br>
            <input type="text" name="review" value=<?php echo $pantai['review']; ?> >
            <br>
            <label>harga tiket<label>
            <br>
            <input type="text" name="harga_tiket" value=<?php echo $pantai['harga_tiket']; ?> >
            <br>
            <label>jam buka<label>
            <br>
            <input type="text" name="jam_buka" value=<?php echo $pantai['jam_buka']; ?> >
            <br>
            <label>gambar<label>
            <br>
            <input type="file" name="gambar" value=<?php echo $pantai['gambar']; ?> >
            <br>
            <br>
            <button type="submit" name="update" value=<?php echo $pantai["id"]; ?>>Submit</button>
        </form>
    </body>
</html>
