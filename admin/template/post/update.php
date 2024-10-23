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
				<li class="breadcrumb-item"><a href="javascript:;">Nhóm</a></li>
				<li class="breadcrumb-item active">Thêm mới</li>
			</ol>

			<h1 class="page-header d-flex align-items-center">
			  	Nhóm <small class="ms-1">cập nhật</small>
			</h1>

			<!-- Panel search -->
			<div class="row">
				<div class="col-xl-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Thông tin nhóm</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" ><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload" ><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" ><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove" ><i class="fa fa-times"></i></a>
						    </div>
						</div>
						
						<div class="panel-body">
							<form action="?c=post&m=doUpdate" method="POST">
								<input type="text" name="ip-code" value="<?= $post['code'] ?>" class="d-none">
								<!-- Field key -->
								<div class="form-floating mt-1">
								  	<select id="ip-key" name="ip-key" class="form-control fs-15px">
								  		<?php foreach ($keys as $key => $item) : ?>
											<option value="<?= $item['key']; ?>" <?= ($item['key'] == $post['key']) ? "selected" : ""; ?>><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-key" class="d-flex align-items-center fs-13px">Loại</label>
								</div>
								<!-- * Field key -->
								
								<div class="form-floating mt-1">
								  	<input name="ip-name" id="ip-name" class="form-control fs-15px" value="<?= $post['name'] ?>"/>
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên</label>
								</div>

								<!-- Field type -->
								<div class="form-floating mt-1">
								  	<select id="ip-type" name="ip-type" class="form-control fs-15px">
								  		<?php foreach ($types as $key => $item) : ?>
											<option value="<?= $item['id']; ?>" ext="<?= $item['ext']; ?>" <?= ($item['id'] == $post['id_type']) ? "selected" : ""; ?>><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-type" class="d-flex align-items-center fs-13px">Loại</label>
								</div>
								<!-- * Field type -->

								<div class="form-floating mt-1">
								  	<input name="ip-description" id="ip-description" class="form-control fs-15px"  value="<?= $post['description'] ?>"/>
								  	<label for="ip-description" class="d-flex align-items-center fs-13px">Mô tả</label>
								</div>

								<!-- Field content -->
								<div id="step-file" class="mt-2">
									<input type="file" id="dataFile2" name="dataFile" class="form-control" accept="image/*" data-input="#ip-content" data-target="#step-content-url"/>
									<span class="text-success mb-0"><i class="fas fa-info-circle me-2"></i><a id="step-content-url" href="" target="_blank"></a></span>
								</div>
								<input type="text" name="ip-content" id="ip-content" class="d-none" value="<?= $post['content'] ?>" />
								<div id="step-content" class="form-floating mt-2">
									<textarea name="ip-content-html" class="form-control"></textarea>
								</div>
								<!-- * Field content -->

								<!-- Field type -->
								<div class="form-floating mt-1">
								  	<select id="ip-status" name="ip-status" class="form-control fs-15px">
								  		<?php foreach ($status as $key => $item) : ?>
											<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-status" class="d-flex align-items-center fs-13px">Trạng thái</label>
								</div>
								<!-- * Field type -->

								<button type="submit" class="btn btn-primary mt-1">Lưu</button>
								<a class="btn btn-danger mt-1" href="?c=post&m=list">Danh sách</a>
							</form>
						</div>
					</div>
				</div>
			</div>	
			<!-- * Panel list -->
		</div>
    </div>

	<?php include_once("template/common/js.php"); ?>
	<script>
		init()
		function init(){
			const content = $("#ip-content").val();
			if(<?= $post['id_type'] ?> == 5){
	  			$("textarea[name='ip-content-html']").summernote('code', content);
	  		}else{
	  			$(`#step-content-url`).html(content);
	  			$(`#step-content-url`).attr('href', `../${content}`);
	  		}
		}

	  	async function uploadMedia(inputId){
	  		var formData = new FormData();
	  		formData.append('file', $(inputId)[0].files[0]); 

	  		const res = await API.MEDIA.upload(formData);
	  		if(res.code != 200) {
	  			alert(res.message);
	  			return;
	  		}
	  		const data = res.data;
	  		
	  		const target = $(inputId).data('target');
	  		const input = $(inputId).data('input');
	  		$(target).html(data.path);
	  		$(target).attr('href',`../${data.path}`);
	  		$(input).val(data.path);
	  	}

		$("textarea[name='ip-content-html']").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "400",
		    callbacks: {
		    	onChange: function(contents, $editable) {
		    		$(`input[name='ip-content']`).val(contents);
			    }
		    }
	  	});

		$(`[name="dataFile"]`).change(function(){
			const id = $(this).attr('id');
			uploadMedia(`#${id}`);
		})

		$("select[name='ip-type']").change(function(){
        	const val = $("select[name='ip-type']").find(':selected').val()*1;
        	const ext = $("select[name='ip-type']").find(':selected').attr('ext');
        	if(val == 5){
        		$("#step-file").addClass('d-none');
        		$("#step-content").removeClass('d-none');
        	}else{
        		$("#step-file").removeClass('d-none');
        		$("#step-content").addClass('d-none');
        		$("input[name='dataFile']").attr('accept', ext);
        	}
        })
        $("select[name='ip-type']").change();
	</script>
</body>
</html>
