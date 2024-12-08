<?php
    session_start();
    include('../../connect.php');

   $id = $_REQUEST['id']; 

   $TenDanhMuc = $_POST['ten_danh_muc'];

   $sql = "UPDATE `danhmuc` SET `tendanhmuc`='$TenDanhMuc' WHERE id = $id";
    
    if(mysqli_query($conn, $sql)) {
        $_SESSION['editSuccess'] = true;
        header('Location: ../../pages/danhmuc/danhsach.php');
    }
    echo 'Lỗi sửa danh mục';
?>