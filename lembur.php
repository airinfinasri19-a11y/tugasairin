<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Gaji dan Lembur Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 40px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 18px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        caption {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>

<h1>Perhitungan Gaji dan Lembur Karyawan</h1>

<?php
// Data jam kerja mingguan karyawan
$jam_kerja = [40, 35, 50, 45];

// Tarif upah
$tarif_normal = 20000;    // per jam
$tarif_lembur = 25000;   // per jam lembur
$jam_normal = 40;

echo "<table>";
echo "<caption>Rincian Gaji Karyawan</caption>";
echo "<tr>
        <th>No</th>
        <th>Jam Kerja (jam)</th>
        <th>Jam Normal</th>
        <th>Jam Lembur</th>
        <th>Gaji Normal (Rp)</th>
        <th>Gaji Lembur (Rp)</th>
        <th>Total Gaji (Rp)</th>
      </tr>";

for ($i = 0; $i < count($jam_kerja); $i++) {
    $jam_biasa = ($jam_kerja[$i] > $jam_normal) ? $jam_normal : $jam_kerja[$i];
    $jam_lembur = ($jam_kerja[$i] > $jam_normal) ? $jam_kerja[$i] - $jam_normal : 0;

    $gaji_biasa = $jam_biasa * $tarif_normal;
    $gaji_lembur = $jam_lembur * $tarif_lembur;
    $total_gaji = $gaji_biasa + $gaji_lembur;

    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>" . $jam_kerja[$i] . "</td>";
    echo "<td>" . $jam_biasa . "</td>";
    echo "<td>" . $jam_lembur . "</td>";
    echo "<td>" . number_format($gaji_biasa, 0, ',', '.') . "</td>";
    echo "<td>" . number_format($gaji_lembur, 0, ',', '.') . "</td>";
    echo "<td>" . number_format($total_gaji, 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>