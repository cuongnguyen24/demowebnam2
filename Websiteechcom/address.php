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
            <a href="index.php">Giới thiệu Nous</a>
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
  <div class="main__layout__account">
    <div class="main__layout__container main__layout__container__2">
      <div class="card card-left" style="width: 30%; height: 100%">
        <div class="card-body">
          <h2 class="card-title">
            <div class="user-icon">
              <i class="fa-regular fa-user"></i>
            </div>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'webbanhang');
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT khachhang.hoTen, khachhang.email, khachhang.soDienThoai, khachhang.maDiaChi, khachhang.maKhachHang FROM taikhoan
            INNER JOIN khachhang ON taikhoan.maTaiKhoan = khachhang.maTaiKhoan WHERE taikhoan.tenTaiKhoan = '$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["hoTen"];
                $mail = $row["email"];
                $sdt = $row["soDienThoai"];
                $diachi = $row["maDiaChi"];
                $makhach = $row["maKhachHang"];
              }
            } else {
              echo "Không có kết quả";
            }
            mysqli_close($conn);
            ?>
            <?php echo $name; ?>
          </h2>
          <hr>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <p><a class="link-opacity-100 text-body-secondary" href="./accountcustomerupdate.php?maKhachHang=<?php echo $makhach; ?>">Chỉnh sửa thông tin</a></p>
          </li>
          <hr>
          <li class="list-group-item">
            <p><a class="link-opacity-100 text-body-secondary" href="#">Đơn hàng</a></p>
          </li>
          <hr>
          <li class="list-group-item">
            <p><a class="link-opacity-100 text-body-secondary" href="#">Địa chỉ giao hàng</a></p>
          </li>
          <hr>
          <li class="list-group-item">
            <p><a class="link-opacity-100 text-body-secondary" href="./logout.php">Đăng Xuất</a></p>
          </li>
        </ul>
      </div>

      <div class="card card-right" style="width: 70%;">
        <div class="card-body">
          <h5 class="card-title">Địa chỉ của tôi</h5>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "webbanhang");
          if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
          }
          $sql1 = "SELECT diachi.tenDiaChi, diachi.tinhTrang FROM khachhang 
                INNER JOIN taikhoan ON khachhang.maTaiKhoan = taikhoan.maTaiKhoan
                INNER JOIN diachi ON khachhang.maKhachHang = diachi.maKhachHang
                WHERE taikhoan.tenTaiKhoan = '$username';
                ";

          $result = mysqli_query($conn, $sql1);
          if (mysqli_num_rows($result) > 0) {
            echo '
                <table>
                  <thead>
                    <th></th>
                    <th></th>
                  </thead>
                ';
            while ($row = mysqli_fetch_assoc($result)) {
              echo '
                    <tbody>
                      <tr>
                        <td>' . $row['tenDiaChi'] . '</td>
                        <td>' . ($row['tinhTrang']== 1 ? '<div class="default-address">Mặc định</div>' : '') . '</td>
                        <td>
                          <a href="#">Sửa</a>
                          <a href="#">Xóa</a>
                        </td>
                      </tr>
                    </tbody>
                  ';
            }
            echo '</table>';
          } else {
            echo 'Không có địa chỉ !!!<br>';
          }
          ?>
          <a href="#" style="margin: 0 auto;">Thêm địa chỉ mới</a>
        </div>
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