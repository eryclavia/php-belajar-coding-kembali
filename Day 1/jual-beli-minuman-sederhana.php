<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Minuman</title>
</head>
<body>
    <!-- FORMULIR INPUT -->
    <form action="" method="post">
        <input type="text" name="minuman">
        <button type="submit">save</button>
    </form>

    <?php
        // PENGAMBILAN DATA YANG TELAH DIKIRIM
        $minuman = $_POST['minuman'] ?? '';

        // LIST MINUMAN YANG ADA
        $listMinuman = ['teh', 'kopi', 'susu'];

        // PROSES PENGECEKKAN DATA (APAKAH ADA/TIDAK DALAM ARRAY)
        if (in_array($minuman, $listMinuman)) {
            echo "Anda membeli ".$minuman." dan membayarnya";
        } else {
            echo "minuman tidak tersedia";
        }
    ?>
</body>
</html>