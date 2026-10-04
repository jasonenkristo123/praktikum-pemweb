<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3.3c - Tampil Data Session</title>
</head>
<body>
    <h2>Data yang Disimpan dalam Session</h2>

    <?php
    if (isset($_SESSION['data_faktorial'])) {
        $data = $_SESSION['data_faktorial'];

        echo "<p>Berikut adalah nilai variabel yang tersimpan dalam session:</p>";
        echo "<ul>";
        echo "<li>Nilai Angka: <b>" . htmlspecialchars((string)$data['angka']) . "</b></li>";
        echo "<li>Nilai Faktorial: <b>" . htmlspecialchars((string)$data['faktorial']) . "</b></li>";
        echo "<li>NIM: <b>" . htmlspecialchars((string)$data['nim']) . "</b></li>";
        echo "<li>Nama: <b>" . htmlspecialchars((string)$data['nama']) . "</b></li>";
        echo "</ul>";

        session_unset();
        session_destroy();

        echo "<p><i>Seluruh variabel yang tersimpan dalam session telah berhasil dihapus.</i></p>";
    } else {
        echo "<p>Tidak ada variabel session yang tersimpan (atau sudah dihapus).</p>";
    }
    ?>

    <br>
    <a href="Lat3_3a.php">&laquo; Kembali ke Halaman Input (Lat3_3a.php)</a>
</body>
</html>
