<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Hapus jadwal periksa dokter terlebih dahulu
    $query1 = "DELETE FROM jadwal_periksa WHERE id_dokter = $id";
    mysqli_query($mysqli, $query1);

    // Hapus dokter
    $query2 = "DELETE FROM dokter WHERE id = $id";
    if (mysqli_query($mysqli, $query2)) {
        echo '<script>';
        echo 'alert("Data dokter berhasil dihapus!");';
        echo 'window.location.href = "../../dokter.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
