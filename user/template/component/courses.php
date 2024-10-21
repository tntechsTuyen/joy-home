<?php include_once("user/template/common/head.php"); ?>
<?php include_once("user/template/common/css.php"); ?>
<body>

    <?php include_once("user/template/common/loader.php"); ?>
    <?php include_once("user/template/common/header.php"); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Khóa học</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="?m=index">JOYHome</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Khóa học</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Pack Start -->
    <div class="container-fluid program py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius mb-5">Các khóa học của Joy-Home</h4>
            </div>
            <div class="row g-5 justify-content-center">
                <?php foreach ($packs as $key => $item) : ?>
                <!-- Item -->
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="program-item rounded">
                        <div class="program-img position-relative">
                            <div class="overflow-hidden img-border-radius">
                                <img src="<?= $item['thumb_url']; ?>" class="img-fluid w-100" alt="Image">
                            </div>
                            <div class="px-4 py-2 bg-primary text-white program-rate"><?= number_format($item['price']); ?>đ</div>
                        </div>
                        <div class="program-text bg-white px-4 pb-3">
                            <div class="program-text-inner h-360px">
                                <a href="#" class="h4"><?= $item['name']; ?></a>
                                <?= $item['content_html']; ?>
                            </div>
                        </div>
                        <?php if($userInfo != null) : ?>
                        <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                            <a href="?c=order&m=create&code=<?= $item['code']; ?>" class="btn btn-secondary w-100">Đăng ký</a>
                        </div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                            <small class="text-white"><i class="fas fa-user-graduate me-1"></i> 30 Học viên</small>
                            <small class="text-white"><i class="fas fa-book me-1"></i> 11 Bài giảng</small>
                            <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Giờ học</small>
                        </div>
                    </div>
                </div>
                <!-- * Item -->
                <?php endforeach; ?>
            </div> 
        </div>
    </div>
    <!-- Pack End -->

    <?php include_once("user/template/common/footer.php"); ?>
    <?php include_once("user/template/common/js.php"); ?>
</body>
</html>