<?php include_once("user/template/common/head.php"); ?>
<link rel="stylesheet" type="text/css" href="user/asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="user/asset/plugin/fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="user/asset/css/login.util.css">
<link rel="stylesheet" type="text/css" href="user/asset/css/login.main.css">
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="POST" action="?c=auth&m=doRegister">
					<div class="login100-form-avatar">
						<img src="user/asset/img/logo3.png" alt="AVATAR">
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="ip-email" placeholder="Tài khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="password" name="ip-password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="ip-full-name" placeholder="Họ tên">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="ip-phone" placeholder="Số điện thoại">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="ip-address" placeholder="Địa chỉ">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="date" name="ip-birth" placeholder="Ngày sinh">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<select class="input100" name="ip-gender">
							<option value="0">Nam</option>
							<option value="1">Nữ</option>
							<option value="2">Khác</option>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit">Đăng ký</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230"></div>
					<div class="text-center w-full">
						<a class="txt1" href="?c=auth&m=login">
							Đăng nhập hệ thống <i class="fas fa-arrow-right ms-2"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>