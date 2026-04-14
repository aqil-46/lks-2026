<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Event</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="navbar">
    <h1>Event Sekolah</h1>
    <div class="menu">
        <a href="search.php">Cari</a>
        <a href="login.php">Login</a>
    </div>
</div>


<div class="container">
    <br>

    <?php
    $query = mysqli_query($conn,"SELECT * FROM event ORDER BY id DESC LIMIT 5");
    while($row = mysqli_fetch_assoc($query)){
    ?>
        <div class="card">
            <h3><?= $row['judul']; ?></h3>
            <p><?= $row['deskripsi']; ?></p>
            <p><b>Tanggal:</b> <?= $row['tanggal']; ?></p>
            <p><b>Lokasi:</b> <?= $row['lokasi']; ?></p>
        </div>
    <?php } ?>
</div>

</body>
</html>
