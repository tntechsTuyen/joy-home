<?php if(isset($_SESSION[DataUtils::SESSION_MESSAGE])) : ?>
<script>
  alert("<?= $_SESSION[DataUtils::SESSION_MESSAGE]; ?>");
  <?php unset($_SESSION[DataUtils::SESSION_MESSAGE]); ?>
</script>
<?php endif; ?>
<div id="header" class="app-header">
  <div class="navbar-header">
    <a href="./" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1">Quản trị hệ thống</b></a>
    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <div class="navbar-nav">
    <!-- Navbar notify -->
    <div class="navbar-item dropdown">
      <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon" aria-expanded="false">
        <i class="fas fa-message"></i>
          <!-- Enable sound -->
          <span class="badge">5</span>
      </a>
    </div>
    <!-- * Navbar notify -->

    <div class="navbar-item navbar-user dropdown">
      <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
        <span>
          <span class="d-none d-md-inline"></span>
          <b class="caret"></b>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end me-1">
        <a href="../?c=auth&m=logout" class="dropdown-item">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>