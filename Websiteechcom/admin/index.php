<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header--mid">
                <div class="header--mid__logo">
                    <a href="">
                        <img src="../assets/img/logo.webp" alt="logo">
                    </a>
                </div>

                <div class="header--mid__search">
                    <form action="/search">
                        <input type="hidden" name="type" value="product">
                        <input required name="q" type="text" placeholder="sản phẩm cần tìm...">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <div class="header--mid__search--smart"></div>
                    </form>
                </div>

                <div class="header--mid__nav">
                    <button class="header__btn js-LogIn" data-action="account">
                        <strong>Tài khoản</strong>
                        <i class="fa-solid fa-user-pen"></i>
                    </button>

                    <button class="header__btn" data-action="manage">
                        <strong>Quản lý</strong>
                        <i class="fa-solid fa-wrench"></i>

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
                        <a href="#">Thống kê</a>
                    </li>
                    <li class="hasChild thoi-trang-so-sinh">
                        <a href="">Quản lí danh mục


                        </a>

                    </li>
                    <li class="hasChild thoi-trang-cho-be-2-6y">
                        <a href=""> Quản lý tài khoản

                        </a>

                    </li>
                    <li class="hasChild active bo-suu-tap">
                        <a href="">Quản lý nhà cung cấp

                        </a>

                    </li>
                    <li class="hasChild he-thong-dai-ly">
                        <a href="">Quản lý sản phẩm

                        </a>

                    </li>
                    <li class="hasChild lon-cung-nous">
                        <a href="">Quán lý đơn hàng

                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <div class="main__layout">
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
                        <li>Địa chỉ: Số 55 đường Nguyễn Khắc Hiếu, Phường Trúc Bạch, Quận Ba Đình, Thành phố Hà Nội</li>
                        <li>Điện thoại bàn: 024.66512299</li>
                        <li>Hotline CSKH: 0936233836</li>
                        <li>Hotline kênh Đại lý: 0399050818</li>
                        <li>Email: online@nous.com.vn</li>
                        <li>Ngày cấp: 30/03/2007, Nơi cấp : Sở kể hoạch và đầu tư thành phố Hà Nội</li>
                    </ul>
                </div>

                <div class="footer--top__item">
                    <h4>HỆ THỐNG CỬA HÀNG</h4>
                    <ul>
                        <li>Nous House Hồ Chí Minh</li>
                        <li>Địa chỉ: 79 Mạc Thị Bưởi, Quận I, Thành phố Hồ Chí Minh</li>
                        <li>Nous House Hà Nội</li>
                        <li>Địa chỉ: 34 Quang Trung, Trần Hưng Đạo, Hoàn Kiếm, Thành phố Hà Nội</li>
                        <li>Thời gian hoạt động: 9h00 - 21h30 (Thứ hai - Chủ nhật)</li>

                    </ul>
                </div>

                <div class="footer--top__item">
                    <h4>FANPAGE</h4>
                    <div>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnousbabywear&amp;tabs=timeline&amp;width=340&amp;height=70&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="340" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer--bot">
            <div class="container">
                <div class="coppyright">
                    <div class="row__item">
                        <img src="../assets/img/logo.webp" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <form action="" method="POST">
        <div class="model_LogIn js-model_LogIn">
            <div class="model-container js-model-container">
                <div class="model_LogIn_Close js-model_LogIn-close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="row">
                    <div class="col_login">
                        <div style="padding-bottom: 15px;">
                            <img src="../assets/img/logo.webp" alt="logo">
                        </div>

                        <div class="sub-nav">
                            <div class="btn login" style="background-color: rgba(0,0,0,0.03);">Đăng nhập
                            </div>
                            <!-- admin ko thể đăng kí -->
                            <div class="btn register"><a href=""> Đăng ký</a>

                            </div>
                        </div>
                    </div>
                    <div class="col_form">
                        <div class="tab-content">
                            <div id="modelLogIn">
                                <h5 class="header-content">
                                    ĐĂNG NHẬP VỚI MẬT KHẨU
                                </h5>
                                <div class="login-form-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="">Tên tài khoản</label>
                                            <label for=""><a href="">Đăng nhập với OTP</a></label>
                                            <input type="text" class="form-control" name="user_name_lg">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Mật khẩu</label>
                                            <input type="text" class="form-control" name="passlg">
                                        </div>

                                        <div class="login-btn">
                                            <button type="submit" name="dangnhap">Đăng nhập</button>
                                        </div>
                                        <a href="" class="forget_pass">QUÊN MẬT KHẨU?</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- login -->
    <script>
        const LogIn = document.querySelector('.js-LogIn');
        const model_LogIn = document.querySelector('.js-model_LogIn');
        const model_LogIn_Close = document.querySelector('.js-model_LogIn-close');
        const model_LogIn_Container = document.querySelector('.js-model-container');
        // hiển thị module đăng nhập
        function showLogIn() {
            model_LogIn.classList.add('open');
        }
        // ẩn module đăng nhập
        function hideLogIn() {
            model_LogIn.classList.remove('open');
        }

        // Xử lý sự kiện click để mở mô-đun
        LogIn.addEventListener('click', showLogIn);

        // Xử lý sự kiện click để đóng mô-đun
        model_LogIn_Close.addEventListener('click', hideLogIn);

        model_LogIn.addEventListener('click', hideLogIn);
        model_LogIn_Container.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    </script>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'webbanhang');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST["dangnhap"])) {
        $tk = $_POST["user_name_lg"];
        $mk = $_POST["passlg"];

        $sql = "SELECT * FROM taikhoan WHERE tenTaiKhoan = '$tk' AND matKhau = '$mk'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["loged"] = true;
                $_SESSION["usernamecustomer"] = $tk;
                echo '<script>
                    alert("Đăng nhập thành công");
                    window.location.href = "accountadmin.php";
                </script>';
                setcookie("success", "Đăng nhập thành công!", time() + 24 * 3600, "/", "", 0);
                exit();
            } else {
                echo '<script>alert("Đăng nhập không thành công. Tên tài khoản hoặc mật khẩu không đúng.");</script>';
                setcookie("error", "Đăng nhập không thành công!", time() + 24 * 3600, "/", "", 0);
            }
        } else {
            echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
        }
    }
    ?>

</body>

</html>