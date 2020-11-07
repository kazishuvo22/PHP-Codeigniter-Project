<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Registration</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/design.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


  </head>
  <body>
  	<div class="container">
    <div class="jumbotron">
    <div id="container">
  	<h2> Registration Page</h2>
		<li>
			<a href="re_student"><b>Registration for student</b></a>
		</li>
		<li>
			<a href="re_teacher"><b>Registration for teacher</b></a>
		</li>
	</div>
</div>
</div>
  </body>
</html>