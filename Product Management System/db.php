<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dbs";
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    echo "not connected";
}
?>