<?php
session_start();
?>
<?php
// Chức năng Đăng xuất đơn giản là xóa giá trị của người dùng đã đăng nhập trong SESSION
// Và điều hướng người dùng về trang chúng ta mong muốn

// Nếu trong SESSION có giá trị của key 'email_logged' <-> người dùng đã đăng nhập thành công
// Điều hướng người dùng về trang DASHBOARD
if(isset($_SESSION["loged"])) {
    unset($_SESSION["loged"]);
    header('location:index.php');
}
else {
    echo 'Người dùng chưa đăng nhập. Không thể đăng xuất dược!'; die;
}
?>