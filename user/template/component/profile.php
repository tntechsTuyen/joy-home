<?php include_once("user/template/common/head.php"); ?>
<?php include_once("user/template/common/css.php"); ?>
<style>
    #menu-left li:hover{
        cursor: pointer;
        font-weight: bold;
        font-style: italic;
    }
</style>
<body>
    <?php include_once("user/template/common/loader.php"); ?>
    <?php include_once("user/template/common/header.php"); ?>

    <!-- About 1 -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <ul class="list-group" id="menu-left">
                            <li class="list-group-item active" data-target="#content-tab-1"><i class="fas fa-user-circle me-2"></i>Thông tin cá nhân</li>
                            <li class="list-group-item" data-target="#content-tab-2"><i class="fas fa-book-reader me-2"></i>Khóa học</li>
                            <li class="list-group-item" data-target="#content-tab-3"><i class="fas fa-shopping-cart me-2"></i>Đơn hàng</li>
                            <?php if($userInfo['id_role'] == 1) : ?>
                            <li class="list-group-item" onclick="location.href = './admin'"><i class="fas fa-cogs me-2"></i>Admin</li>
                            <?php endif; ?>
                            <li class="list-group-item" onclick="location.href = '?c=auth&m=logout'"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</li>
                        </ul>    
                    </div>
                </div>
                <div class="col-lg-9" style="min-height: 600px;">
                    <!-- Content tab 1 -->
                    <!-- Profile data -->
                    <div class="content-detail card px-4 py-2" id="content-tab-1">
                        <div class="mb-3">
                            <label for="ip-email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="ip-email" placeholder="name@example.com" value="<?= $userInfo['email']; ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="ip-full-name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="ip-full-name" placeholder="Họ tên" value="<?= $userInfo['full_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ip-phone" class="form-label">SĐT</label>
                            <input type="text" class="form-control" id="ip-phone" placeholder="SĐT" value="<?= $userInfo['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ip-address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="ip-address" placeholder="Địa chỉ" value="<?= $userInfo['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ip-birth" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="ip-birth" placeholder="Ngày sinh" value="<?= $userInfo['birth']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ip-gender" class="form-label">Giới tính</label>
                            <select class="form-select" id="ip-gender">
                                <option <?= ($user['gender'] == 0) ? "selected" : ""; ?> value="0">Nam</option>
                                <option <?= ($user['gender'] == 1) ? "selected" : ""; ?> value="1">Nữ</option>
                                <option <?= ($user['gender'] == 2) ? "selected" : ""; ?> value="2">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                    <!-- * Content tab 1 -->

                    <!-- Content tab 2 -->
                    <!-- Courses data -->
                    <div class="content-detail card px-4 py-2 d-none" id="content-tab-2">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Tiến độ</th>
                                        <th>Trạng thái</th>
                                        <th>Lần cuối</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($forms) > 0) : ?>
                                    <?php foreach ($forms as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $item['form_name']; ?></td>
                                        <td><?= $item['process']; ?> %</td>
                                        <td><?= $item['status_name']; ?></td>
                                        <td><?= $item['updated_date']; ?></td>
                                        <td><a href="?c=courses&m=learn&code=<?= $item['code']; ?>"><i class="fa fa-file-signature"></i></a></td>
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
                    <!-- * Content tab 2 -->

                    <!-- Content tab 3 -->
                    <!-- Order data -->
                    <div class="content-detail card px-4 py-2 d-none" id="content-tab-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($orders) > 0) : ?>
                                    <?php foreach ($orders as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><label class="mw-80px text-truncate" title="<?= $item['code']; ?>"><?= $item['code']; ?></label></td>
                                        <td><?= $item['pack_name']; ?></td>
                                        <td><?= $item['status_name']; ?></td>
                                        <td><?= $item['created_date']; ?></td>
                                        <td><?= $item['updated_date']; ?></td>
                                        <td>
                                            <?php if($item['id_status'] == 15) : ?>
                                            <a href="?c=order&m=doCancel&code=<?= $item['pack_code']; ?>"><i class="fa fa-trash text-danger"></i></a>
                                            <?php endif; ?>
                                        </td>
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
                    <!-- * Content tab 3 -->
                </div>
            </div>
        </div>
    </div>
    <!-- * About 1 -->
    <?php include_once("user/template/common/footer.php"); ?>
    <?php include_once("user/template/common/js.php"); ?>
    <script>
        $("#menu-left li").click(function(){
            $("#menu-left li").removeClass('active');
            $(this).addClass('active');
            const target = $(this).data('target');
            $(".content-detail:not(.d-none)").addClass('d-none');
            $(target).removeClass('d-none');
        })
    </script>
</body>
</html>