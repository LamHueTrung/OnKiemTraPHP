<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
</head>
<body>
    <?php 
        session_start();

        if(isset($_SESSION['delelteSuccess']) && $_SESSION['delelteSuccess'] = true) {
            session_destroy();
            echo "
            <script>
                alert('Xoá thành công');
            </script>
            ";
        }
        if(isset($_SESSION['editSuccess']) && $_SESSION['editSuccess'] = true) {
            session_destroy();
            echo "
            <script>
                alert('Sửa thành công');
            </script>
            ";
        }
    ?>
    
    <div class="">
        <h1>Danh sách sản phâm</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Danh mục</th>
                    <th>Tên sản phâm</th>
                    <th>Giá sản phâm</th>
                    <th>Hình sản phâm</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include('../../connect.php');

                    $sql = 'SELECT * FROM `sanpham`, `danhmuc` WHERE sanpham.iddanhmuc = danhmuc.id';

                    $result = $conn->query($sql);
                    $i = 0;
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['tendanhmuc'];?></td>
                    <td><?php echo $row['tensanpham'];?></td>
                    <td><?php echo $row['giasanpham'];?></td>
                    <td><img src="../../img/<?php echo $row['hinhanh'];?>" alt=""></td>
                    <td>
                        <a href="./sua.php?id=<?php echo $row['id']?>">Sửa</a>
                        <form action="../../module/sanpham/xoa.php?id=<?php echo $row['id']?>" method="POST">
                            <button type="submit">Xoá</button>

                        </form>
                    </td>
                </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
        </table>

        <a href="/Kiemtra">Trang chủ</a>
    </div>
    
</body>
</html>