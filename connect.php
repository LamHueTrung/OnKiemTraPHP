<?php 
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database ='110121255';

    $conn = new mysqli($hostname, $username, $password, $database);

    if($conn->connect_error) {
        echo 'Kết nối thất bại';
    } 
?>