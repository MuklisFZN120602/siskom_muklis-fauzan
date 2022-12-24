<?php
    // koneksi ke database
    include('coneksi.php');
    
    // mengambil id dari URL dan mengambil data dari id tersebut
    if(isset($_GET['id'])){
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT id, nama_pantai, lokasi, review, harga_tiket, jam_buka, gambar FROM pantai WHERE id=".$id;
        $result = $conn->query($sql);
    // mengubah data menjadi associated array
        $pantai = $result->fetch_assoc();
        $result->free_result();
        $conn->close();
    }

    // check jika button delete diklik
    if(isset($_POST['delete'])){
    // ambil value yang dibawa oleh button delete
        $id_to_delete= $conn->real_escape_string($_POST['delete']);
        // delete data dengan id tertentu
        $sql = "DELETE FROM pantai WHERE id=".$id_to_delete;
        $result = $conn->query($sql);

        if($result){
            // jika query sukses dijalankan maka kita akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

?>

<html>
    <head>
        <title>Detail</title>
    </head>
    <body>
        <h1>Detail</h1>
        <ul>
            <li><?php echo $pantai['id']; ?></li>
            <li><?php echo $pantai['nama_pantai']; ?></li>
            <li><?php echo $pantai['lokasi']; ?></li>
            <li><?php echo $pantai['review']; ?></li>
            <li><?php echo $pantai['harga_tiket']; ?></li>
            <li><?php echo $pantai['jam_buka']; ?></li>
        </ul>
        <!-- check jika ada link gambar. jika ada maka akan memunculkan tag img -->
        <?php if($pantai["gambar"]) {
            echo "<img src= ".$pantai['gambar']. " width='200' >";
        }?>
        <form action="detail.php" method="POST">
        <!-- button ini kita namakan delete dan mengandung nilai id yang akan dimasukkan ke dalam query -->        
            <button type="submit" name="delete" value=<?php echo $pantai['id']; ?>>Delete</button>
            <!-- kita buat link khusus ke page update dengan membawa id data yang akan diupdate -->        
            <a href=<?php echo "update.php?id=".$pantai['id']; ?>>Update data</a>       
        </form>
    </body>
</html>