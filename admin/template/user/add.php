<!DOCTYPE html>
<html>
<?php include_once("template/common/head.php"); ?>
<?php include_once("template/common/css.php"); ?>
<body>

	<?php include_once("template/common/loader.php"); ?>

    <div id="app" class="app app-header-fixed app-sidebar-fixed">
		<?php include_once("template/common/header.php"); ?>
		<?php include_once("template/common/sidebar.php"); ?>

		<div id="content" class="app-content">
			<ol class="breadcrumb float-xl-end">
				<li class="breadcrumb-item"><a href="javascript:;">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Tài khoản</a></li>
				<li class="breadcrumb-item active">Thêm mới</li>
			</ol>

			<h1 class="page-header d-flex align-items-center">
			  	Tài khoản <small class="ms-1">tạo mới</small>
			</h1>

			<!-- Panel search -->
			<div class="row">
				<div class="col-xl-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Thông tin tài khoản</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" ><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload" ><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" ><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove" ><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<form action="?c=user&m=doAdd" method="POST">

								<div class="form-floating">
								  	<input name="ip-username" id="ip-username" class="form-control fs-15px"/>
								  	<label for="ip-username" class="d-flex align-items-center fs-13px">Tài khoản</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-password" id="ip-password" class="form-control fs-15px" type="password"/>
								  	<label for="ip-password" class="d-flex align-items-center fs-13px">Mật khẩu</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-full-name" id="ip-full-name" class="form-control fs-15px"/>
								  	<label for="ip-full-name" class="d-flex align-items-center fs-13px">Tên</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-phone" id="ip-phone" class="form-control fs-15px" />
								  	<label for="ip-phone" class="d-flex align-items-center fs-13px">Số ĐT</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-address" id="ip-address" class="form-control fs-15px"/>
								  	<label for="ip-address" class="d-flex align-items-center fs-13px">Địa chỉ</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-email" id="ip-email" class="form-control fs-15px"/>
								  	<label for="ip-email" class="d-flex align-items-center fs-13px">Mail</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-birth" id="ip-birth" class="form-control fs-15px" type="date" />
								  	<label for="ip-birth" class="d-flex align-items-center fs-13px">Ngày sinh</label>
								</div>

								<div class="form-floating mt-1">
									<select name="ip-gender" id="ip-gender" class="form-control fs-15px">
										<option value="0">Nam</option>
										<option value="1">Nữ</option>
										<option value="2">Khác</option>
									</select>
								  	<label for="ip-gender" class="d-flex align-items-center fs-13px">Giới tính</label>
								</div>

								<div class="form-floating mt-1">
									<select name="ip-role" id="ip-role" class="form-control fs-15px">
										<?php foreach ($role as $key => $item) : ?>
											<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-role" class="d-flex align-items-center fs-13px">Quyền hạn</label>
								</div>

								<button type="submit" class="btn btn-primary mt-1">Lưu</button>
								<a class="btn btn-danger mt-1" href="?c=user&m=list">Danh sách</a>
							</form>
						</div>
					</div>
				</div>
			</div>	
			<!-- * Panel list -->
		</div>
    </div>

	<?php include_once("template/common/js.php"); ?>
</body>
</html>
