<?php $this->session->userdata('akses')=='3'?>	
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="dashboardteknisi" class="m-brand__logo-wrapper">
									<img alt="" src="<?php echo base_url(); ?>/assets/assets/demo/default/media/img/logo/logoposs.png"/>
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
					">
									<span></span>
								</a>
								<!-- END -->
						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
						<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
		<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >                
						<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
						<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
							<!--<span class="m-menu__link-text">-->
								<h3 class="font-weight-bold text-capitalize">
									SISTEM TEKNISI AMNOTEL
								</h3>
								<!--<span style="color: #000!important">Login Sebagai Admin</span>-->
							<!--</span>-->
						</li>
					</ul>
						</div>
					<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
							<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<img src="<?php if($this->session->userdata['image']==""){echo base_url('assets/img/teknisi/images.jpg');}else{echo base_url('assets/img/teknisi/'.$this->session->userdata['image']);}?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
											</span>
											
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url(); ?>/assets/assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
													<div class="m-card-user m-card-user--skin-dark">
														<div class="m-card-user__pic">
															<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">
																<?php echo  $this->session->userdata['full_name']; ?>
															</span>
															<!--<a href="" class="m-card-user__email m--font-weight-300 m-link">
																mark.andre@gmail.com
															</a>-->
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">
																	Section
																</span>
															</li>
															<li class="m-nav__item">
																<a href="<?php echo base_url('editprofilteknisi/edit/'.$this->session->userdata['id_petugas']) ?>" name="edit" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">
																				My Profile
																			</span>																				
																		</span>
																	</span>
																</a>
															</li>																																																															
															<li class="m-nav__separator m-nav__separator--fit"></li>
															<li class="m-nav__item">
																<a href="<?php echo site_url('login/logout')?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																	Logout
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
								<!--<form class="navbar-form navbar-right" role="search" method="post">
									<div class="input-group custom-search-form">
									<input type="text" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
									<button class="btn btn-default" type="button">
										<i class="fa fa-search"></i>
									</button>
									</span>
									</div>                    
								</form>-->
																	
													</div>
												</div>
											</div>
										</div>
									</li>
									<!--<li id="m_quick_sidebar_toggle" class="m-nav__item">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-nav__link-icon">
												<i class="flaticon-grid-menu"></i>
											</span>
										</a>
									</li>-->
								</ul>
							</div>
						</div>
						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>
		<!-- END: Header -->		
	<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
				<!-- BEGIN: Aside Menu -->
<div 
	id="m_ver_menu" 
	class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
	data-menu-vertical="true"
		data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
	>
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover" >
							<a  href="dashboardteknisi" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-line-graph"></i>
								<span class="m-menu__link-text">
											Dashboard
								</span>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >											
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Dashboard
											</span>
										</span>
										</a>
									</li>
								</ul>
							</div>
						</li>                            
						
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a  href="transaksiteknisi" class="m-menu__link">
								<i class="m-menu__link-icon fa fa-wrench fa-fw"></i>
								<span class="m-menu__link-text">
									Transaksi Service
								</span>
								<!--<i class="m-menu__ver-arrow la la-angle-right"></i>-->
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >											
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Transaksi Service
											</span>
										</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a  href="transaksiteknisiselesai" class="m-menu__link">
								<i class="m-menu__link-icon fa fa-check-square fa-fw"></i>
								<span class="m-menu__link-text">
									Transaksi Service Selesai
								</span>
								<!--<i class="m-menu__ver-arrow la la-angle-right"></i>-->
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >											
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Transaksi Service Selesai
											</span>
										</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a  href="<?php echo base_url('login/logout') ?>" class="m-menu__link">
								<i class="m-menu__link-icon fa fa-power-off fa-fw"></i>
								<span class="m-menu__link-text">
									Logout
								</span>
								<!--<i class="m-menu__ver-arrow la la-angle-right"></i>-->
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >											
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Logout
											</span>
										</span>
										</a>
									</li>
								</ul>
							</div>
						</li>										
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<?php //$this->load->view($container);?>
				<div class="m-content">						                    										
	
	<!-- begin::Quick Nav -->	
	<!--begin::Base Scripts -->
	<script src="<?php echo base_url(); ?>/assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Base Scripts -->   
	<!--begin::Page Vendors -->
	<script src="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
	<!--end::Page Vendors -->  
	<!--begin::Page Snippets -->
	<script src="<?php echo base_url(); ?>/assets/assets/app/js/dashboard.js" type="text/javascript"></script>
	<!--end::Page Snippets -->

