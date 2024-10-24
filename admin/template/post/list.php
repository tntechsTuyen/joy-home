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
				<li class="breadcrumb-item"><a href="javascript:;">Nội dung</a></li>
				<li class="breadcrumb-item active">Danh sách</li>
			</ol>

			<h1 class="page-header d-flex align-items-center">
			  	Quản lý nội dung
			</h1>

			<!-- Panel search -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
			    	<h4 class="panel-title">Bộ lọc</h4>
				    <div class="panel-heading-btn">
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" ><i class="fa fa-expand"></i></a>
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" ><i class="fa fa-minus"></i></a>
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove" ><i class="fa fa-times"></i></a>
				    </div>
				</div>
				<div class="panel-body">
					<form method="GET">
						<input type="text" name="c" class="d-none" value="post">
						<input type="text" name="m" class="d-none" value="list">
						<div class="row">
							<div class="col-xxl-2 col-xl-3 col-md-4">
								<div class="input-group mb-3">
									<span class="input-group-text">Tên</span>
									<input name="ip-name" id="ip-name" class="form-control" value="<?= $search['name']; ?>"/>
								</div>
							</div>
							
							<div class="col-xxl-2 col-xl-3 col-md-4">
								<div class="input-group mb-3">
									<span class="input-group-text">Key</span>
									<select name="ip-key" id="ip-key" class="form-control">
										<option value="">Tất cả</option>
										<?php foreach ($keys as $key => $item) : ?>
											<option <?= ($search['key'] == $item['key']) ? "selected" : ""; ?> value="<?= $item['key']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							
							<div class="col-xxl-2 col-xl-3 col-md-4">
								<div class="input-group mb-3">
									<span class="input-group-text">Loại</span>
									<select name="ip-type" id="ip-type" class="form-control">
										<option value="">Tất cả</option>
										<?php foreach ($types as $key => $item) : ?>
											<option <?= ($search['idType'] == $item['id']) ? "selected" : ""; ?> value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-xxl-2 col-xl-3 col-md-4">
								<div class="input-group mb-3">
									<span class="input-group-text">Trạng thái</span>
									<select name="ip-status" id="ip-status" class="form-control">
										<option value="">Tất cả</option>
										<?php foreach ($status as $key => $item) : ?>
											<option <?= ($search['idStatus'] == $item['id']) ? "selected" : ""; ?> value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-xxl-2 col-xl-3 col-md-4"><button type="submit" class="btn btn-primary"><i class="fa fa-search me-2"></i>Tìm kiếm</button></div>
						</div>
					</form>
				</div>
			</div>
			<!-- * Panel search -->

			<!-- Panel list -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
			    	<h4 class="panel-title">Danh sách</h4>
				    <div class="panel-heading-btn">
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" ><i class="fa fa-expand"></i></a>
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload" ><i class="fa fa-redo"></i></a>
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" ><i class="fa fa-minus"></i></a>
				    	<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove" ><i class="fa fa-times"></i></a>
				    </div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Mã</th>
									<th>Key</th>
									<th>Tên</th>
									<th>Mô tả</th>
									<th>Loại</th>
									<th>Trạng thái</th>
									<th>Ngày tạo</th>
									<th>Ngày sửa</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($posts) > 0) : ?>
	                      		<?php foreach ($posts as $key => $item) : ?>
	                      		<tr>
	                      			<td><?= $key + 1; ?></td>
	                      			<td><label class="mw-80px text-truncate" title="<?= $item['code']; ?>"><?= $item['code']; ?></label></td>
	                      			<td><?= $item['key_name']; ?></td>
	                      			<td><?= $item['name']; ?></td>
	                      			<td><?= $item['description']; ?></td>
	                      			<td><?= $item['type_name']; ?></td>
	                      			<td><?= $item['status_name']; ?></td>
	                      			<td><?= $item['created_date']; ?></td>
	                      			<td><?= $item['updated_date']; ?></td>
	                      			<td><a href="?c=post&m=goUpdate&code=<?= $item['code']; ?>"><i class="fa fa-cog"></i></a></td>
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
					<div class="text-end">
						<div class="btn-group paging" 
							onload="generalPage('.paging');"
							data-page="<?= $search['page']; ?>"
							data-count="<?= $search['count']; ?>"
							data-limit="<?= $search['limit']; ?>"></div>
					</div>
				</div>
			</div>
			<!-- * Panel list -->
		</div>
    </div>

	<?php include_once("template/common/js.php"); ?>
</body>
</html>
