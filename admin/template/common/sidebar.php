<div id="sidebar" class="app-sidebar" data-bs-theme="dark">
  <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
    <div class="menu">
      <div class="menu-profile p-0">
        <!-- Digital Clock HTML -->
          <div id="clockdate">
          <div class="clockdate-wrapper">
            <div id="date"></div>
            <table id="sidebar-clock">
              <tr>
                <td>0</td>
                <td>1</td>
                <td>:</td>
                <td>0</td>
                <td>0</td>
                <td>:</td>
                <td>0</td>
                <td>0</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- End Digital Clock HTML -->
      </div>
      <div id="appSidebarProfileMenu" class="collapse">
        <div class="menu-item pt-5px">
          <a href="javascript:;" class="menu-link">
            <div class="menu-icon"><i class="fa fa-cog"></i></div>
            <div class="menu-text">Settings</div>
          </a>
        </div>
        <div class="menu-item">
          <a href="javascript:;" class="menu-link">
            <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
            <div class="menu-text">Send Feedback</div>
          </a>
        </div>
        <div class="menu-item pb-5px">
          <a href="javascript:;" class="menu-link">
            <div class="menu-icon">
              <i class="fa fa-question-circle"></i>
            </div>
            <div class="menu-text">Helps</div>
          </a>
        </div>
        <div class="menu-divider m-0"></div>
      </div>
      <div class="menu-header">Main menu</div>

      <!-- Home -->
      <div class="menu-item">
        <a href="../" class="menu-link">
          <div class="menu-icon">
            <i class="fa fa-home"></i>
          </div>
          <div class="menu-text">
            Trang chủ
          </div>
        </a>
      </div>
      <!-- * Home -->
      
      <!-- User Management -->
      <div class="menu-item has-sub">
        <a href="javascript:;" class="menu-link">
          <div class="menu-icon"><i class="fa fa-user-friends"></i></div>
          <div class="menu-text">Quản lý tài khoản</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item"><a href="?c=user&m=list" class="menu-link"><div class="menu-text">Danh sách</div></a></div>
          <div class="menu-item"><a href="?c=user&m=goAdd" class="menu-link"><div class="menu-text">Thêm mới</div></a></div>
        </div>
      </div>
      <!-- * User Management -->
      
      <!-- Form Management -->
      <div class="menu-item has-sub">
        <a href="javascript:;" class="menu-link">
          <div class="menu-icon"><i class="fa fa-file-code"></i></div>
          <div class="menu-text">Quản lý bài giảng</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item has-sub closed">
            <a href="javascript:;" class="menu-link">
              <div class="menu-text">Nhóm</div>
              <div class="menu-caret"></div>
            </a>
            <div class="menu-submenu" style="box-sizing: border-box; display: none;">
              <div class="menu-item">
                <a href="?c=formGroup&m=list" class="menu-link">
                  <div class="menu-text">Danh sách</div>
                </a>
              </div>
              <div class="menu-item">
                <a href="?c=formGroup&m=goAdd" class="menu-link">
                  <div class="menu-text">Thêm mới</div>
                </a>
              </div>
            </div>
          </div>
          <div class="menu-item"><a href="?c=formInfo&m=list" class="menu-link"><div class="menu-text">Danh sách</div></a></div>
          <div class="menu-item"><a href="?c=formInfo&m=goAdd" class="menu-link"><div class="menu-text">Thêm mới</div></a></div>
        </div>
      </div>
      <!-- * Form Management -->

      <!-- Pack Management -->
      <div class="menu-item has-sub">
        <a href="javascript:;" class="menu-link">
          <div class="menu-icon"><i class="fa fa-toolbox"></i></div>
          <div class="menu-text">Quản lý khóa học</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item"><a href="?c=packInfo&m=list" class="menu-link"><div class="menu-text">Danh sách</div></a></div>
          <div class="menu-item"><a href="?c=packInfo&m=goAdd" class="menu-link"><div class="menu-text">Thêm mới</div></a></div>
        </div>
      </div>
      <!-- * Pack Management -->

      <!-- Order Management -->
      <div class="menu-item has-sub">
        <a href="javascript:;" class="menu-link">
          <div class="menu-icon"><i class="fa fa-shopping-cart"></i></div>
          <div class="menu-text">Quản lý đơn hàng</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item"><a href="?c=order&m=list" class="menu-link"><div class="menu-text">Danh sách</div></a></div>
        </div>
      </div>
      <!-- * Order Management -->

      <!-- Post Management -->
      <div class="menu-item has-sub">
        <a href="javascript:;" class="menu-link">
          <div class="menu-icon"><i class="fa fa-shopping-cart"></i></div>
          <div class="menu-text">Quản lý nội dung</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item"><a href="?c=post&m=list" class="menu-link"><div class="menu-text">Danh sách</div></a></div>
          <div class="menu-item"><a href="?c=post&m=goAdd" class="menu-link"><div class="menu-text">Thêm mới</div></a></div>
        </div>
      </div>
      <!-- * Post Management -->

      <div class="menu-item d-flex">
        <a href="javascript:;" class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none" data-toggle="app-sidebar-minify" ><i class="fa fa-angle-double-left"></i></a>
      </div>
      
    </div>
  </div>
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop">
  <a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
</div>