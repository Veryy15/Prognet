<?php
// Data siswa
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];


$total_lulus = 0;
$total_tidak_lulus = 0;

foreach ($siswa as &$data) {
    $rata_rata = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;
    $data['rata_rata'] = round($rata_rata, 2);

    if ($data['rata_rata'] >= 75) {
        $data['status'] = "Lulus";
        $total_lulus++; 

    } else {
        $data['status'] = "Tidak Lulus";
        $total_tidak_lulus++; 

        $nilai_terendah = min($data['matematika'], $data['bahasa_inggris'], $data['ipa']);
        $mata_pelajaran = array_search($nilai_terendah, [
            'matematika' => $data['matematika'], 
            'bahasa_inggris' => $data['bahasa_inggris'], 
            'ipa' => $data['ipa']
        ]);

        $data['perbaikan'] = ucfirst(str_replace('_', ' ', $mata_pelajaran));
    }
}

echo "<h2>Daftar Siswa</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Nama</th><th>Rata-rata</th><th>Status</th><th>Rekomendasi Perbaikan</th></tr>";

foreach ($siswa as &$data) {
    echo "<tr>";
    echo "<td>{$data['nama']}</td>";
    echo "<td>{$data['rata_rata']}</td>";
    echo "<td>{$data['status']}</td>";

    if ($data['status'] == "Tidak Lulus") {
        echo "<td>{$data['perbaikan']}</td>";
    } else {
        echo "<td>-</td>";
    }

    echo "</tr>";
}
echo "</table>";


echo "<h3>Total Lulus: $total_lulus</h3>";
echo "<h3>Total Tidak Lulus: $total_tidak_lulus</h3>";

?>
