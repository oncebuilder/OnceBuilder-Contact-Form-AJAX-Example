<?php
# SECURE -----------------
if(!$home) exit;

$_CONFIG['contact_mailme']='1';// 1 IF U USE EMIAL TO SEND
$_CONFIG['contact_mailbox']='0'; // 1 IF U WANT MAIL TO MAILBOX IN DB / REQUIRE PD AND WHOLE DRIVER WHICH IS INCLUDED IN OnceBuilder CMS
$_CONFIG['contact_debug']='0';
$_CONFIG['contact_host']='auth.smtp.host.com';
$_CONFIG['contact_username']='your user email';
$_CONFIG['contact_password']='yourpassword';
$_CONFIG['contact_from']='contact@oncebuilder.com';
$_CONFIG['contact_fromtitle']='OnceBuilder Contact Form';
$_CONFIG['contact_to']='contact@oncebuilder.com';
$_CONFIG['contact_totitle']='OnceBuilder Support';

$_CONFIG['recaptcha_contact'] = 0; // 1 IF U WANT INCLUDE CAPTCHA
$_CONFIG['recaptcha_sitekey'] = 'your recaptcha_sitekey';
$_CONFIG['recaptcha_secret'] = 'your recaptcha_secret';

?>