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
				<li class="breadcrumb-item active">Cập nhật</li>
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
							<form action="?c=packInfo&m=doUpdate" method="POST">

								<div class="form-floating mt-2">
								  	<input type="text" name="ip-code" class="d-none" value="<?= $packInfo['code']; ?>">
								  	<input id="ip-code" class="form-control fs-15px" value="<?= $packInfo['code']; ?>" readonly disabled />
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã</label>
								</div>

								<div class="form-floating mt-2">
								  	<input name="ip-name" id="ip-name" class="form-control fs-15px" value="<?= $packInfo['name']; ?>" />
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên</label>
								</div>

								<div class="form-floating mt-2">
								  	<input name="ip-description" id="ip-description" class="form-control fs-15px" value="<?= $packInfo['description']; ?>"/>
								  	<label for="ip-description" class="d-flex align-items-center fs-13px">Mô tả</label>
								</div>
								
								<div class="form-floating mt-2">
								  	<input type="number" name="ip-price" id="ip-price" class="form-control fs-15px" value="<?= $packInfo['price']; ?>" />
								  	<label for="ip-price" class="d-flex align-items-center fs-13px">Giá</label>
								</div>

								<button type="submit" class="btn btn-primary mt-2">Lưu</button>
								<a class="btn btn-danger mt-2" href="?c=packInfo&m=list">Danh sách</a>
							</form>
						</div>
					</div>
					<!-- * Form Information -->
				</div>
				<!-- * Content left -->

				<div class="col-xl-4">
					<!-- Form Information -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Danh sách khóa học</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<button class="btn btn-info me-5px btn-sm" data-bs-toggle="modal" data-bs-target="#modal-setup-form"><i class="fa fa-cogs"></i> Cài đặt</button>
							<table class="table table-bordered table-hover mt-2">
								<thead>
									<tr>
										<th>#</th>
										<th>Nhóm</th>
										<th>Ảnh</th>
										<th>Mã</th>
										<th>Tên</th>
										<th>Mô tả</th>
									</tr>
								</thead>
								<tbody>
									<?php if(count($packForms) > 0) : ?>
		                      		<?php foreach ($packForms as $key => $item) : ?>
		                      		<tr>
		                      			<td><?= $key + 1; ?></td>
		                      			<td><?= $item['group_name']; ?></td>
		                      			<td><img src="../<?= $item['form_thumb_url']; ?>" class="rounded h-30px"></td>
		                      			<td><?= $item['form_code']; ?></td>
		                      			<td><?= $item['form_name']; ?></td>
		                      			<td><?= $item['form_description']; ?></td>
		                      		</tr>
		                      		<?php endforeach; ?>
		                      		<?php else : ?>
		                      			<tr>
		                      				<td colspan="100%" class="text-center"><i class="fa fa-inbox"></i> Không có dữ liệu</i></td>
		                      			</tr>
		                      		<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Content -->

    </div>
    <!-- * App -->

    <!-- Modal -->
    <div class="modal fade" id="modal-setup-form">
		<div class="modal-dialog modal-xl">
			<form action="?c=packInfo&m=updateForm" method="POST">
				<input type="text" name="ip-code" class="d-none" value="<?= $packInfo['code']; ?>" />
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Cấu hình khóa học</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
					</div>
					<div class="modal-body p-0 m-0">
						<table class="table table-bordered table-hover m-0">
							<thead>
								<tr>
									<th></th>
									<th>#</th>
									<th>Nhóm</th>
									<th>Ảnh</th>
									<th>Mã</th>
									<th>Tên</th>
									<th>Mô tả</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($setupForms) > 0) : ?>
	                      		<?php foreach ($setupForms as $key => $item) : ?>
	                      		<tr>
	                      			<td class="text-center"><input type="checkbox" id="cb-setup-form-<?= $key; ?>" name="cb-setup-form[]" value="<?= $item['form_id']; ?>" <?= ($item['id'] != null) ? 'checked' : ''; ?>></td>
	                      			<td class="text-center"><?= $key + 1; ?></td>
	                      			<td><?= $item['group_name']; ?></td>
	                      			<td><img src="../<?= $item['form_thumb_url']; ?>" class="rounded h-20px"></td>
	                      			<td><?= $item['form_code']; ?></td>
	                      			<td><?= $item['form_name']; ?></td>
	                      			<td><?= $item['form_description']; ?></td>
	                      		</tr>
	                      		<?php endforeach; ?>
	                      		<?php else : ?>
	                      			<tr>
	                      				<td colspan="100%" class="text-center"><i class="fa fa-inbox"></i> Không có dữ liệu</i></td>
	                      			</tr>
	                      		<?php endif; ?>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<a class="btn btn-white" data-bs-dismiss="modal">Đóng</a>
						<button id="btn-save-setup" class="btn btn-success" type="submit" data-bs-dismiss="modal">Lưu</button>
					</div>
				</div>
			</form>
		</div>
	</div>
    <!-- * Modal -->
	<?php include_once("template/common/js.php"); ?>
</body>
</html>
