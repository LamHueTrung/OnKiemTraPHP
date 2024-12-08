<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra</title>
</head>
<body>
    <?php 
        include('./connect.php');
    ?>
    <style>
        header {
            display: flex;
            width: 100%;
            height: 40px;
            justify-content: space-between;
            font-size: 18px;
        }
        ul {
            list-style: none;
            display: flex;
            justify-content: space-between;
        }
        ul li {
            margin-right: 10px ;
        }
        a {
            text-decoration: none;
            color: #333;
        }
    </style>
    <header>
        <ul>
            <li><a href="./pages/danhmuc/danhsach.php">xem danh mục</a></li>
            <li><a href="./pages/danhmuc/them.php">thêm danh mục</a></li>
            <li><a href="./pages/sanpham/danhsach.php">xem sản phẩm</a></li>
            <li><a href="./pages/sanpham/them.php">thêm sản phẩm</a></li>
        </ul>

        <input type="text" name="" id="" placeholder="Tìm kiếm....">
    </header>
</body>
</html>