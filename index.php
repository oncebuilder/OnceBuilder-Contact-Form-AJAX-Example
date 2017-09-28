<?php

// Report simple running errors except notices
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$home=true;

# XAMPP fix without turning error info off -------------------
$_GET['route'] = isset($_GET['route']) ? $_GET['route'] : '';

# CONFIG -----------------
require_once('oconfig.php');

# CLASS -------------------
require_once('once/class/core.class.php');
$once=new core($_CONFIG);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta content="<?php echo $once->once_csrf_token(); ?>" name="csrf_token">

		<!-- Latest compiled and minified global styles from layers -->
		<link rel="stylesheet" href="/css/global.css" type="text/css">
		
		<!-- Latest compiled and minified styles from layers -->
		<link rel="stylesheet" href="/css/style.css" type="text/css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div id="body">
			<div id="footer-contact" class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="overview">
								<h2>Contact us</h2>
								<div class="fluid">
									<span class="nub"></span>
								</div>
								<p class="lead">Feel free to ask us anything, we enjoy helping.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<form id="contactForm" method="post" action="/once/ajax.php?c=contact&o=send_message" class="col-md-6 col-md-offset-3" data-require="/once/js/once.contact.js" >
							<div class="container message-error">
								<p>There are serious errors in your form submission, please see below for details.</p>
								<ol></ol>
							</div>
							<div class="form-group col-md-12 message-sent">
								<h6 class="sent">Your message has been sent. Thank you! We usually answer in 24hours.</h6>
							</div>
							<div class="form-group col-md-6">
								<input title="Please write your name." type="text" class="form-control" name="name" placeholder="Name" required minlength="3">
							</div>
							<div class="form-group col-md-6">
								<input title="Please write your e-mail." type="email" class="form-control" name="email" placeholder="E-mail" required minlength="3">
							</div>
							<div class="form-group col-md-12">
								<textarea title="Please write your message!" class="form-control" name="message" rows="10" cols="7" placeholder="Message" pattern="^\d{5,}$" required minlength="3"></textarea>
							</div>
							<?php 
							if($_CONFIG['recaptcha']==true){
								echo '<div class="g-recaptcha" data-sitekey="'.$_CONFIG['recaptcha_sitekey'].'"></div>';
								echo '<script type="text/javascript"  src="https://www.google.com/recaptcha/api.js?hl=en"></script>';
							}
							?>
							<div class="form-group col-md-12">
								<input class="btn btn-default" type="submit" value="Send Message">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Latest compiled and minified jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
		<!-- Latest compiled and minified modernizr -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

        <!-- Latest compiled and minified once -->
		<script type="text/javascript" src="/once/js/once.js"></script>
	</body>
</html>