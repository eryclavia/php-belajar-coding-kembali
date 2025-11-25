<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisi Nilai Siswa</title>
</head>
<body>

    <!-- FORM INPUT -->
    <form action="" method="post">
        <input type="text" name="nama_siswa" placeholder="Nama Siswa">
        <input type="number" name="nilai" placeholder="Nilai Siswa">
        <button type="submit">Save</button>
    </form>

    <?php
        // WADAH ARRAY MULTI DIMENSI
        $dataSiswa = [];

        // PROSES INPUT
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = $_POST['nama_siswa'] ?? '';
            $nilai = $_POST['nilai'] ?? 0;

            // CEK GRADE
            if ($nilai >= 90) {
                $grade = "A";
            } elseif ($nilai >= 80) {
                $grade = "B";
            } elseif ($nilai >= 70) {
                $grade = "C";
            } else {
                $grade = "D";
            }

            // SIMPAN DATA
            $dataSiswa[] = [
                "nama" => $nama,
                "nilai" => $nilai,
                "grade" => $grade
            ];
        }

        // PERHITUNGAN RATA-RATA (LEVEL 3)
        $totalNilai = 0;
        $jumlahSiswa = count($dataSiswa);

        foreach ($dataSiswa as $item) {
            $totalNilai += $item['nilai'];
        }

        $rataRata = $jumlahSiswa > 0 ? $totalNilai / $jumlahSiswa : 0;
    ?>

    <br><br>

    <table border="1" cellspacing="0" width="50%">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nilai</th>
            <th>Grade</th>
            <th>Keterangan</th>
        </tr>

        <?php foreach ($dataSiswa as $index => $item) { ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $item['nama']; ?></td>
                <td><?php echo $item['nilai']; ?></td>
                <td><?php echo $item['grade']; ?></td>
                <td>
                    <?php
                        if ($item['nilai'] >= 50) {
                            echo "LULUS";
                        } else {
                            echo "REMEDIAL";
                        }
                    ?>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td colspan="2"><b>Rata-rata Kelas</b></td>
            <td colspan="3"><?php echo $rataRata; ?></td>
        </tr>
    </table>

</body>
</html>
