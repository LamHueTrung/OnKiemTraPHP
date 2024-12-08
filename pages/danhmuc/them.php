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
        <h1>Thêm danh mục</h1>
        <form action="../../module/danhmuc/them.php" method="POST" enctype="multipart/form-data">
            <label for="">Tên danh mục</label>
            <input type="text" name="ten_danh_muc" id="ten_danh_muc">
            <?php 
                if(isset($_SESSION['errorTenDanhMuc']) && $_SESSION['errorTenDanhMuc'] == true ) {
                    echo '<span style="color: red;">Lỗi tên danh mục</span>';
                    session_destroy();
                }
            ?>
            <button type="submit">Lưu lại</button>
        </form>
    </div>
</body>
</html>