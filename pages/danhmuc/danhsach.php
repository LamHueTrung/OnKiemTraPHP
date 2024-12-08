<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
</head>
<body>
    <?php 
        include('../../connect.php'); // Kết nối cơ sở dữ liệu

        // Khởi động session ở đầu file nếu chưa có
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        // Xử lý thông báo từ session
        if(isset($_SESSION['delelteSuccess']) && $_SESSION['delelteSuccess'] == true) {
            session_destroy();
            echo "
            <script>
                alert('Xoá thành công');
            </script>
            ";
        }
        if(isset($_SESSION['editSuccess']) && $_SESSION['editSuccess'] == true) {
            session_destroy();
            echo "
            <script>
                alert('Sửa thành công');
            </script>
            ";
        }

        // Khởi tạo biến để lưu từ khóa tìm kiếm
        $search = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
            $search = trim($_POST['search']);
        }

        // Tạo truy vấn SQL với điều kiện tìm kiếm nếu có từ khóa
        if ($search !== '') {
            // Sử dụng Prepared Statements để bảo mật
            $stmt = $conn->prepare("SELECT `id`, `tendanhmuc` FROM `danhmuc` WHERE `tendanhmuc` LIKE ?");
            $like_search = '%' . $search . '%';
            $stmt->bind_param("s", $like_search);
        } else {
            // Nếu không có từ khóa tìm kiếm, lấy tất cả danh mục
            $stmt = $conn->prepare("SELECT `id`, `tendanhmuc` FROM `danhmuc`");
        }

        // Thực thi truy vấn
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    ?>
    
    <div class="">
        <h1>Danh sách danh mục</h1>
        <form action="" method="POST">
            <label for="search">Tìm kiếm</label>
            <input 
                style="margin-bottom: 5px;" 
                type="text" 
                id="search" 
                name="search" 
                placeholder="Tìm kiếm..." 
                value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>"
            > 
            <button type="submit">Tìm kiếm</button>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 0;
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo htmlspecialchars($row['tendanhmuc']);?></td>
                    <td>
                        <a href="./sua.php?id=<?php echo $row['id']?>">Sửa</a>
                        <form action="../../module/danhmuc/xoa.php?id=<?php echo $row['id']?>" method="POST" style="display:inline;">
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá danh mục này?');">Xoá</button>
                        </form>
                    </td>
                </tr>
                <?php 
                        }
                    } else {
                        echo "<tr><td colspan='3'>Không tìm thấy danh mục nào.</td></tr>";
                    }
                ?>
            </tbody>
        </table>

        <a href="/Kiemtra">Trang chủ</a>
    </div>
    
</body>
</html>
