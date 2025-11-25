<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir Sederhana</title>
</head>
<body>
    <!-- FORMULIR PEMBELIAN BARANG -->
    <form action="" method="post">
        <input type="text" name="barang" placeholder="barang">
        <input type="number" name="jumlah" placeholder="jumlah">
        <button type="submit">save</button>
    </form>
    <?php
        $listBarang = [
            'teh' => 3000,
            'kopi' => 4000,
            'susu'=> 5000
        ];

        // PROSES PENYIMPANAN DATA BARANG DAN JUMLAH
        $barang = $_POST['barang'] ?? '';
        $jumlah = $_POST['jumlah'] ?? 0;

        // PENGECEKAN HARGA BARANG
        if (isset($listBarang[$barang]) ) {
            echo "Anda membeli ".$barang." dengan jumlah ".$jumlah." seharga ".$listBarang[$barang]."<br>";
            // perhitungan harga total
            $harga = $jumlah * $listBarang[$barang];
            echo "Total harga barang : ".$harga."<br>";
            // Diskon jika jumlah beli lebih dari 5
            if ($jumlah >5) {
                $diskon = $harga/10;
                $total = $harga - $diskon;
                echo "Diskon : ".$diskon."<br>";
                echo "Total bayar : ".$total;
            }
        } else {
            echo "Barang tidak tersedia";
        }
    ?>
</body>
</html>