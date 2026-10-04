<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function hitungFaktorial($n) {
    if ($n < 0) {
        return "Tidak terdefinisi untuk bilangan negatif";
    }
    $faktorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $faktorial *= $i;
    }
    return $faktorial;
}

$angka = isset($_POST['angka']) ? (int)$_POST['angka'] : 0;

$hasil_faktorial = hitungFaktorial($angka);

$nim = "255150701111032"; 
$nama = "Jason Enkristo"; 

$data_array = array(
    "angka" => $angka,
    "faktorial" => $hasil_faktorial,
    "nim" => $nim,
    "nama" => $nama
);

$_SESSION['data_faktorial'] = $data_array;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3.3b - Hasil Faktorial</title>
</head>
<body>
    <h2>Hasil Perhitungan Faktorial</h2>

    <p>Nilai angka yang dimasukkan: <b><?php echo $angka; ?></b></p>
    <p>Nilai faktorial: <b><?php echo $hasil_faktorial; ?></b></p>

    <br>
    <a href="Lat3_3c.php">Menuju ke File Ketiga</a>
</body>
</html>
