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
					    	<h4 class="panel-title">Khóa học</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<form id="form-info" action="?c=formInfo&m=doUpdate" method="POST">
								
								<div class="form-floating">
									<select name="ip-form-group" id="ip-form-group" class="form-control fs-15px">
										<?php foreach ($formGroups as $key => $item) : ?>
											<option <?= ($formInfo['id_form_group'] == $item['id']) ? "selected" : ""; ?> value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-form-group" class="d-flex align-items-center fs-13px">Nhóm</label>
								</div>

								<div class="form-floating mt-1">
									<input type="hidden" name="ip-code" value="<?= $formInfo['code']; ?>">
								  	<input id="ip-code" class="form-control fs-15px" value="<?= $formInfo['code']; ?>" readonly />
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-name" id="ip-name" class="form-control fs-15px" value="<?= $formInfo['name']; ?>"/>
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên</label>
								</div>

								<div class="form-floating mt-1">
								  	<input name="ip-description" id="ip-description" class="form-control fs-15px" value="<?= $formInfo['description']; ?>"/>
								  	<label for="ip-description" class="d-flex align-items-center fs-13px">Mô tả</label>
								</div>

								<!-- Field Content HTML -->
								<div class="form-floating d-none mt-1" data-bs-toggle="modal" data-bs-target="#modal-form-content-html">
									<input type="hidden" name="ip-content-html" id="ip-content-html" />
								  	<input id="ip-content-html-tmp" class="form-control fs-15px" readonly />
								  	<label for="ip-content-html-tmp" class="d-flex align-items-center fs-13px">Mô tả HTML</label>
								</div>
								<!-- * Field Content HTML -->

								<!-- Field File -->
								<div class="mt-1">
									<input type="text" class="d-none" name="ip-thumb-url" id="ip-thumb-url" value="<?= $formInfo['thumb_url']; ?>" />
									<input type="file" id="dataFile1" name="dataFile" class="form-control" accept="image/*" id="ip-form-file" data-input="#ip-thumb-url" data-target="#form-info-url"/>
									<span class="text-success mb-0"><i class="fas fa-info-circle me-2"></i><a id="form-info-url" href="../<?= $formInfo['thumb_url']; ?>" target="_blank"><?= $formInfo['thumb_url']; ?></a></span>
								</div>
								<!-- * Field File -->

								<button type="submit" class="btn btn-primary mt-1">Lưu</button>
								<a class="btn btn-danger mt-1" href="?c=formInfo&m=list">Danh sách</a>
							</form>
						</div>
					</div>
					<!-- * Form Information -->

					<!-- Form Cate -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Danh mục</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<div id="jstree-form-cate"></div>
						</div>
					</div>
					<!-- * Form Cate -->
				</div>
				<!-- * Content left -->

				<!-- Content right -->
				<div id="form-step-info" class="col-xl-8 d-none">
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Nội dung</h4>
						    <div class="panel-heading-btn">
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
						    </div>
						</div>
						<div class="panel-body">
							<form id="form-step" action="?c=formStep&m=doUpdate" method="POST">

								<!-- Field Cate -->
								<div class="form-floating">
								  	<input id="ip-cate" name="ip-cate" class="form-control fs-15px" readonly />
								  	<label for="ip-cate" class="d-flex align-items-center fs-13px">Danh mục</label>
								</div>
								<!-- * Field Cate -->

								<!-- Field Code -->
								<div class="form-floating mt-2">
								  	<input id="ip-code" name="ip-code" class="form-control fs-15px" readonly />
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã<span class="text-danger ms-1">*</span></label>
								</div>
								<!-- * Field Code -->

								<!-- Field Name -->
								<div class="form-floating mt-2">
								  	<input id="ip-name" name="ip-name" class="form-control fs-15px"/>
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên<span class="text-danger ms-1">*</span></label>
								</div>
								<!-- * Field Name -->

								<!-- Field type -->
								<div class="form-floating mt-2">
								  	<select id="ip-type" name="ip-type" class="form-control fs-15px">
								  		<?php foreach ($types as $key => $item) : ?>
											<option value="<?= $item['id']; ?>" ext="<?= $item['ext']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								  	<label for="ip-type" class="d-flex align-items-center fs-13px">Loại</label>
								</div>
								<!-- * Field type -->

								<!-- Field content -->
								<div id="step-file" class="mt-2">
									<input type="file" id="dataFile2" name="dataFile" class="form-control" accept="image/*" data-input="#ip-content" data-target="#step-content-url"/>
									<span class="text-success mb-0"><i class="fas fa-info-circle me-2"></i><a id="step-content-url" href="" target="_blank"></a></span>
								</div>
								<input type="text" name="ip-content" id="ip-content" class="d-none" />
								<div id="step-content" class="form-floating mt-2">
									<textarea name="ip-content-html" class="form-control"></textarea>
								</div>
								<!-- * Field content -->

								<button type="submit" class="btn btn-primary mt-2">Lưu</button>
							</form>
						</div>
					</div>
				</div>
				<!-- * Content right -->
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
		var dataset = {
			formCates: []
		}

		init();
		async function init(){
			initCates();
		}

		function generateCateTree(){

			$("#jstree-form-cate").jstree({
			    "plugins": ["types", "contextmenu"],
			    "core": {
			      	"themes": { "responsive": false  },
			      	'check_callback': true,
	                'data': dataset.formCates
		      	},
			    "types": {
			      	"default": { "icon": "fa fa-folder text-warning fa-lg" },
			      	"file": { "icon": "fa fa-file text-dark fa-lg" }
			    },
			    "contextmenu": {
			    	"items": function(node){
			    		var tree = $("#jstree-form-cate").jstree(true);
			    		var subMenu = {}
			    		const addCate = {
                            label: "Thêm danh mục",
                            action: function() {
                                var newNode = tree.create_node(node, { id: -1, text: "Danh mục mới" });
                                tree.edit(newNode);
                            }
			    		}
			    		const editCate = {
                            label: "Sửa danh mục",
                            action: async function() {
                                tree.edit(node);
                            }
			    		}

			    		const deleteCate = {
                            label: "Xóa danh mục",
                            action: function() {
                                if (confirm("Có phải bạn đang muốn xóa nó ?")) {
                                    tree.delete_node(node);
                                }
                            }
                        }

	                    const addStep = {
                    		label: "Thêm nội dung",
                    		action: function(){
								var newNode = tree.create_node(node, { id: -1, data: '', text: "Nội dung mới", type: 'file' });
                                tree.edit(newNode);
                    		}
	                    }

	                    const editStep = {
	                    	label: "Sửa nội dung",
                    		action: function(){
								//Show to UI
								showStepInfo(node);
                    		}
	                    }

	                    const deleteStep = {
	                    	label: "Xóa nội dung",
                    		action: function(){
								if (confirm("Có phải bạn đang muốn xóa nó ?")) {
                                    tree.delete_node(node);
                                }
                    		}
	                    }

	                    const debug = {
	                    	label: "Debug",
	                    	action: function(){
	                    		console.log(node)
	                    	}
	                    }

	                    if(node.parents.length == 1) subMenu = {add_cate: addCate};
	                    else if(node.parents.length == 2) subMenu = {add_step: addStep, edit_cate: editCate, delete_cate: deleteCate};
	                    else if(node.parents.length == 3) subMenu = {edit_step: editStep, delete_step: deleteStep};
	                    subMenu['debug'] = debug;
	                    return subMenu;
			    	}
			    }
		  	})

	        $('#jstree-form-cate').on('delete_node.jstree', function(e, data) {
	            //delete
	        });

	        $('#jstree-form-cate').on('rename_node.jstree', async function(e, data) {
	        	var node = data.node;
	        	var item;
	        	if(node.type == 'file'){
	        		item = await saveStep(node.data, node.parent, node.text);
	        	}else{
            		item = await saveCate(node.id, node.parent, node.text);
	        	}
	        	node.id = item.id
	        });
		}
		

        $("#step-content textarea[name='ip-content-html']").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "400",
		    callbacks: {
		    	onChange: function(contents, $editable) {
		    		$(`#form-step input[name='ip-content']`).val(contents);
			    }
		    }
	  	});

        $("#form-step select[name='ip-type']").change(function(){
        	const val = $("#form-step select[name='ip-type']").find(':selected').val()*1;
        	const ext = $("#form-step select[name='ip-type']").find(':selected').attr('ext');
        	console.log()
        	if(val == 1){
        		$("#step-file").addClass('d-none');
        		$("#step-content").removeClass('d-none');
        	}else{
        		$("#step-file").removeClass('d-none');
        		$("#step-content").addClass('d-none');
        		$("#form-step input[name='dataFile']").attr('accept', ext);
        	}
        })

		$(`[name="dataFile"]`).change(function(){
			const id = $(this).attr('id');
			uploadMedia(`#${id}`);
		})

	  	async function initCates(){
	  		var res = await API.FORM_CATE.list({code: '<?= $formInfo['code']; ?>'});
	  		
	  		if(res.code != 200) {
	  			alert(res.message);
	  			return;
	  		}

	  		for(var i = 0; i < res.data.length; i++){
	  			const item = res.data[i];
	  			dataset.formCates.push({
	  				id: item['id']*1,
	  				parent: (item['id_parent']*1 == 0) ? "#" : item['id_parent'],
	  				data: item['code'],
	  				text: item['name'],
	  				type: item['type'],
	  				description: item['description']
	  			})
	  		}
	  		generateCateTree();
	  	}

	  	async function saveCate(id, idParent, name){
	  		var params = new FormData();
	  		params.append('id', (['-1','#'].indexOf(id) == -1) ? id : 0)
	  		params.append('id_parent', idParent);
	  		params.append('name', name);
	  		var res = await API.FORM_CATE.save(params);
	  		if(res.code != 200) {
	  			alert(res.message);
	  			return;
	  		}

	  		return res.data
	  	}

	  	async function saveStep(code, idFormCate, name){
	  		var params = new FormData();
	  		params.append('code', code)
	  		params.append('id_form_cate', idFormCate);
	  		params.append('name', name);

	  		var res = await API.FORM_STEP.save(params);
	  		if(res.code != 200) {
	  			alert(res.message);
	  			return;
	  		}

	  		return res.data
	  	}

	  	async function showStepInfo(node){
	  		const res = await API.FORM_STEP.info({code: node.data});
			if(res.code != 200) {
	  			alert(res.message);
	  			return;
	  		}
	  		const stepInfo = res.data;
	  		$(`#form-step input[name='ip-cate']`).val(stepInfo['form_name']);
	  		$(`#form-step input[name='ip-code']`).val(stepInfo['code']);
	  		$(`#form-step input[name='ip-name']`).val(stepInfo['name']);
	  		$(`#form-step input[name='ip-content']`).val(stepInfo['content']);
	  		$(`#form-step select[name='ip-type']`).val(stepInfo['id_type']).change();

	  		if(stepInfo['id_type']*1 == 1){
	  			$("#step-content textarea[name='ip-content-html']").summernote('code', stepInfo['content']);
	  		}else{
	  			$(`#step-content-url`).html(stepInfo['content']);
	  			$(`#step-content-url`).attr('href', `../${stepInfo['content']}`);
	  		}

	  		$('#form-step-info').removeClass('d-none');
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
	</script>
</body>
</html>
