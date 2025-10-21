<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <input type="submit" name="tampilkan" value="Tampilkan Kehadiran">
    </form>
    
<script>
        // Script untuk menampilkan input alasan jika status = izin
        function tampilkanAlasan(index) {
            const select = document.getElementById('status' + index);
            const alasanInput = document.getElementById('alasan' + index);
            if (select.value === 'Izin') {
                alasanInput.style.display = 'block';
            } else {
                alasanInput.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<h2>Tugas 3 - Menentukan Status Kehadiran Karyawan</h2>

<form method="post">
    <label for="jumlah">Masukkan Jumlah Karyawan:</label>
    <input type="number" id="jumlah" name="jumlah" min="1" required>
    <button type="submit" name="buat">Buat Form Input Nama</button>
</form>

<?php
// Tahap 1: buat form input nama & status
if (isset($_POST['buat'])) {
    $jumlah = $_POST['jumlah'];
    echo "<form method='post' style='width:65%;margin:auto;background:white;padding:25px;border-radius:10px;box-shadow:0 3px 6px rgba(0,0,0,0.3);'>";
    echo "<input type='hidden' name='jumlah' value='$jumlah'>";
    echo "<h3>Masukkan Data Kehadiran Karyawan</h3>";

    for ($i = 1; $i <= $jumlah; $i++) {
        echo "<label>Nama Karyawan $i:</label>";
        echo "<input type='text' name='karyawan[]' placeholder='Masukkan nama karyawan ke-$i' required>";

        echo "<label>Status Kehadiran:</label>";
        echo "<select name='status[]' id='status$i' onchange='tampilkanAlasan($i)' required>
                <option value='' hidden>Pilih Status</option>
                <option value='Hadir'>Hadir</option>
                <option value='Izin'>Izin</option>
                <option value='Sakit'>Sakit</option>
              </select>";

        echo "<input type='text' name='alasan[]' id='alasan$i' placeholder='Alasan izin...' style='display:none;'>";
        echo "<hr>";
    }

    echo "<button type='submit' name='tampilkan'>Tampilkan Hasil Kehadiran</button>";
    echo "</form>";
}

// Tahap 2: tampilkan hasil tabel
if (isset($_POST['tampilkan'])) {
    $karyawan = $_POST['karyawan'];
    $status = $_POST['status'];
    $alasan = $_POST['alasan'];

    echo "<table>";
    echo "<tr><th>No</th><th>Nama Karyawan</th><th>Status Kehadiran</th><th>Alasan (jika izin)</th></tr>";

    for ($i = 0; $i < count($karyawan); $i++) {
        $no = $i + 1;
        $stat = $status[$i];

        if ($stat == "Hadir") {
            $statusTampil = "<span class='hadir'>Hadir</span>";
            $alasanTampil = "-";
        } elseif ($stat == "Sakit") {
            $statusTampil = "<span class='sakit'>Sakit</span>";
            $alasanTampil = "-";
        } else {
            $statusTampil = "<span class='izin'>Izin</span>";
            $alasanTampil = htmlspecialchars($alasan[$i]) ?: "-";
        }

        echo "<tr>
                <td>$no</td>
                <td>{$karyawan[$i]}</td>
                <td>$statusTampil</td>
                <td>$alasanTampil</td>
              </tr>";
    }

    echo "</table>";
}
?>
</body>
</html>