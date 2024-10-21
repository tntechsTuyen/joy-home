<?php include_once("user/template/common/head.php"); ?>
<?php include_once("user/template/common/css.php"); ?>
<body>

    <?php include_once("user/template/common/loader.php"); ?>
    <?php include_once("user/template/common/header.php"); ?>

    <!-- Main content -->
    <!-- About 1 -->
    <div class="container-fluid py-5 bg-default bg-light">
        <div class="container py-2">
            <div class="row g-5">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.3s">
                    <div class="card px-4 py-2">
                        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                            <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Khóa học</h4>
                        </div>
                        <div class="mb-3 mt-2">
                            <img src="<?= $packInfo['thumb_url']; ?>" class="w-100"/>    
                        </div>
                        <div class="mb-3">
                            <label for="ip-code" class="form-label">Mã khóa học</label>
                            <input type="text" class="form-control" id="ip-code" value="<?= $packInfo['code']; ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="ip-name" class="form-label">Tên khóa học</label>
                            <input type="text" class="form-control" id="ip-name" value="<?= $packInfo['name']; ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="ip-description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="ip-description" readonly disabled><?= $packInfo['description']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ip-price" class="form-label">Giá</label>
                            <input type="text" class="form-control" id="ip-price" value="<?= number_format($packInfo['price']); ?> VNĐ" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card px-4 py-2">
                                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                                    <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Khách hàng</h4>
                                </div>
                                <div class="mb-3">
                                    <label for="ip-full-name" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="ip-full-name" value="<?= $userInfo['full_name']; ?>" readonly disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="ip-phone" class="form-label">SĐT</label>
                                    <input type="text" class="form-control" id="ip-phone" value="<?= $userInfo['phone']; ?>" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="card px-4 py-2">
                                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                                    <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Thanh toán</h4>
                                </div>
                                <canvas id="qr-code-1"></canvas>
                            </div>
                        </div>
                        <?php if($orderInfo['id_status'] == 15) : ?>
                        <div class="col-lg-12 mt-2">
                            <a class="btn btn-primary w-100" href="?c=order&m=doPayment&code=<?= $packInfo['code']; ?>"><i class="fas fa-check-circle me-2"></i>Hoàn thành</a>
                            <a class="btn btn-secondary w-100 mt-1" href="?c=order&m=doCancel&code=<?= $packInfo['code']; ?>"><i class="fas fa-times-circle me-2"></i>Hủy</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * About 1 -->
    <!-- * Main content -->
    <?php include_once("user/template/common/footer.php"); ?>
    <?php include_once("user/template/common/js.php"); ?>
    <script src="user/asset/plugin/qrious/dist/qrious.js"></script>
    <script>
        generateQRCode("qr-code-1", "1111111111111111111111111111");
        function generateQRCode(idView, valueQr) {
            var qr = new QRious({
                element: document.getElementById(idView),
                value: valueQr,
                background: '#ffffff00', // background color
                foreground: 'black', // foreground color
                backgroundAlpha: 1,
                foregroundAlpha: 1,
                level: 'L', // Error correction level of the QR code (L, M, Q, H)
                mime: 'image/png', // MIME type used to render the image for the QR code
                size: 250, // Size of the QR code in pixels.
                padding: null // padding in pixels
            });
        }
    </script>
</body>
</html>