<?php

// PENGULANGAN MENGGUNAKAN FOR
for ($i=1; $i <= 7; $i++) { 
    echo "Angka for $i <br>";
}

// PENGULANGAN MENGGUNAKAN WHILE
$x = 1;

while ($x <= 7) {
    echo "Angka while $x <br>";
    $x++;
}

?>

<!-- PENGULANGAN DASAR BERDASARKAN FORMULIR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="number" name="jumlah" placeholder="jumlah">
        <button type="submit">save</button>
    </form>

    <?php
        // MENGAMBIL DATA YANG TELAH DIKIRIM
        $name = $_POST['name'] ?? '';
        $jumlah = $_POST['jumlah'] ?? '';

        // MEMPROSES DATA DAN MENGEMBALIKANYA BERDASARKAN JUMLAH YANG DIINPUT
        for ($i=0; $i < $jumlah ; $i++) { 
            echo "Nama : ".$name."<br>";
        }
    ?>
</body>
</html>