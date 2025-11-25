<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penentu Level Coding</title>
</head>
<body>
    <!-- FORMULIR PENENTUAN LEVEL CODING BERDASARKAN JAM CODING -->
    <form action="" method="post">
        <input type="number" name="jam_coding">
        <button type="submit">save</button>
    </form>

    <?php
        // PENGAMBILAN DATA JAM CODING
        $jam = $_POST['jam_coding'] ?? '';

        // PENENTUAN LEVEL KODING BERDASARKAN KONDISI JAM CODING
        if ($jam < 50) {
            echo 'Level Pemula';
        } elseif ($jam >= 50 && $jam <= 200) {
            echo 'Level Menengah';
        } else {
            echo 'Level Sepuh';
        }
    ?>
</body>
</html>