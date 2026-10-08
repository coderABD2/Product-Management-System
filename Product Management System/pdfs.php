<?php

include "db.php";
require "vendor/autoload.php";

$result = $conn->query("SELECT * FROM menu");

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('times', 'I', 14);

$pdf->Cell(0, 10, "books_se", 0, 1, 'C');

$html = '
<table border="1" cellpadding="5">
    <tr style="background-color:skyblue; color:green;">
        <td>id</td>
        <td>name</td>
        <td>Description</td>
        <td>Price</td>
        <td>Category</td>
    </tr>';

while ($row = $result->fetch_assoc()) {

    $html .= '
    <tr style="background-color:yellow; color:red;">
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['disc'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['category'] . '</td>
    </tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, 'C');

$pdf->Output('product.pdf', 'D');
