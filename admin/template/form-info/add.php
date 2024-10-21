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
					    	<h4 class="panel-title">Khóa học</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<form action="?c=formInfo&m=doAdd" method="POST">
								
								<div class="form-floating">
									<select name="ip-form-group" id="ip-form-group" class="form-control fs-15px">
										<?php foreach ($formGroups as $key => $item) : ?>
											<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-form-group" class="d-flex align-items-center fs-13px">Nhóm</label>
								</div>

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
								<div class="form-floating mt-1" data-bs-toggle="modal" data-bs-target="#modal-form-content-html">
									<input type="hidden" name="ip-content-html" id="ip-content-html" />
								  	<input id="ip-content-html-tmp" class="form-control fs-15px" readonly />
								  	<label for="ip-content-html-tmp" class="d-flex align-items-center fs-13px">Mô tả HTML</label>
								</div>
								<!-- * Field Content HTML -->

								<!-- Field File -->
								<div class="mt-1">
									<input type="hidden" name="ip-thumb-url" id="ip-thumb-url" />
									<img src="" id="img-thumb" class="w-50 mb-2 rounded d-none">
									<input type="file" name="thumbFile" class="form-control" disabled accept="image/*"/>
								</div>
								<!-- * Field File -->

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
    <!-- Modal -->
    <div class="modal fade" id="modal-form-content-html">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Mô tả HTML</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body p-0 m-0">
					<textarea name="ip-content-html" id="ip-content-html" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Đóng</a>
					<a href="javascript:;" class="btn btn-success" data-bs-dismiss="modal">Lưu</a>
				</div>
			</div>
		</div>
	</div>
    <!-- * Modal -->
	<?php include_once("template/common/js.php"); ?>
	<script>
		/*
		$(`[name="thumbFile"]`).change(function(){
			var file = $(this).prop("files")[0];
			image.render("#img-thumb", file);
			$(`#img-thumb`).removeClass("d-none")
		})
		*/
        $("#modal-form-content-html [name='ip-content-html']").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "770"
	  	});
	</script>
</body>
</html>
