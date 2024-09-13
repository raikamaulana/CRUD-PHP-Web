<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])){
    header("Location: indexLogin.php");
}
require_once ("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($mysqli, "select * from data_murid");
$html = "<center><h2>Daftar Nama Siswa XII RPL 3 - Angkatan 2024</h2></center><br/><br/><hr/>";
$html .= "<br/><table border='1' width='100%'><br/>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
        </tr>";
$no = 1;
while ($row = mysqli_fetch_array($query)){
    $html .= "<tr>
                <td>".$no."</td>
                <td>".$row['nis']."</td>
                <td>".$row['nisn']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['jenis_kelamin']."</td>
            </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file PDF
$dompdf->stream("Data_Siswa_XIIRPL3.pdf");

?>