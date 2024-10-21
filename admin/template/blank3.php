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
				<li class="breadcrumb-item"><a href="javascript:;">Gói</a></li>
				<li class="breadcrumb-item active">Thêm mới</li>
			</ol>
			
			<h1 class="page-header">Thông tin gói</h1>
			<div class="row">
				<!-- Content left -->
				<div class="col-xl-4">
					<!-- Form Information -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
					    	<h4 class="panel-title">Chi tiết gói</h4>
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
								  	<label for="ip-code" class="d-flex align-items-center fs-13px">Mã<span class="text-danger ms-1">*</span></label>
								</div>
								<!-- * Field Code -->

								<!-- Field Name -->
								<div class="form-floating mt-2">
								  	<input id="ip-name" id="ip-name" class="form-control fs-15px"/>
								  	<label for="ip-name" class="d-flex align-items-center fs-13px">Tên<span class="text-danger ms-1">*</span></label>
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
								
								<!-- Field Description -->
								<div class="form-floating mt-2">
								  	<input id="ip-price" id="ip-price" class="form-control fs-15px"/>
								  	<label for="ip-price" class="d-flex align-items-center fs-13px">Giá</label>
								</div>
								<!-- * Field Description -->

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
				</div>
				<!-- * Content left -->

				<!-- Content right -->
				<div class="col-xl-8">
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
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Mã</th>
										<th>Tên</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td> ${loop.index + 1}</td>
                                        <td class="text-info cur-progress" title="${item.userFullName}">${item.userCode}</td>
                                        <td>${item.code}</td>
                                        <td>${item.name}</td>
                                        <td>${item.address}</td>
                                        <td>${item.description}</td>
                                        <td>${item.tax}</td>
                                        <td>${item.createdDate}</td>
                                        <td><a href="${_ctx}/admin/supplier/update/${item.id}"><i class="fa fa-cog"></i></a></td>
                                    </tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- * Content right -->
			</div>
		</div>
		<!-- * Content -->
    </div>
    <!-- * App -->
	<%@ include file="/WEB-INF/jsp/admin/common/js.jsp" %>
</body>
</html>
