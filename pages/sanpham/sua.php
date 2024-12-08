<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>
<body>
    <?php 
        session_start();
        include('../../connect.php');

        $id = $_REQUEST['id'];
        $sql = "SELECT `id`, `tendanhmuc` FROM `danhmuc` WHERE id = $id";

        $result = $conn->query($sql);
        $i = 0;
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    ?>
    <div class="" style="display: block;">
        <h1>Sửa danh mục</h1>
        <form action="../../module/danhmuc/sua.php?id=<?php echo $id;?>" method="POST">
            <label for="">Tên danh mục</label>
            <input type="text" name="ten_danh_muc" id="ten_danh_muc" value="<?php echo $row['tendanhmuc']; ?>">
            <?php 
                if(isset($_SESSION['errorTenDanhMuc']) && $_SESSION['errorTenDanhMuc'] == true ) {
                    echo '<span style="color: red;">Lỗi tên danh mục</span>';
                    session_destroy();
                }
            ?>
            <button type="submit">Lưu lại</button>
        </form>
    </div>
    <?php 
        }
    }
    ?>
</body>
</html>