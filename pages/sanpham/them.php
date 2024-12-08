<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
</head>
<body>
    <?php 
        session_start();
    ?>
    <div class="" style="display: block;">
        <h1>Thêm sản phẩm</h1>
        <form action="../../module/sanpham/them.php" method="POST" enctype="multipart/form-data">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" id="ten_san_pham">
            <?php 
                if(isset($_SESSION['errorTenSanPham']) && $_SESSION['errorTenSanPham'] == true ) {
                    echo '<span style="color: red;">Lỗi tên sản phẩm</span>';
                    session_destroy();
                }
            ?>
            <label for="">Giá sản phẩm</label>
            <input type="text" name="gia_san_pham" id="gia_san_pham">
            <?php 
                if(isset($_SESSION['errorGiaSanPham']) && $_SESSION['errorGiaSanPham'] == true ) {
                    echo '<span style="color: red;">Lỗi giá sản phẩm</span>';
                    session_destroy();
                }
            ?>
            <label for="">Hình ảnh</label>
            <input type="file" name="hinh_san_pham" id="hinh_san_pham">
            <?php 
                if(isset($_SESSION['errorHinhSanPham']) && $_SESSION['errorHinhSanPham'] == true ) {
                    echo '<span style="color: red;">Lỗi hình sản phẩm</span>';
                    session_destroy();
                }
            ?>

            <label for="">Danh mục</label>
            <select name="id_danh_muc" id="id_danh_muc">
                <?php 
                include('../../connect.php');

                $sql = 'SELECT `id`, `tendanhmuc` FROM `danhmuc`';

                $result = $conn->query($sql);
                $i = 0;
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                        $i++;
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tendanhmuc']; ?></option>

                <?php 
                        }
                    }
                ?>
            </select>
                
            <button type="submit">Lưu lại</button>
        </form>
    </div>
</body>
</html>