<?php
session_start();

// Wadah data siswa jika belum ada
if (!isset($_SESSION['siswa'])) {
    $_SESSION['siswa'] = [];
}

// AMBIL ID EDIT JIKA ADA
$editId = $_GET['edit'] ?? null;
$editData = $editId !== null ? $_SESSION['siswa'][$editId] : null;


// PROSES UPDATE
if (isset($_POST['update'])) {

    $namaBaru = $_POST['nama_siswa'];
    $nilaiBaru = $_POST['nilai'];

    // hitung grade ulang
    if ($nilaiBaru >= 90) {
        $grade = "A";
    } elseif ($nilaiBaru >= 80) {
        $grade = "B";
    } elseif ($nilaiBaru >= 70) {
        $grade = "C";
    } else {
        $grade = "D";
    }

    // UPDATE DATA
    $_SESSION['siswa'][$editId] = [
        "nama" => $namaBaru,
        "nilai" => $nilaiBaru,
        "grade" => $grade
    ];

    // redirect agar URL bersih
    header("Location: index.php");
    exit;
}


// PROSES INPUT (SAVE)
if (isset($_POST['save'])) {

    $nama = $_POST['nama_siswa'];
    $nilai = $_POST['nilai'];

    if ($nilai >= 90) {
        $grade = "A";
    } elseif ($nilai >= 80) {
        $grade = "B";
    } elseif ($nilai >= 70) {
        $grade = "C";
    } else {
        $grade = "D";
    }

    $_SESSION['siswa'][] = [
        "nama" => $nama,
        "nilai" => $nilai,
        "grade" => $grade
    ];
}


// DELETE DATA
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($_SESSION['siswa'][$id]);
    $_SESSION['siswa'] = array_values($_SESSION['siswa']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Nilai Siswa</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="nama_siswa" placeholder="Nama Siswa" 
           value="<?php echo $editData['nama'] ?? ''; ?>">

    <input type="number" name="nilai" placeholder="Nilai Siswa" 
           value="<?php echo $editData['nilai'] ?? ''; ?>">

    <?php if ($editData) { ?>
        <button type="submit" name="update">Update</button>
    <?php } else { ?>
        <button type="submit" name="save">Save</button>
    <?php } ?>
</form>

<br><br>

<table border="1" cellspacing="0" width="60%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nilai</th>
        <th>Grade</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>

    <?php foreach ($_SESSION['siswa'] as $i => $item) { ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $item['nama']; ?></td>
            <td><?php echo $item['nilai']; ?></td>
            <td><?php echo $item['grade']; ?></td>
            <td><?php echo $item['nilai'] >= 50 ? "Lulus" : "Remedial"; ?></td>
            <td>
                <a href="?edit=<?php echo $i; ?>">Edit</a> |
                <a href="?delete=<?php echo $i; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>