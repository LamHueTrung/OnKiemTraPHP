<?php 
    session_start();
    include('../../connect.php');

    $TenSanPham = $_POST['ten_san_pham'];
    $GiaSanPham = $_POST['gia_san_pham'];
    $HinhAnh = $_FILES['hinh_san_pham']['name'];
    $hinhanh_tmp = $_FILES['hinh_san_pham']['tmp_name'];
    $IdDanhMuc = $_POST['id_danh_muc'];

    if($TenDanhMuc == null) {
        $_SESSION['errorTenSanPham'] = true;
        header('Location: ../../pages/danhmuc/them.php');
    }
    if($GiaSanPham == null) {
        $_SESSION['errorGiaSanPham'] = true;
        header('Location: ../../pages/danhmuc/them.php');
    }

    $sql = "INSERT INTO `sanpham`(`tensanpham`, `giasanpham`, `iddanhmuc`, `hinhanh`) VALUES ('$TenSanPham','$GiaSanPham','$IdDanhMuc','$HinhAnh')";
    
    if(mysqli_query($conn, $sql)) {
        move_uploaded_file($hinhanh_tmp, '../../img/' .$HinhAnh);
        header('Location: ../../pages/sanpham/danhsach.php');
    }
    echo 'Lỗi thêm danh mục';
?>