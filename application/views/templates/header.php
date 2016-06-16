<!DOCTYPE HTML>
<html>
	<head>
		<title><?php if($page_title)echo $basic_title." | ".$page_title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/flexslider.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/jBox.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/ModalBorder.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/NoticeBorder.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/TooltipBorder.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/TooltipDark.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>


		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="<?php echo base_url();?>">Freelancer simple blog</a></h1>
						<nav class="links">
							<ul>
							<?php foreach ($this->data['main_menu'] as $menu) :?>
								<li><a href="<?php echo base_url();?><?php echo $menu['link']; ?>"><?php echo $menu['name']; ?></a></li>
							<?php endforeach;?>
								<li><a href="<?php echo base_url();?>home/show_contact">Contact</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="<?php echo base_url();?>home/search">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">
							<?php if($this->session->userdata('username')) :?>
							<section>
								<a href="#" class="author"><span class="name"><?php echo $this->session->userdata['username']; ?></span><img src="<?php echo base_url();?><?php echo $this->session->userdata('picture'); ?>" alt="" /></a>
							</section>
							<?php endif?>
							<?php if($this->session->userdata('role') == 'admin') : ?>	
							<section>
								<ul class="actions vertical">
									<li><a id="modal_trigger" href="<?php echo base_url();?>admin/admin_post"  class="button big fit">Admin Panel</a></li>
								</ul>
							</section>
							<?php endif; ?>
						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
								<?php foreach ($this->data['main_menu'] as $menu) :?>
									<li>
										<a href="<?php echo base_url();?><?php echo $menu['link']; ?>">
											<h3><?php echo $menu['name']; ?></h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									<?php endforeach;?>
								</ul>
							</section>

						<!-- Actions -->
						<?php  if(isset($ulogovan) && !$ulogovan): ?>
							<section>
								<ul class="actions vertical">
									<li><a id="modal_trigger" href="#modal"  class="button big fit">Log In</a></li>
								</ul>
							</section>
						<?php endif;?>
						<?php  if(isset($ulogovan) && $ulogovan): ?>
							<section>
								<ul class="actions vertical">
									<li><a id="logout" href="<?php print base_url(); ?>Login/logout" data-confirm="Do you really want to logout from this site?" class="button big fit">Log Out</a></li>
								</ul>
							</section>
						<?php endif;?>



					</section>
					<?php if(isset($ulogovan) && !$ulogovan): ?>
					<div id="modal" class="popupContainer" style="display:none;">
						<header class="popupHeader">
							<span class="header_title">Login</span>
							<span class="modal_close"><i class="fa fa-times"></i></span>
						</header>
		
						<section class="popupBody">
						
						<!-- Social Login -->
						<div class="social_login">
							<div class="">
								<a href="#" class="social_box fb">
									<span class="icon"><i class="fa fa-facebook"></i></span>
									<span class="icon_title">Connect with Facebook</span>
								</a>
								<a href="#" class="social_box google">
									<span class="icon"><i class="fa fa-google-plus"></i></span>
									<span class="icon_title">Connect with Google</span>
								</a>
							</div>

							<div class="centeredText">
								<span>Or use your Email address</span>
							</div>
							<div class="action_btns">
								<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
								<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
							</div>
						</div>

						<!-- Username & Password Login form -->
						<div class="user_login">
							<form action="<?php print base_url(); ?>Login/login" method="Post">
								<label>Email / Username</label>
								<input type="text" name="username" value="<?php echo set_value('username'); ?>" />
								<br />
								<label>Password</label>
								<input type="password" name="password" value="<?php echo set_value('password'); ?>" />
								<br />
								<div class="checkbox">
									<input id="remember" type="checkbox" name="chbRemember" />
									<label for="remember">Remember me on this computer</label>
								</div>
								<input type="hidden" value="<?php echo uri_string();?>" name="tbUrl"/>
								<div class="action_btns">
									<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
									<div class="one_half last"><button type="submit" class="btn btn_green">Login</button></div>
								</div>
							</form>

						<a href="#" class="forgot_password">Forgot password?</a>
						</div>

						<!-- Register Form -->
						<div class="user_register">
							<form name="RegisterForm" action="<?php print base_url(); ?>Login/register" method="Post" enctype="multipart/form-data">
								<label>Username</label>
								<input type="text" id="tbName" name="tbName" />
								<br />
								<label>Email Address</label>
								<input type="email" id="tbEmail" name="tbEmail" />
								<br />
								<label>Password</label>
								<input type="password" id="tbPassword" name="tbPassword" />
								<br />
								<label>Upload Profile Picture</label>
								<input type="file"  id="tbPicture"  name="tbPicture" />
								<br/>
								<div class="checkbox">
									<input id="send_updates" type="checkbox" />
									<label for="send_updates">Send me occasional email updates</label>
								</div>

								<div class="action_btns">
									<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
									<div class="one_half last"><button id="register" type="submit" class="btn btn_green">Register</button></div>
								</div>
							</form>
						</div>
						</section>
					</div> <?php endif;?>