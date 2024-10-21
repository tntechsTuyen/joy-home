<%@ page language="java" contentType="text/html; charset=utf-8" pageEncoding="utf-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ include file="/WEB-INF/jsp/admin/common/tags.jsp" %>
<!DOCTYPE html>
<html>
<%@ include file="/WEB-INF/jsp/admin/common/head.jsp" %>
<%@ include file="/WEB-INF/jsp/admin/common/css.jsp" %>
<body>
	<%@ include file="/WEB-INF/jsp/admin/common/loader.jsp" %>

    <div id="app" class="app app-header-fixed app-sidebar-fixed">
    	<%@ include file="/WEB-INF/jsp/admin/common/header.jsp" %>
    	<%@ include file="/WEB-INF/jsp/admin/common/sidebar.jsp" %>

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
							<form id="dataForm" method="POST" enctype="multipart/form-data">

								<!-- Field Code -->
								<div class="form-floating">
								  	<input id="ip-code" name="ip-code" class="form-control fs-15px" readonly disabled />
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã khóa học<span class="text-danger ms-1">*</span></label>
								</div>
								<!-- * Field Code -->

								<!-- Field Name -->
								<div class="form-floating mt-2">
								  	<input id="ip-name" id="ip-name" class="form-control fs-15px"/>
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên khóa học<span class="text-danger ms-1">*</span></label>
								</div>
								<!-- * Field Name -->

								<!-- Field Description -->
								<div class="form-floating mt-2">
								  	<input id="ip-description" id="ip-description" class="form-control fs-15px"/>
								  	<label for="ip-description" class="d-flex align-items-center fs-13px">Mô tả</label>
								</div>
								<!-- * Field Description -->

								<!-- Field Content HTML -->
								<div class="form-floating mt-2" data-bs-toggle="modal" data-bs-target="#modal-form-content-html">
								  	<input id="ip-content-html" class="form-control fs-15px" readonly />
								  	<label for="ip-content-html" class="d-flex align-items-center fs-13px">Mô tả HTML</label>
								</div>
								<!-- * Field Content HTML -->
								
								<!-- Field File -->
								<div class="mt-2">
									<img src="" id="img-thumb" class="w-50 mb-2 rounded d-none">
									<input type="file" name="thumbFile" class="form-control" accept="image/*"/>
								</div>
								<!-- * Field File -->

								<button type="submit" class="btn btn-primary mt-2">Lưu</button>
								<a class="btn btn-danger mt-2" href="#">Danh sách</a>
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
				<div class="col-xl-8">
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
							<!-- Field Cate -->
							<div class="form-floating">
							  	<select id="ip-cate" name="ip-cate" class="form-control fs-15px">
									<option value="0">-------------</option>
								</select>
							  	<label for="ip-cate" class="d-flex align-items-center fs-13px">Danh mục</label>
							</div>
							<!-- * Field Cate -->

							<!-- Field Code -->
							<div class="form-floating mt-2">
							  	<input id="ip-code" name="ip-code" class="form-control fs-15px" readonly disabled />
							  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã<span class="text-danger ms-1">*</span></label>
							</div>
							<!-- * Field Code -->

							<!-- Field Name -->
							<div class="form-floating mt-2">
							  	<input id="ip-name" id="ip-name" class="form-control fs-15px"/>
							  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên<span class="text-danger ms-1">*</span></label>
							</div>
							<!-- * Field Name -->

							<!-- Field type -->
							<div class="form-floating mt-2">
							  	<select id="ip-type" name="ip-type" class="form-control fs-15px">
									<option value="0">-------------</option>
								</select>
							  	<label for="ip-type" class="d-flex align-items-center fs-13px">Loại</label>
							</div>
							<!-- * Field type -->

							<!-- Field content -->
							<div class="mt-2">
								<img src="" id="img-thumb" class="w-50 mb-2 rounded d-none">
								<input type="file" name="thumbFile" class="form-control" accept="image/*"/>
							</div>

							<div class="form-floating mt-2">
								<textarea name="ip-content" id="ip-content" class="form-control"></textarea>
							</div>
							<!-- * Field content -->


							<button type="submit" class="btn btn-primary mt-2">Lưu</button>
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
	<%@ include file="/WEB-INF/jsp/admin/common/js.jsp" %>
	<script>
		/*
		$(`[name="thumbFile"]`).change(function(){
			var file = $(this).prop("files")[0];
			image.render("#img-thumb", file);
			$(`#img-thumb`).removeClass("d-none")
		})
		*/
		$("#jstree-form-cate").jstree({
		    "plugins": ["types", "contextmenu"],
		    "core": {
		      	"themes": { "responsive": false  },
		      	'check_callback': true,
                'data': [
                    { "id": "1", "parent": "#", "text": "Root node 1" },
                    { "id": "2", "parent": "1", "text": "Child node 1" },
                    { "id": "3", "parent": "1", "text": "Child node 2" },
                    { "id": "4", "parent": "3", "text": "Child node 3" },
                    { "id": "5", "parent": "3", "text": "Child node 4" },
                ]
	      	},
		    "types": {
		      	"default": { "icon": "fa fa-folder text-warning fa-lg" },
		      	"file": { "icon": "fa fa-file text-dark fa-lg" }
		    },
		    "contextmenu": {
		    	"items": function(node){
		    		var tree = $("#jstree-form-cate").jstree(true);
		    		var subMenu = {
                        "add": {
                            label: "Thêm",
                            action: function() {
                                var newNode = tree.create_node(node, { id: -1, text: "New Node" });
                                tree.edit(newNode);
                            }
                        },
                        "edit": {
                            label: "Sửa",
                            action: function() {
                                tree.edit(node);
                            }
                        },
                        "delete": {
                            label: "Xóa",
                            action: function() {
                                if (confirm("Có phải bạn đang muốn xóa nó ?")) {
                                    tree.delete_node(node);
                                }
                            }
                        },
                        "debug": {
                            label: "Debug",
                            action: function() {
                                console.log(node);
                            }
                        }
                    };
                    if(node.parents.length == 1) subMenu['delete'] = null;
                    else if(node.parents.length == 3) subMenu['add'] = null;
                    else if(node.parents.length > 3) subMenu = null;
                    return subMenu;
		    	}
		    }
	  	})

        $('#jstree-form-cate').on('delete_node.jstree', function(e, data) {
            //delete
        });

        $('#jstree-form-cate').on('rename_node.jstree', function(e, data) {
        	if(data.id*1 === -1){
        		//insert
        	}else{
        		//update
        	}
        });

        $("#ip-content").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "400"
	  	});

        $("#modal-form-content-html [name='ip-content-html']").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "770"
	  	});
	</script>
</body>
</html>
