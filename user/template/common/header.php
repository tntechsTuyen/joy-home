<script>
    const test = "<?= $_SESSION[DataUtils::SESSION_MESSAGE] ?>";
</script>
<?php if(isset($_SESSION[DataUtils::SESSION_MESSAGE])) : ?>
<script>
  alert("<?= $_SESSION[DataUtils::SESSION_MESSAGE]; ?>");
  <?php unset($_SESSION[DataUtils::SESSION_MESSAGE]); ?>
</script>
<?php endif; ?>
<!-- Navbar -->
<div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Hà Nội, Việt Nam</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">joyhome@site.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                <a href="#" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-secondary"></i></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-2">
            <a href="?m=home" class="navbar-brand"><img src="user/asset/img/logo3.png" height="70px"></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto text-center">
                    <a href="?m=index" class="nav-item nav-link active">Trang chủ</a>
                    <a href="?m=about" class="nav-item nav-link">Về tôi</a>
                    <a href="?m=terms" class="nav-item nav-link">Điều khoản</a>
                    <a href="?m=policy" class="nav-item nav-link">Chính sách</a>
                    <a href="?m=courses" class="nav-item nav-link">Khóa học</a>
                    <a href="?m=contact" class="nav-item nav-link">Liên hệ</a>
                    <?php if(isset($_SESSION[DataUtils::SESSION_LOGIN])) : ?>
                    <a href="?m=profile" class="nav-item nav-link">Hồ sơ</a>
                    <?php else : ?>
                    <a href="?c=auth&m=login" class="nav-item nav-link">Đăng nhập</a>
                    <?php endif; ?>
                </div>
                <div class="d-flex me-4">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                        <a href="#" class="position-relative wow tada" data-wow-delay=".9s" >
                            <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-3 border-end border-primary">
                        <span class="text-primary">Hỗ trợ giải đáp</span>
                        <a href="#"><span class="text-secondary">SĐT: + 0123 456 7890</span></a>
                    </div>
                </div>
                <button class="btn-search btn btn-primary btn-md-square rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-white"></i></button>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <p class="m-0 p-0 text-center text-secondary fst-italic">Hãy gạt bỏ sự choáng ngợp và bắt đầu hành trình nhanh chóng đạt được mục tiêu học tại nhà của bạn dễ dàng và nhanh hơn với lộ trình đã được chứng minh - Montessori From The Heart ™.</p>
        </div>
    </div>
</div>
<!-- * Navbar -->

<!-- Modal Search -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="Nhập từ khóa mà bạn muốn tìm kiếm" aria-describedby="search-icon-1">
                    <button id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Modal Search -->