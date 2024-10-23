<!DOCTYPE html>
<html>
<?php include_once("template/common/head.php"); ?>
<?php include_once("template/common/css.php"); ?>
<body>

	<?php include_once("template/common/loader.php"); ?>

    <div id="app" class="app app-header-fixed app-sidebar-fixed app-sidebar-minified app-content-full-height">
		<?php include_once("template/common/header.php"); ?>
		<?php include_once("template/common/sidebar.php"); ?>

		<!-- Content -->
		<div id="content" class="app-content p-0">
			<div class="messenger" id="messenger">
				<div class="messenger-chat">
					<div class="messenger-chat-header d-flex">
						<div class="flex-1 position-relative">
							<input type="text" class="form-control border-0 bg-light ps-30px" placeholder="Search">
							<i class="fa fa-search position-absolute start-0 top-0 h-100 ps-2 ms-3px d-flex align-items-center justify-content-center"></i>
						</div>
						<div class="ps-2">
							<a href="#" class="btn border-0 bg-light shadow-none">
							<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="messenger-chat-body">
						<div data-scrollbar="true" data-height="100%" class="ps ps--active-y" style="height: 100%;">
							<div class="messenger-chat-list">
								<div class="messenger-chat-item">
									<a href="javascript:;" class="messenger-chat-link" data-toggle-class="messenger-chat-content-mobile-toggled" data-target="#messenger">
										<div class="messenger-chat-media">
											<img alt="" src="assets/img/user/user-1.jpg">
										</div>
										<div class="messenger-chat-content">
											<div class="messenger-chat-title">
												<div>Daniel</div>
												<div class="messenger-chat-time">09:15 AM</div>
											</div>
											<div class="messenger-chat-desc"> Hey, how was your weekend?</div>
										</div>
									</a>
								</div>
								<div class="messenger-chat-item active">
									<a href="javascript:;" class="messenger-chat-link" data-toggle-class="messenger-chat-content-mobile-toggled" data-target="#messenger">
										<div class="messenger-chat-media flex-wrap overflow-hidden">
											<img alt="" src="assets/img/user/user-1.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-2.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-3.jpg" width="14" class="rounded-0 me-0px mb-1px">
											<img alt="" src="assets/img/user/user-4.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-5.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-6.jpg" width="14" class="rounded-0 me-0px mb-1px">
											<img alt="" src="assets/img/user/user-7.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-8.jpg" width="14" class="rounded-0 me-1px mb-1px">
											<img alt="" src="assets/img/user/user-9.jpg" width="14" class="rounded-0 me-0px mb-1px">
										</div>
										<div class="messenger-chat-content">
											<div class="messenger-chat-title">
												<div>Company Discussion Group (9)</div>
												<div class="messenger-chat-time">10:30 AM</div>
											</div>
											<div class="messenger-chat-desc">Me: We need to prepare the project report by Friday. </div>
										</div>
									</a>
								</div>
								<div class="messenger-chat-item">
									<a href="javascript:;" class="messenger-chat-link" data-toggle-class="messenger-chat-content-mobile-toggled" data-target="#messenger">
										<div class="messenger-chat-media bg-lime-900 text-lime">
											<iconify-icon icon="solar:book-bold-duotone"></iconify-icon>
										</div>
										<div class="messenger-chat-content">
											<div class="messenger-chat-title">
												<div>Online Course (12)</div>
												<div class="messenger-chat-time">11:45 AM</div>
											</div>
											<div class="messenger-chat-desc">Emily: Let's meet at the library at 1 PM to study. </div>
										</div>
									</a>
								</div>
							</div>
							<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
								<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
							</div>
							<div class="ps__rail-y" style="top: 0px; right: 0px; height: 692px;">
								<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 647px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="messenger-content">
					<div class="widget-chat">
						<div class="widget-chat-header">
							<div class="d-block d-lg-none">
								<button type="button" class="btn border-0 shadow-none" data-toggle-class="messenger-chat-content-mobile-toggled" data-target="#messenger">
								<i class="fa fa-chevron-left fa-lg"></i>
								</button>
							</div>
							<div class="widget-chat-header-content">
								<div class="fs-5 fw-bold">Company Discussion Group (9)</div>
							</div>
						</div>
						<div class="widget-chat-body ps ps--active-y" data-scrollbar="true" data-height="100%" style="height: 100%;">
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Good morning, team! Just a reminder, we need to prepare the project report by Friday. Let's stay on track and meet our deadlines. </div>
										<div class="widget-chat-time">08:45AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-1.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-blue">Daniel</div>
										<div class="widget-chat-message"> Morning! I'm on it and will start compiling the data today. </div>
										<div class="widget-chat-time">09:02AM</div>
									</div>
								</div>
							</div>
							
							<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
								<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
							</div>
							<div class="ps__rail-y" style="top: 0px; height: 811px; right: 0px;">
								<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 354px;"></div>
							</div>
						</div>
						<div class="widget-chat-input">
							<textarea class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Content -->
    </div>

	<?php include_once("template/common/js.php"); ?>
</body>
</html>
