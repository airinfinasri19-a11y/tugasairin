<!DOCTYPE html>
<html>
<head>
    <title>Memberi Nilai Huruf</title>
</head>
<body>
    <h2>Tugas 4 - Memberi Nilai Huruf pada Daftar Nilai</h2>
    <form method="post">
        <table border="1" cellpadding="5">
            <tr><th>Nilai</th></tr>
            <?php
            for ($i=1; $i<=5; $i++) {
                echo "<tr><td><input type='number' name='nilai[]' min='0' max='100' required></td></tr>";
            }
            ?>
        </table><br>
        <input type="submit" name="konversi" value="Konversi Nilai">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        echo "<h3>Hasil Konversi Nilai:</h3>";
        echo "<table border='1' cellpadding='5'>
                <tr><th>Nilai</th><th>Huruf</th></tr>";
        foreach ($nilai as $n) {
            if ($n >= 85) $huruf = "A (Sangat Baik)";
            else if ($n >= 70) $huruf = "B (Baik)";
            else if ($n >= 60) $huruf = "C (Cukup)";
            else $huruf = "D (Kurang)";
            echo "<tr><td>$n</td><td>$huruf</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
