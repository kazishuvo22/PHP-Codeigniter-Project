<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to First problem</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/design.css">
</head>
<body>

<div id="container">
	<h1>Welcome to First problem!</h1>
	<ul>
		<li>
			<a href="users/">User Home page</a>
		</li>
		<li>
			<a href="users/registration">Registration</a>
		</li>
		<li>
			<a href="users/login">Login</a>
		</li>
	</ul>
	<div>
	<?php
	$exeq = $this->db->get("users");
	$data = $exeq->result();
var_dump($data);
	?>
	</div>
</div>

</body>
</html>