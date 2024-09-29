<?php
// Fungsi untuk menentukan status AC berdasarkan suhu dan kelembapan
function statusAC($suhu, $kelembapan) {
    if ($suhu < 20) {
        return "AC Mati";
    } elseif ($suhu >= 20 && $suhu < 25 && $kelembapan <= 50) {
        return "AC Menyala - Daya Rendah";
    } elseif ($suhu >= 25 && $suhu < 30 && $kelembapan > 50 && $kelembapan <= 70) {
        return "AC Menyala - Daya Sedang";
    } elseif ($suhu >= 30 || $kelembapan > 70) {
        return "AC Menyala - Daya Tinggi";
    } else {
        return "Input tidak valid";
    }
}

// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input suhu dan kelembapan dari form
    $suhu = $_POST['suhu'];
    $kelembapan = $_POST['kelembapan'];
    
    // Memvalidasi input (opsional)
    if (is_numeric($suhu) && is_numeric($kelembapan)) {
        $status = statusAC($suhu, $kelembapan);
    } else {
        $status = "Masukkan nilai numerik yang valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendali AC</title>
</head>
<body>
    <h1>Kendali AC</h1>
    <form method="post" action="">
        <label for="suhu">Masukkan Suhu (°C):</label><br>
        <input type="text" name="suhu" id="suhu" required><br><br>
        
        <label for="kelembapan">Masukkan Kelembapan (%):</label><br>
        <input type="text" name="kelembapan" id="kelembapan" required><br><br>
        
        <input type="submit" value="Kirim">
    </form>

    <?php
    if (isset($status)) {
        echo "<h2>Status AC: $status</h2>";
    }
    ?>
</body>
</html>
