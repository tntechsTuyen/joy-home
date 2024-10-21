<%@ page language="java" contentType="text/html; charset=utf-8" pageEncoding="utf-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ include file="/WEB-INF/jsp/admin/common/tags.jsp" %>
<!DOCTYPE html>
<html>
<%@ include file="/WEB-INF/jsp/admin/common/head.jsp" %>
<%@ include file="/WEB-INF/jsp/admin/common/css.jsp" %>
<body>
	<%@ include file="/WEB-INF/jsp/admin/common/loader.jsp" %>

    <div id="app" class="app app-header-fixed app-sidebar-fixed">
    	<%@ include file="/WEB-INF/jsp/admin/common/header.jsp" %>
    	<%@ include file="/WEB-INF/jsp/admin/common/sidebar.jsp" %>

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
							<div class="">
								<button type="button" class="btn border-0 shadow-none" data-bs-toggle="dropdown">
								<i class="fa fa-ellipsis fa-lg"></i>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="#">Action</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">Another action</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">Something else here</a>
									</li>
								</ul>
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
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Thanks for the heads up! I'll make sure the design elements are ready for the report. </div>
										<div class="widget-chat-time">09:20AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Got it. I'll review the financial data and ensure all the numbers are accurate. </div>
										<div class="widget-chat-time">09:35AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Great! Let's have a progress check-in at 2 PM today to see how things are going. Keep up the good work, team! </div>
										<div class="widget-chat-time">10:10AM</div>
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
										<div class="widget-chat-message"> Sounds good! See you at the meeting. </div>
										<div class="widget-chat-time">10:30AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Looking forward to it. We'll have everything ready. </div>
										<div class="widget-chat-time">10:50AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Count me in. I'll be prepared with the financial figures. </div>
										<div class="widget-chat-time">11:15AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-orange"></div>
										<div class="widget-chat-message"> Excellent teamwork, everyone! We're making great progress. </div>
										<div class="widget-chat-time">11:45AM</div>
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
										<div class="widget-chat-message"> Thank you! It's a team effort. </div>
										<div class="widget-chat-time">12:20PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Absolutely, we've got a strong team. </div>
										<div class="widget-chat-time">01:05PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Agreed, we're all working towards the same goal. </div>
										<div class="widget-chat-time">02:00PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> That's the spirit! Let's keep the communication flowing. If you have any questions or face any challenges, don't hesitate to reach out. </div>
										<div class="widget-chat-time">02:45PM</div>
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
										<div class="widget-chat-message"> Will do, Manager. </div>
										<div class="widget-chat-time">03:10PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Understood, we'll collaborate closely. </div>
										<div class="widget-chat-time">03:35PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Thanks for the support, Manager. </div>
										<div class="widget-chat-time">04:00PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Alexander, can you also provide an update on the budget allocation? </div>
										<div class="widget-chat-time">04:25PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Sure, I'll get that information for you by the end of the day. </div>
										<div class="widget-chat-time">04:50PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Perfect. And Mark, how's the visual design coming along? </div>
										<div class="widget-chat-time">05:15PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> It's going smoothly. I'll share the mockups with you later today. </div>
										<div class="widget-chat-time">05:40PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Sounds great, Mark. Looking forward to it. </div>
										<div class="widget-chat-time">06:05PM</div>
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
										<div class="widget-chat-message"> Should we discuss the presentation format for the report? </div>
										<div class="widget-chat-time">06:30AM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Good point, Daniel. Let's have a quick discussion on that during the meeting today. </div>
										<div class="widget-chat-time">07:00PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> I'll make sure the financial data is presented in a clear and concise manner. </div>
										<div class="widget-chat-time">07:25PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Thank you, Alexander. That will be essential for our stakeholders. </div>
										<div class="widget-chat-time">07:50PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Do we have all the necessary data and information for the report? </div>
										<div class="widget-chat-time">08:15PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-4.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-blue">Daniel</div>
										<div class="widget-chat-message"> I've collected most of it, but I'm waiting on a few figures from the sales team. </div>
										<div class="widget-chat-time">08:40PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> I'll follow up with them to expedite the process. </div>
										<div class="widget-chat-time">09:05PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media end">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-13.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-message"> Great teamwork, everyone. Keep up the good work. Our client will be impressed! </div>
										<div class="widget-chat-time">09:30PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-4.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-blue">Daniel</div>
										<div class="widget-chat-message"> We won't disappoint! </div>
										<div class="widget-chat-time">09:55PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-2.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-indigo">Mark</div>
										<div class="widget-chat-message"> Let's make it a stellar report! </div>
										<div class="widget-chat-time">10:20PM</div>
									</div>
								</div>
							</div>
							<div class="widget-chat-item with-media start">
								<div class="widget-chat-media">
									<img alt="" src="../assets/img/user/user-3.jpg">
								</div>
								<div class="widget-chat-info">
									<div class="widget-chat-info-container">
										<div class="widget-chat-name text-red">Alexander</div>
										<div class="widget-chat-message"> Agreed, let's do our best! </div>
										<div class="widget-chat-time">10:45PM</div>
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
							<div class="widget-chat-toolbar">
								<a href="#" class="widget-chat-toolbar-link">
									<iconify-icon class="fs-26px" icon="solar:smile-circle-outline"></iconify-icon>
								</a>
								<a href="#" class="widget-chat-toolbar-link">
									<iconify-icon class="fs-26px" icon="solar:folder-with-files-outline"></iconify-icon>
								</a>
								<a href="#" class="widget-chat-toolbar-link">
									<iconify-icon class="fs-26px" icon="solar:scissors-square-outline"></iconify-icon>
								</a>
								<a href="#" class="widget-chat-toolbar-link">
									<iconify-icon class="fs-26px" icon="solar:chat-round-dots-outline"></iconify-icon>
								</a>
								<a href="#" class="widget-chat-toolbar-link ms-auto">
									<iconify-icon class="fs-26px" icon="solar:phone-calling-outline"></iconify-icon>
								</a>
								<a href="#" class="widget-chat-toolbar-link">
									<iconify-icon class="fs-26px" icon="solar:videocamera-record-outline"></iconify-icon>
								</a>
							</div>
							<textarea class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Content -->
    </div>
    <!-- * App -->
    <!-- Modal -->
    <div class="modal fade" id="modal-form-content-html">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Mô tả HTML</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body p-0 m-0">
					<textarea name="ip-content-html" id="ip-content-html" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Đóng</a>
					<a href="javascript:;" class="btn btn-success" data-bs-dismiss="modal">Lưu</a>
				</div>
			</div>
		</div>
	</div>
    <!-- * Modal -->
	<%@ include file="/WEB-INF/jsp/admin/common/js.jsp" %>
	<script>
		/*
		$(`[name="thumbFile"]`).change(function(){
			var file = $(this).prop("files")[0];
			image.render("#img-thumb", file);
			$(`#img-thumb`).removeClass("d-none")
		})
		*/
		$("#jstree-form-cate").jstree({
		    "plugins": ["types", "contextmenu"],
		    "core": {
		      	"themes": { "responsive": false  },
		      	'check_callback': true,
                'data': [
                    { "id": "1", "parent": "#", "text": "Root node 1" },
                    { "id": "2", "parent": "1", "text": "Child node 1" },
                    { "id": "3", "parent": "1", "text": "Child node 2" },
                    { "id": "4", "parent": "3", "text": "Child node 3" },
                    { "id": "5", "parent": "3", "text": "Child node 4" },
                ]
	      	},
		    "types": {
		      	"default": { "icon": "fa fa-folder text-warning fa-lg" },
		      	"file": { "icon": "fa fa-file text-dark fa-lg" }
		    },
		    "contextmenu": {
		    	"items": function(node){
		    		var tree = $("#jstree-form-cate").jstree(true);
		    		var subMenu = {
                        "add": {
                            label: "Thêm",
                            action: function() {
                                var newNode = tree.create_node(node, { id: -1, text: "New Node" });
                                tree.edit(newNode);
                            }
                        },
                        "edit": {
                            label: "Sửa",
                            action: function() {
                                tree.edit(node);
                            }
                        },
                        "delete": {
                            label: "Xóa",
                            action: function() {
                                if (confirm("Có phải bạn đang muốn xóa nó ?")) {
                                    tree.delete_node(node);
                                }
                            }
                        },
                        "debug": {
                            label: "Debug",
                            action: function() {
                                console.log(node);
                            }
                        }
                    };
                    if(node.parents.length == 1) subMenu['delete'] = null;
                    else if(node.parents.length == 3) subMenu['add'] = null;
                    else if(node.parents.length > 3) subMenu = null;
                    return subMenu;
		    	}
		    }
	  	})

        $('#jstree-form-cate').on('delete_node.jstree', function(e, data) {
            //delete
        });

        $('#jstree-form-cate').on('rename_node.jstree', function(e, data) {
        	if(data.id*1 === -1){
        		//insert
        	}else{
        		//update
        	}
        });

        $("#ip-content").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "400"
	  	});

        $("#modal-form-content-html [name='ip-content-html']").summernote({
		    placeholder: 'Hi, this is summernote. Please, write text here!',
		    height: "770"
	  	});
	</script>
</body>
</html>
