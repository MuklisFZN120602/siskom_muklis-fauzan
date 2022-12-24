<?php 
    // connect database
include("coneksi.php");

// sql to create table
// $sql = "CREATE TABLE pantai (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// nama_pantai VARCHAR(255) NOT NULL,
// lokasi VARCHAR(255) NOT NULL,
// review VARCHAR(255),
// harga_tiket INT(6),
// jam_buka VARCHAR(255),
// gambar VARCHAR(255),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// $sql = "INSERT INTO pantai (nama_pantai, lokasi, review, harga_tiket, jam_buka, gambar) VALUES ('pantai bagedur','Pantai bagedur sukamanah kec. malingping kab.lebak banten', 'pantai bagedur tempatnya selalu ramai, keren dan cocok untuk berenang, makan makan, dan berpoto',5000,'07,00','https://postimg.cc/Bj0PDTkt') ";
// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$sql = "SELECT id, nama_pantai, lokasi, review, harga_tiket, jam_buka, gambar FROM pantai";
$result = $conn->query($sql);

// semua data bakal disimpan dalam bentuk associated array di variabel $pantai
$kumpulan = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="device-width, initial-scale">
        <title>MUKLIS FAUZAN</title>
        <link rel="stylesheet" href="hasilnyaa.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
    <!---header-->
           <div class="medsos">
               <div class="conteiner">
                   <ul>
                       <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                       <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                       <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        <header>
            <div class="conteiner">
            <h1><a href="index.php">Muklis Fauzan</a></h1>
                <ul>
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="contak.php">CONTAK</a></li>
                </ul>
            </div>
        </header>
    <!---benner-->
        <div class="banner">
            <h2>SELAMAT DATANG DI WEBSITE KAMI</h2>
            <img src="img/10pantai.jpeg">
        </div>
    <!--tentang-->
        <div class="tentang">
            <div class="conteiner">
                <h3>TENTANG KABUPATEN LEBAK</h3>
                <p>Kabupaten Lebak merupakan <strong>Wilayah Suku Sunda dan berada pada satu Provinsi yaitu Provinsi BANTEN</strong> terletak diwilayah diujung PULAU JAWA, kabupaten lebak merupakan 
                tempat tinggal saya, teman, keluarga dan orang orang yang tinggal dikab. lebak, memiliki tempat tempat wisata asri dan indah, yang biasa nya dikunjungi oleh para masyarakat dari dalam 
                negri maupun luar negri. salah satu tempat wisata yang sering dikunjungi oleh orang lain yaitu pantai, kab. lebak memiliki banyak wisata pantai, dari pantai binuangeun hingga sampai ke 
                pantai sawarna.</p>
            </div>
        </div>
    <!---service-->
    <div class="conteiner">
        <h3>10 RECOMENDASI PANTAI DI KAB.LEBAK BANTEN</h3>
      <?php foreach($kumpulan as $pantai): ?>
            <!-- ketika elemen ini diklik akan diarahkan ke page detail dengan membawa id pada URLnya -->
      <a href=<?php echo "detail.php?id=". $pantai['id']; ?>>
      <p><?php echo $pantai['nama_pantai']; ?></p>
            <!-- ini buat check link imagenya. jika tidak ada link menuju gambar, maka kode ini tidak akan dijalankan -->
      <?php if($pantai["gambar"]) {
        echo "<img src= ".$pantai['gambar']. " width='200' >";
      }?>
    </div>
      </a>
<?php endforeach; ?>
    </div>
    <div>
        <a class="tambah" href="add.php">Tambah Data</a>
    </div>
    <!---footer-->
        <footer>
            <div class="conteiner">
                <small>2022 - Muklis Fauzan. NPM 240310217001</small>
            </div>
        </footer>
    </body>
</html>