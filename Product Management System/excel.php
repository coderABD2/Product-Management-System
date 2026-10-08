 <?php
include "db.php";
session_start();
$result=$conn->query("select id,name,disc,price,category from menu");
header('Content-type:text/csv');
header("Content-disposition:attachment;filename=menu.csv");
$output=fopen("php://output","W");
fputcsv($output,array('id','name','discription','price','category'));
while($row=$result->fetch_assoc()){
    fputcsv($output,$row);
}

?> 