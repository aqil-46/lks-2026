<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cari Event</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="navbar">
    <h1>Event Sekolah</h1>
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
    </div>
</div>

<div class="container">

    <div class="search-box">
        <form method="GET">
            <input type="text" name="keyword" 
                   placeholder="Cari kegiatan sekolah..."
                   value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <?php
    if(isset($_GET['keyword'])){
        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
        $query = mysqli_query($conn,
            "SELECT * FROM event WHERE judul LIKE '%$keyword%' 
             OR deskripsi LIKE '%$keyword%'");

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
    ?>

        <div class="card">
            <h3><?= $row['judul']; ?></h3>
            <p><?= $row['deskripsi']; ?></p>
            <p><b>Tanggal:</b> <?= $row['tanggal']; ?></p>
            <p><b>Lokasi:</b> <?= $row['lokasi']; ?></p>
        </div>

    <?php
            }
        } else {
            echo "<div class='empty-state'>
                    <h3>Tidak ada event ditemukan</h3>
                    <p>Coba gunakan kata kunci lain.</p>
                  </div>";
        }
    }
    ?>

</div>

</body>
</html>
