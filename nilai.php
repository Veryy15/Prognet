<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian</title>
</head>
<body>
    <h2>Form Penilaian Mata Kuliah Pemrograman Internet</h2>
    
    <form method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>
        
        <label for="nilai">Nilai Angka (0 - 100):</label>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = $_POST['nilai'];

        if ($nilai >= 85 && $nilai <= 100) {
            $nilai_huruf = "A";
        } elseif ($nilai >= 80 && $nilai < 85) {
            $nilai_huruf = "B+";
        } elseif ($nilai >= 70 && $nilai < 80) {
            $nilai_huruf = "B";
        } elseif ($nilai >= 65 && $nilai < 70) {
            $nilai_huruf = "C+";
        } elseif ($nilai >= 55 && $nilai < 65) {
            $nilai_huruf = "C";
        } elseif ($nilai >= 50 && $nilai < 55) {
            $nilai_huruf = "D";
        } else {
            $nilai_huruf = "E";
        }

        echo "<h3>Hasil Penilaian:</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "NIM: " . htmlspecialchars($nim) . "<br>";
        echo "Nilai Angka: " . htmlspecialchars($nilai) . "<br>";
        echo "Nilai Huruf: " . $nilai_huruf . "<br>";
    }
    ?>
</body>
</html>
