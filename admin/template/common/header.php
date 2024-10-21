<?php if(isset($_SESSION[DataUtils::SESSION_MESSAGE])) : ?>
<script>
  alert("<?= $_SESSION[DataUtils::SESSION_MESSAGE]; ?>");
  <?php unset($_SESSION[DataUtils::SESSION_MESSAGE]); ?>
</script>
<?php endif; ?>
<div id="header" class="app-header">
  <div class="navbar-header">
    <a href="${_ctx}/" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1">Quản trị hệ thống</b></a>
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
        <i class="fa fa-bell"></i>
        <c:if test="${notifies.getContent().size() > 0}">
          <!-- Enable sound -->
          <span class="badge">5</span>
        </c:if>
      </a>
      <div class="dropdown-menu media-list dropdown-menu-end">
        <div class="dropdown-header">NOTIFICATIONS <c:if test="${notifies.getContent().size() > 0}">(10)</c:if></div>
          <a href="javascript:;" class="dropdown-item media">
            <div class="media-left">
              <i class="fa fa-bug media-object bg-gray-500"></i>
            </div>
            <div class="media-body">
              <h6 class="media-heading">${title} <i class="fa fa-exclamation-circle text-danger"></i></h6>
              <p>${content}</p>
              <div class="text-muted fs-10px">${createdDate}</div>
            </div>
          </a>
        <div class="dropdown-footer text-center">
          <a href="${_ctx}/notify" class="text-decoration-none">Xem thêm</a>
        </div>
      </div>
    </div>
    <!-- * Navbar notify -->

    <div class="navbar-item navbar-user dropdown">
      <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
        <span>
          <span class="d-none d-md-inline">${fullName}</span>
          <b class="caret"></b>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end me-1">
        <a href="${_ctx}/auth/logout" class="dropdown-item">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>