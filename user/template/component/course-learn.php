<?php include_once("user/template/common/head.php"); ?>
<?php include_once("user/template/common/css.php"); ?>
<style>
.step-content,
.custom-scrollbar-js,
.custom-scrollbar-css {
  height: calc(100vh - 65px);
}


/* Custom Scrollbar using CSS */
.custom-scrollbar-css {
  overflow-y: scroll;
}

/* scrollbar width */
.custom-scrollbar-css::-webkit-scrollbar {
  width: 5px;
}

/* scrollbar track */
.custom-scrollbar-css::-webkit-scrollbar-track {
  background: #eee;
}

/* scrollbar handle */
.custom-scrollbar-css::-webkit-scrollbar-thumb {
  border-radius: 1rem;
  background-color: #00d2ff;
  background-image: linear-gradient(to top, #00d2ff 0%, #d92c6d 100%);
}
#tool-bar{
    display: none;
}
</style>
<body class="overflow-hidden">
    <!-- * Spinner -->
    <?php include_once("user/template/common/loader.php"); ?>
    <!-- * Spinner -->

    <!-- Navbar -->
    <div class="container-fluid border-bottom bg-light wow fadeIn position-relative" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Hà Nội, Việt Nam</a></small>
                </div>
            </div>
        </div>
        <?php if($stepInfo['upfs_status'] != 14) : ?>
        <a class="btn btn-xs btn-success position-absolute top-50 end-0 translate-middle-y" href="?c=courses&m=finish&code=<?= $userPackcode ?>&step=<?= $stepInfo['step_code'] ?>">Hoàn thành</a>
        <?php endif; ?>
    </div>
    <!-- * Navbar -->
    <div class="main-content px-2 py-3">
        <div class="row">
            <div class="col-lg-3">
                <div id="list-step" class="list-group list-group-flush rounded-bottom panel-body p-0 custom-scrollbar-css">
                    <?php foreach ($cates as $key => $cate) : ?>
                    <div class="card mb-2" id="cate-<?= $cate['cate_id']; ?>">
                        <div class="list-group-item d-flex border-top-0">
                            <div class="me-3 fs-16px"><i class="cate-ico fas fa-check-circle text-success fa-fw"></i></div>
                            <div class="flex-fill">
                                <div class="fs-14px lh-12 mb-2px fw-bold text-dark"><?= $cate['cate_name']; ?></div>
                                <div class="d-flex align-items-center mb-5px">
                                    <div class="fs-12px text-dark fw-bold d-none">
                                        Task (3/3)
                                    </div>
                                    <div class="progress progress-xs w-100px mb-0 mx-2 h-5px">
                                        <div class="progress-bar progress-bar-striped bg-success" style="width: 100%;"></div>
                                    </div>
                                    <div class="fs-10px fw-bold"><?= $cate['upf_process'] ?>%</div>
                                    <div class="ms-auto">
                                        <a href="#" class="btn btn-outline-default text-gray-600 btn-xs rounded-pill fs-10px px-2" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $cate['cate_id']; ?>" aria-expanded="false">
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="collapse <?= $cate['collapse'] ?>" id="collapse-<?= $cate['cate_id']; ?>" style="">
                                        <?php foreach ($cate['steps'] as $key => $step) : ?>
                                        <div class="cursor-pointer mb-1">
                                            <?php if($stepInfo['step_code'] == $step['step_code']) : ?>
                                                <a href="#" class="text-primary"><i class="fas fa-hand-point-right me-2"></i><?= $step['step_name'] ?></a>
                                            <?php else : ?>
                                                <a href="?c=courses&m=learn&code=<?= $userPackcode ?>&step=<?= $step['step_code'] ?>" class="text-secondary"><i class="fas fa-folder me-2"></i><?= $step['step_name'] ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <?php if($stepInfo['step_type'] == 1) : ?>
                        <div class="px-2 py-3">
                            <?= $stepInfo['step_content'] ?>
                        </div>
                    <?php else : ?>
                        <iframe src="<?= $stepInfo['step_content'] ?>" class="step-content" id="media-viewer"></iframe>
                    <?php endif; ?>
                    <!-- Image -->
                    <!-- PDF -->
                    <!-- Video -->
                    <!-- Content html -->
                </div>
            </div>
        </div>
    </div>

    <?php include_once("user/template/common/js.php"); ?>
</body>
</html>