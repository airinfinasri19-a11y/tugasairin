<!DOCTYPE html>
<html>
<head>
    <title>Program Rata-Rata Nilai Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f7;
            text-align: center;
            margin-top: 50px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type="number"] {
            width: 80%;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }
        .hasil {
            margin-top: 20px;
            font-size: 18px;
            padding: 10px;
            border-radius: 8px;
            width: 350px;
            margin: 20px auto;
        }
        .lulus {
            background-color: #2ecc71;
            color: white;
        }
        .tidak {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Program Rata-Rata Nilai Siswa</h2>

    <form method="post">
        <label>Masukkan 5 Nilai Siswa:</label><br>
        <input type="number" name="nilai1" placeholder="Nilai 1" required><br>
        <input type="number" name="nilai2" placeholder="Nilai 2" required><br>
        <input type="number" name="nilai3" placeholder="Nilai 3" required><br>
        <input type="number" name="nilai4" placeholder="Nilai 4" required><br>
        <input type="number" name="nilai5" placeholder="Nilai 5" required><br>
        <input type="submit" value="Hitung Rata-Rata">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil semua nilai dari input
        $nilai = [
            $_POST["nilai1"],
            $_POST["nilai2"],
            $_POST["nilai3"],
            $_POST["nilai4"],
            $_POST["nilai5"]
        ];

        // Hitung total dan rata-rata
        $total = 0;
        for ($i = 0; $i < count($nilai); $i++) {
            $total += $nilai[$i];
        }
        $rata = $total / count($nilai);

        // Tentukan keterangan kelulusan
        if ($rata >= 75) {
            $keterangan = "Lulus";
            $class = "lulus";
        } else {
            $keterangan = "Tidak Lulus";
            $class = "tidak";
        }

        // Tampilkan hasil
        echo "<div class='hasil $class'>";
        echo "Nilai Siswa: " . implode(", ", $nilai) . "<br>";
        echo "Rata-rata: <b>" . number_format($rata, 2) . "</b><br>";
        echo "Keterangan: <b>$keterangan</b>";
        echo "</div>";
    }
    ?>

</body>
</html>