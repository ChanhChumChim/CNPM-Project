    <?php
    session_start();
    include('../admin/config.php');

    if (isset($_POST['dangnhap'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql_dangnhap = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($mysqli, $sql_dangnhap);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Đăng nhập thành công, thực hiện các hành động cần thiết (ví dụ: lưu thông tin người dùng vào session)
                session_start();
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['customer_name'];
                echo "<script>alert('Signed In Successfully');</script>";
                // Chuyển hướng đến trang chính sau khi đăng nhập thành công
                header("Location: ../html/index.html");
                exit();
            } else {
                // Đăng nhập thất bại, hiển thị thông báo lỗi
                header("Location: ../html/sign.html");
            }
        } else {
            // Lỗi truy vấn SQL
            echo "Error: " . mysqli_error($mysqli);
        }
    }
?>