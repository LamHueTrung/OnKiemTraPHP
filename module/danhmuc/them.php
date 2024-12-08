<?php 
    session_start();
    include('../../connect.php');

    $TenDanhMuc = $_POST['ten_danh_muc'];
    
    if($TenDanhMuc == null) {
        $_SESSION['errorTenDanhMuc'] = true;
        header('Location: ../../pages/danhmuc/them.php');
    }

    $sql = "INSERT INTO `danhmuc`(`tendanhmuc`) VALUES ('$TenDanhMuc')";
    
    if(mysqli_query($conn, $sql)) {
        header('Location: ../../pages/danhmuc/danhsach.php');
    }
    echo 'Lỗi thêm danh mục';
?>