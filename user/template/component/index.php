<?php include_once("user/template/common/head.php"); ?>
<?php include_once("user/template/common/css.php"); ?>
<body>

    <?php include_once("user/template/common/loader.php"); ?>
    <?php include_once("user/template/common/header.php"); ?>

    <!-- Main content -->
    <!-- Banner Start -->
    <div class="container-fluid hero-header wow fadeIn p-0" data-wow-delay="0.1s">
        <div class="position-relative">
            <div class="owl-carousel slide-one-item">
                <?php foreach ($banners as $key => $item) : ?>
                    <?php if($item['id_type'] != 6) continue; ?>
                    <div class="d-md-flex testimony-29101 align-items-stretch"><img src="<?= $item['content'] ?>" class="image"/></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- About 1 -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                        <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4 class="text-primary mb-5 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Về Joy-Home</h4>
                    <h1 class="text-dark mb-4"><b>Học viện Cha mẹ hàng đầu Việt Nam theo triết lý Montessori</b></h1>
                    <p class="text-dark mb-4"><i class="fas fa-hand-point-right me-2"></i>JoyHome tự hào là tổ chức đào tạo cha mẹ về lĩnh vực nuôi dạy con trong giai đoạn từ 0 - 6 tuổi chuyên nghiệp tại Việt Nam. Chúng tôi truyền tải nguyên bản triết lý của phương pháp giáo dục Montessori. Chúng tôi cung cấp những khóa học để cha mẹ hiểu triết lý và cách thực hành Montessori trong gia đình.</p>
                    <p class="text-dark mb-4"><i class="fas fa-hand-point-right me-2"></i>Những đứa trẻ được áp dụng Montessori trong gia đình sẽ tự do tìm tòi, sáng tạo và vui vẻ học tập từ đó làm dày thêm vốn sống, phát huy hết tiềm năng, giúp trẻ hình thành sự tự tin, sự tập trung, óc quan sát, sức sáng tạo và khả năng giao tiếp…tạo nền tảng vững chắc cho sự phát triển của trẻ.</p>
                    
                    <a href="#" class="btn btn-primary px-5 py-3 btn-border-radius">Chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="#" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * About 1 -->

    <!-- About 2 -->
    <div class="container-fluid testimonial bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius mb-5">Về Cô Loan Loan Nguyễn</h4>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                    <div class="p-4 position-relative">
                        <div class="d-flex align-items-center">
                            <div class="border border-primary bg-white rounded-circle">
                                <img src="user/asset/img/testimonial-2.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                            </div>
                            <div class="ms-4">
                                <h4 class="text-dark">Founder/CEO</h4>
                                <p class="m-0 pb-3">Loan Loan Nguyễn</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-primary mt-4 pt-3 h-300px">
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Cộng đồng Montessori trong gia đình Việt với hơn 160K thành viên là cha mẹ người Việt khắp nơi trên thế giới.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Học viện cha mẹ JoyHome</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                    <div class="p-4 position-relative">
                        <div class="d-flex align-items-center">
                            <div class="border border-primary bg-white rounded-circle">
                                <img src="user/asset/img/testimonial-2.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                            </div>
                            <div class="ms-4">
                                <h4 class="text-dark">Kinh nghiệm</h4>
                                <p class="m-0 pb-3">Loan Loan Nguyễn</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-primary mt-4 pt-3 h-300px">
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Kinh nghiệm 07 năm áp dụng và lan tỏa triết lý và thực hành phương pháp Montessori trong gia đình tới cộng đồng hơn 160k thành viên.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>03 năm kinh nghiệm giảng dạy theo phương pháp giáo dục Montessori tới các cha mẹ người Việt.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>650 giờ tư vấn 1:1 cho các cha mẹ có con trong giai đoạn từ 0-6 tuổi.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Tư vấn gần 1300 cha mẹ trên hành trình nuôi dạy con trong giai đoạn từ 0-6 tuổi.</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                    <div class="p-4 position-relative">
                        <div class="d-flex align-items-center">
                            <div class="border border-primary bg-white rounded-circle">
                                <img src="user/asset/img/testimonial-2.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                            </div>
                            <div class="ms-4">
                                <h4 class="text-dark">Học vấn</h4>
                                <p class="m-0 pb-3">Loan Loan Nguyễn</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-primary mt-4 pt-3 h-300px">
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Giáo viên Montessori AMS MACTE được cấp chứng nhận bởi Hiệp hội Montessori Hoa Kỳ, được đảm bảo bởi Macte - Đơn vị kiểm định chất lượng đào tạo giáo viên của bộ giáo dục Mỹ.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Hoàn thành khóa học Tâm lý và giáo dục trẻ em 3-6 tuổi do Viện Tâm lý Việt Phát tổ chức.</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                    <div class="p-4 position-relative">
                        <div class="d-flex align-items-center">
                            <div class="border border-primary bg-white rounded-circle">
                                <img src="user/asset/img/testimonial-2.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                            </div>
                            <div class="ms-4">
                                <h4 class="text-dark">Đào tạo</h4>
                                <p class="m-0 pb-3">Loan Loan Nguyễn</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-primary mt-4 pt-3 h-300px">
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Hướng dẫn cha mẹ về cách chăm sóc tôn trọng và phát triển trí lực cho trẻ.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Triết lý Montessori trong gia đình.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Hướng dẫn cha mẹ thực hành Montessori trong gia đình.</p>
                            <p class="mb-1"><i class="fas fa-hand-point-right me-2"></i>Cố vấn chuyên môn Montessori cho các trường/ giáo viên/ gia đình/ doanh nghiệp liên quan đến giáo dục trẻ em 0-6 tuổi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * About 2 -->

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
                            <button class="btn btn-secondary w-100">Đăng ký</button>
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
                
                <div class="d-inline-block text-center wow fadeIn" data-wow-delay="0.1s">
                    <a href="#" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Xem toàn bộ khóa học</a>
                </div>
            </div> 
        </div>
    </div>
    <!-- Pack End -->

    <!-- Team Start-->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius mb-5">Đội ngũ của chúng tôi</h4>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item border border-primary img-border-radius overflow-hidden">
                        <img src="user/asset/img/avatar1.webp" class="img-fluid w-100" alt="">
                        <div class="team-icon d-flex align-items-center justify-content-center">
                            <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fas fa-share-alt"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="team-content text-center py-3">
                            <h4 class="text-primary">Loan Loan Nguyễn</h4>
                            <p class="text-muted mb-2">Founder/CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item border border-primary img-border-radius overflow-hidden">
                        <img src="user/asset/img/avatar1.webp" class="img-fluid w-100" alt="">
                        <div class="team-icon d-flex align-items-center justify-content-center">
                            <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fas fa-share-alt"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="team-content text-center py-3">
                            <h4 class="text-primary">Loan Loan Nguyễn</h4>
                            <p class="text-muted mb-2">Giảng viên</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="team-item border border-primary img-border-radius overflow-hidden">
                        <img src="user/asset/img/avatar1.webp" class="img-fluid w-100" alt="">
                        <div class="team-icon d-flex align-items-center justify-content-center">
                            <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fas fa-share-alt"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="team-content text-center py-3">
                            <h4 class="text-primary">Loan Loan Nguyễn</h4>
                            <p class="text-muted mb-2">Giảng viên</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="team-item border border-primary img-border-radius overflow-hidden">
                        <img src="user/asset/img/avatar1.webp" class="img-fluid w-100" alt="">
                        <div class="team-icon d-flex align-items-center justify-content-center">
                            <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fas fa-share-alt"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="team-content text-center py-3">
                            <h4 class="text-primary">Loan Loan Nguyễn</h4>
                            <p class="text-muted mb-2">Trợ giảng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End-->
    <!-- * Main content -->
    <?php include_once("user/template/common/footer.php"); ?>
    <?php include_once("user/template/common/js.php"); ?>
</body>
</html>