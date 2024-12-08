<?php
    session_start();
    include('../../connect.php');

   $id = $_REQUEST['id']; 

   $sql = "DELETE FROM `danhmuc` WHERE id = $id";
    
    if(mysqli_query($conn, $sql)) {
        $_SESSION['delelteSuccess'] = true;
        header('Location: ../../pages/danhmuc/danhsach.php');
    }
    echo 'Lỗi xoá danh mục';
?>