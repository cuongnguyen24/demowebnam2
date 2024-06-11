<?php
$connect = mysqli_connect('localhost', 'root', '', 'webbanhang');
mysqli_set_charset($connect, "utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form và gọi hàm lưu dữ liệu vào CSDL
  $name = $_POST["fullName"];
  $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

  $email = $_POST["mail"];
  $phone = $_POST["phoneNumber"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmpass = $_POST["confirmPassword"];

  // Kiểm tra trùng lặp email, số điện thoại và tên tài khoản
  // $emailCondition = $email ? "khachhang.email = '$email'" : "khachhang.email IS NULL";
  // khachhang.email IS NULL
  $checkQuery = "SELECT * FROM khachhang 
    INNER JOIN taikhoan ON khachhang.maTaiKhoan = taikhoan.maTaiKhoan 
    WHERE khachhang.email = '$email' OR khachhang.soDienThoai = '$phone' OR taikhoan.tenTaiKhoan = '$username'";

  $checkResult = mysqli_query($connect, $checkQuery);
  if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>alert('Email, số điện thoại hoặc tên tài khoản đã tồn tại. Vui lòng nhập lại.'); window.history.back();</script>";
    exit();
  }

  // Tạo mã tài khoản mới
  // lấy mã tk theo thứ tự giảm dần và lấy dòng đầu tiên - tk cao nhất
  $getLastAccountQuery = "SELECT maTaiKhoan FROM taikhoan ORDER BY maTaiKhoan DESC LIMIT 1";
  // Thực hiện truy vấn
  $lastAccountResult = mysqli_query($connect, $getLastAccountQuery);
  // lấy dòng đầu tiên của kết quả truy vấn
  $lastAccountRow = mysqli_fetch_assoc($lastAccountResult);
  // Hàm substr cắt chuỗi mã tài khoản từ ký tự thứ 3 trở đi (bỏ qua hai ký tự đầu tiên, là "tk"); intval: sẽ chuyển 01 thành 1
  $lastAccountNumber = intval(substr($lastAccountRow['maTaiKhoan'], 2));
  //lastAccountNumber + 1: tăng lên 1
  //str_pad($lastAccountNumber + 1, 2, "0", STR_PAD_LEFT);
  //Hàm str_pad thêm số "0" vào bên trái của số mới tạo để đảm bảo rằng số này có ít nhất 2 ký tự. Tham số 2 là độ dài tối thiểu của chuỗi kết quả
  $newAccountNumber = str_pad($lastAccountNumber + 1, 2, "0", STR_PAD_LEFT);
  $newAccountId = "tk" . $newAccountNumber;

  // Tạo mã khách hàng mới
  // Như tạo mã tài khoản mới
  $getLastCustomerQuery = "SELECT maKhachHang FROM khachhang ORDER BY maKhachHang DESC LIMIT 1";
  $lastCustomerResult = mysqli_query($connect, $getLastCustomerQuery);
  $lastCustomerRow = mysqli_fetch_assoc($lastCustomerResult);
  $lastCustomerNumber = intval(substr($lastCustomerRow['maKhachHang'], 2));
  $newCustomerNumber = str_pad($lastCustomerNumber + 1, 2, "0", STR_PAD_LEFT);
  $newCustomerId = "kh" . $newCustomerNumber;

  // Xử lý email rỗng
  // $emailValue = $email ? "'$email'" : "NULL";

  // Thêm tài khoản mới
  // gán mặc định khi đăng ký là khách hàng với mã phân quyền là 3
  $insertAccountQuery = "
        INSERT INTO taikhoan (maTaiKhoan, tenTaiKhoan, matKhau, maPhanQuyen) 
        VALUES ('$newAccountId', '$username', '$password', 3) 
    ";
  // Thêm khách hàng mới
  $insertCustomerQuery = "
        INSERT INTO khachhang (maKhachHang, hoTen, email, soDienThoai, maTaiKhoan) 
        VALUES ('$newCustomerId', '$name', '$email', '$phone', '$newAccountId')
    ";

  if (mysqli_query($connect, $insertAccountQuery) && mysqli_query($connect, $insertCustomerQuery)) {
    echo "<script>alert('Tạo tài khoản thành công!'); window.location.href='index.php';</script>";
    exit();
  } else {
    echo "Error: " . $insertAccountQuery . "<br>" . mysqli_error($connect);
  }
}


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
  <header class="header">
    <div class="container">
      <div class="header--mid">
        <div class="header--mid__logo">
          <a href="">
            <img src="./assets/img/logo.webp" alt="logo" />
          </a>
        </div>

        <div class="header--mid__search">
          <form action="/search">
            <input type="hidden" name="type" value="product" />
            <input required name="q" type="text" placeholder="sản phẩm cần tìm..." />
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <div class="header--mid__search--smart"></div>
          </form>
        </div>

        <div class="header--mid__nav">
          <button class="header__btn" data-action="account">
            <strong>Tài khoản</strong>
            <i class="fa-solid fa-user-pen"></i>
          </button>

          <button class="header__btn" data-action="wishlist">
            <strong>Yêu thích</strong>
            <i class="fa-solid fa-heart"></i>
            <span class="wishlist-count count">0</span>
          </button>

          <button class="header__btn" data-action="cart">
            <strong>Giỏ hàng</strong>
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count count">0</span>
          </button>
        </div>
      </div>
      <div class="header--bot">
        <ul class="header__menu">
          <li>
            <a href="./index.php">Giới thiệu Nous</a>
          </li>
          <li class="hasChild thoi-trang-so-sinh">
            <a href="">Thời trang sơ sinh
              <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul class="FadeIn header__menu1 sub__menu1">
              <li class="hasChild">
                <a href="">Sơ sinh 0-3 tháng</a>
                <ul class="header__menu2">
                  <li><a href="">Bộ liền</a></li>
                  <li><a href="">Bộ dài tay</a></li>
                </ul>
              </li>
              <li class="hasChild">
                <a href="">Bé 3-24 tháng</a>
                <ul class="header__menu2">
                  <li><a href="">Áo khoác</a></li>
                  <li><a href="">Bộ liền</a></li>
                  <li><a href="">Bộ cộc tay</a></li>
                  <li><a href="">Bộ dài tay</a></li>
                  <li><a href="">Bộ quần yếm</a></li>
                  <li><a href="">Váy</a></li>
                  <li><a href="">Quần</a></li>
                  <li><a href="">Set quà tặng</a></li>
                </ul>
              </li>
              <li class="hasChild">
                <a href="">Phụ kiện</a>
                <ul class="header__menu2">
                  <li><a href="">Set phụ kiện</a></li>
                  <li><a href="">Mũ</a></li>
                  <li><a href="">Bao tay bao chân</a></li>
                  <li><a href="">Yếm</a></li>
                  <li><a href="">Gối</a></li>
                  <li><a href="">Khăn sữa</a></li>
                  <li><a href="">Khăn đa năng</a></li>
                  <li><a href="">Giày</a></li>
                  <li><a href="">Chăn ủ</a></li>
                </ul>
              </li>
              <div class="hasChild">
                <li><a href="">Set quà tặng</a></li>
                <li><a href="">Nous Premium</a></li>
                <li><a href="">Nous Petit à Petit</a></li>
                <li>
                  <a href="">Bộ sưu tập</a>
                  <ul class="header__menu2">
                    <li><a href="">Hàng mới</a></li>
                    <li><a href="">Christmas wonderland 2023</a></li>
                  </ul>
                </li>
              </div>
            </ul>
          </li>
          <li class="hasChild thoi-trang-cho-be-2-6y">
            <a href="">Thời trang cho bé 2-6y
              <i class="fa-solid fa-chevron-down"></i>
            </a>
          </li>
          <li class="hasChild active bo-suu-tap">
            <a href="">Bộ sưu tập
              <i class="fa-solid fa-chevron-down"></i>
            </a>
          </li>
          <li class="hasChild he-thong-dai-ly">
            <a href="">Hệ thống đại lý
              <i class="fa-solid fa-chevron-down"></i>
            </a>
          </li>
          <li class="hasChild lon-cung-nous">
            <a href="">Lớn cùng nous
              <i class="fa-solid fa-chevron-down"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div class="main__layout_register">
    <div class="main__layout_register_container">
      <div class="main__layout_register_container_head">
        <div class="title_register">ĐĂNG KÝ</div>
      </div>
      <div class="main__layout_register_container_content">
        <form id="registerForm" method="post">
          <div class="register_form">
            <div class="register_form_group">
              <label>Họ và tên*</label>
              <input type="text" id="fullName" name="fullName">
              <span id="fullNameError" style="color: red;"></span>
            </div>
            <div class="register_form_group">
              <label>Giới tính</label>
              <div class="row">
                <div class="col">
                  <input type="radio" value="0" name="gender">
                  </label>Nữ</label>
                </div>
                <div class="col">
                  <div class="col">
                    <input type="radio" value="1" name="gender">
                    </label>Nam</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="register_form_group">
              <label>Email</label>
              <input type="text" name="mail">
            </div>
            <div class="register_form_group">
              <label>Số điện thoại*</label>
              <input type="text" id="phoneNumber" name="phoneNumber">
              <span id="phoneError" style="color: red;"></span>
            </div>

            <div class="register_form_group">
              <label>Tên tài khoản*</label>
              <input type="text" id="username" name="username">
              <span id="usernameError" style="color: red;"></span>
            </div>
            <div class="register_form_group">
              <label>Mật khẩu*</label>
              <input type="password" id="password" name="password">
              <span id="passwordError" style="color: red;"></span>
            </div>
            <div class="register_form_group">
              <label>Nhập lại mật khẩu*</label>
              <input type="password" id="confirmPassword" name="confirmPassword">
              <span id="confirmPasswordError" style="color: red;"></span>
            </div>
            <div class="register_form_group">
              <button type="submit" class="btn-primary-dangky">ĐĂNG KÝ</button>
            </div>
            <hr>
            <div class="back-btn">
              <a href="index.php">TRANG CHỦ</a>
            </div>
          </div>
        </form>
        <script>
          document.getElementById('registerForm').addEventListener('submit', function(event) {
            // Lấy các giá trị từ các trường input
            const fullName = document.getElementById('fullName').value.trim();
            const phoneNumber = document.getElementById('phoneNumber').value.trim();
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const confirmPassword = document.getElementById('confirmPassword').value.trim();

            // Lấy các phần tử hiển thị thông báo lỗi
            const fullNameError = document.getElementById('fullNameError');
            const phoneError = document.getElementById('phoneError');
            const usernameError = document.getElementById('usernameError');
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');

            // Biến kiểm tra xem có lỗi hay không
            let hasError = false;

            // Kiểm tra Họ và tên
            if (fullName === '') {
              fullNameError.textContent = '*Vui lòng nhập Họ và tên.';
              hasError = true;
            } else {
              fullNameError.textContent = '';
            }

            // Kiểm tra số điện thoại
            const phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phoneNumber)) {
              phoneError.textContent = '*Số điện thoại phải gồm 10 chữ số.';
              hasError = true;
            } else {
              phoneError.textContent = '';
            }

            // Kiểm tra tên tài khoản
            if (username === '') {
              usernameError.textContent = '*Vui lòng nhập Tên tài khoản.';
              hasError = true;
            } else {
              usernameError.textContent = '';
            }

            // Kiểm tra mật khẩu
            if (password === '') {
              passwordError.textContent = '*Vui lòng nhập Mật khẩu.';
              hasError = true;
            } else if (password.length < 6) {
              passwordError.textContent = '*Mật khẩu phải có ít nhất 6 ký tự.';
              hasError = true;
            } else {
              passwordError.textContent = '';
            }

            // Kiểm tra nhập lại mật khẩu
            if (confirmPassword === '') {
              confirmPasswordError.textContent = '*Vui lòng nhập lại Mật khẩu.';
              hasError = true;
            } else if (confirmPassword !== password) {
              confirmPasswordError.textContent = '*Mật khẩu nhập lại không khớp.';
              hasError = true;
            } else {
              confirmPasswordError.textContent = '';
            }

            // Ngăn chặn gửi biểu mẫu nếu có lỗi
            if (hasError) {
              event.preventDefault();
            }
          });
        </script>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="footer--top">
        <div class="footer--top__item">
          <h4>GIỚI THIỆU</h4>
          <ul>
            <li>Giới thiệu</li>
            <li>Chính sách đổi trả</li>
            <li>Chính sách bảo mật</li>
            <li>Chính sách vận chuyển</li>
            <li>Điều khoản dịch vụ</li>
            <li>Hướng dẫn mua hàng</li>
            <li>Hướng dẫn thanh toán</li>
            <li>Liên hệ</li>
          </ul>
        </div>

        <div class="footer--top__item">
          <h4>THÔNG TIN CÔNG TY</h4>
          <ul>
            <li>CÔNG TY CỔ PHẦN NU VIỆT NAM</li>
            <li>Mã số thuế: 0107126252</li>
            <li>
              Địa chỉ: Số 55 đường Nguyễn Khắc Hiếu, Phường Trúc Bạch, Quận Ba
              Đình, Thành phố Hà Nội
            </li>
            <li>Điện thoại bàn: 024.66512299</li>
            <li>Hotline CSKH: 0936233836</li>
            <li>Hotline kênh Đại lý: 0399050818</li>
            <li>Email: online@nous.com.vn</li>
            <li>
              Ngày cấp: 30/03/2007, Nơi cấp : Sở kể hoạch và đầu tư thành phố
              Hà Nội
            </li>
          </ul>
        </div>

        <div class="footer--top__item">
          <h4>HỆ THỐNG CỬA HÀNG</h4>
          <ul>
            <li>Nous House Hồ Chí Minh</li>
            <li>Địa chỉ: 79 Mạc Thị Bưởi, Quận I, Thành phố Hồ Chí Minh</li>
            <li>Nous House Hà Nội</li>
            <li>
              Địa chỉ: 34 Quang Trung, Trần Hưng Đạo, Hoàn Kiếm, Thành phố Hà
              Nội
            </li>
            <li>Thời gian hoạt động: 9h00 - 21h30 (Thứ hai - Chủ nhật)</li>
          </ul>
        </div>

        <div class="footer--top__item">
          <h4>FANPAGE</h4>
          <div>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnousbabywear&amp;tabs=timeline&amp;width=340&amp;height=70&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="340" style="border: none; overflow: hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="footer--bot">
      <div class="container">
        <div class="coppyright">
          <div class="row__item">
            <img src="./assets/img/logo.webp" alt="logo" />
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>