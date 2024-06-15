<?php
session_start();
$username = $_SESSION["username"]; // Lấy tên tài khoản từ session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./assets/style.css" />
  <link rel="stylesheet" href="./assets/reset.css" />
  <link rel="stylesheet" href="./assets/Cuongstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php 
  $maDiaChi = $_GET['maDiaChi'];
  $conn = mysqli_connect("localhost", "root", "", "webbanhang");
        if (!$conn) {
            echo "Ket noi khong thanh cong: " . mysqli_connect_error();
        } else {
            $sql = "DELETE  FROM diachi WHERE maDiaChi = '$maDiaChi'";
            $result = mysqli_query($conn, $sql);
            if ($result > 0) {
                echo '<script>
                    alert("Xóa địa chỉ thành công");
                    window.location.href = "./address.php";
                </script>';
            }
        }
  ?>

</body>

</html>