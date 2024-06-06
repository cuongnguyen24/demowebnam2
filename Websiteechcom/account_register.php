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

  <div class="main__layout">
    <div class="my-account-wrap">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 offset-sm-3 offset-md-4">
            <div id="auth-form">
              <div class="auth-heading">
                <h1>
                  Đăng ký
                </h1>
              </div>
              <div class="auth-form-body">
                <div class="register-form-body">
                  <p class="error" id="error_session"></p>
                  <form class="register_form">
                    <div class="form-group">
                      <label for="register-first-name">Họ và tên của bạn*</label>
                      <input type="text" id="register-first-name" class="form-control" name="customer[first_name]" required="">
                    </div>
                    <div class="form-group">
                      <label>Giới tính</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="radio" id="register-gender-0" value="0" name="customer[gender]">
                          <label for="register-gender-0">Nữ</label>
                        </div>
                        <div class="col-6">
                          <input type="radio" id="register-gender-1" value="1" name="customer[gender]">
                          <label for="register-gender-1">Nam</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="register-email">Email</label>
                      <input type="email" id="register-email" class="form-control" name="customer[email]">
                      <p class="error" id="error_email"></p>
                    </div>
                    <div class="form-group register-numberPhone">
                      <label for="register-phone">Số điện thoại <span>*</span></label>
                      <input required="" type="text" id="register-phone" class="form-control" name="customer[phone]" pattern="^\+?\d{0,10}">
                      <p class="error" id="error_phone"></p>
                    </div>

                    <div class="form-group register-numberPhone">
                      <label for="register-phone">Tên tài khoản <span>*</span></label>
                      <input required="" type="text" id="register-phone" class="form-control" name="customer[phone]">
                      <p class="error" id="error_phone"></p>
                    </div>

                    <div class="form-group">
                      <label for="register-password">Mật khẩu <span>*</span></label>
                      <p class="notify">Mật khẩu tối thiểu 8 kí tự.</p>
                      <input required="" type="password" id="register-password" class="form-control" name="customer[password]">
                      <p class="error" id="error_password"></p>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        ĐĂNG KÝ
                      </button>
                    </div>
                    <div class="auth-back-btn">
                      <a href="#">Đăng nhập</a>
                    </div>
                  </form>

                  <!-- <form class="confirm_otp d-none">
                    <h5 class="text-center">Vui lòng nhập mã OTP để hoàn tất đăng ký</h5>
                    <div class="form-group" id="otp_confirm_register">
                      <label required="" for="register-otp">Mã OTP</label>
                      <input required="" type="text" id="register-otp" class="form-control" name="customer[opt]">
                      <p class="error" id="error_otp"></p>
                      <p class="d-none countdown">
                        <span id="countdown"></span>
                        <button id="resend_otp" type="button" disabled="">Gửi lại</button>
                      </p>
                    </div>
                    <button type="button" id="back_form_register" style="margin-bototm: 10px;">Trở lại</button>
                    <button type="submit" class="btn btn-primary">
                      Gửi
                    </button>
                  </form> -->
                </div>
              </div>
            </div>
          </div>
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