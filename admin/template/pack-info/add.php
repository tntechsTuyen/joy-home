<!DOCTYPE html>
<html>
<?php include_once("template/common/head.php"); ?>
<?php include_once("template/common/css.php"); ?>
<body>

	<?php include_once("template/common/loader.php"); ?>

    <div id="app" class="app app-header-fixed app-sidebar-fixed">
		<?php include_once("template/common/header.php"); ?>
		<?php include_once("template/common/sidebar.php"); ?>

		<!-- Content -->
		<div id="content" class="app-content">
			<ol class="breadcrumb float-xl-end">
				<li class="breadcrumb-item"><a href="javascript:;">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Khóa học</a></li>
				<li class="breadcrumb-item active">Thêm mới</li>
			</ol>
			
			<h1 class="page-header">Thông tin khóa học</h1>
			<div class="row">
				<!-- Content left -->
				<div class="col-xl-4">
					<!-- Form Information -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Thông tin</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<form action="?c=packInfo&m=doAdd" method="POST">

								<div class="form-floating mt-1">
								  	<input name="ip-code" id="ip-code" class="form-control fs-15px" readonly disabled />
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-name" id="ip-name" class="form-control fs-15px" />
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-description" id="ip-description" class="form-control fs-15px"/>
								  	<label for="ip-description" class="d-flex align-items-center fs-13px">Mô tả</label>
								</div>

								<!-- Field Content HTML -->
								
								<div class="form-floating mt-1">
								  	<input type="number" name="ip-price" id="ip-price" class="form-control fs-15px" />
								  	<label for="ip-price" class="d-flex align-items-center fs-13px">Giá</label>
								</div>
								<!-- * Field Content HTML -->

								<button type="submit" class="btn btn-primary mt-1">Lưu</button>
								<a class="btn btn-danger mt-1" href="?c=user&m=list">Danh sách</a>
							</form>
						</div>
					</div>
					<!-- * Form Information -->
				</div>
				<!-- * Content left -->
			</div>
		</div>
		<!-- * Content -->
    </div>
    <!-- * App -->
	<?php include_once("template/common/js.php"); ?>
</body>
</html>
