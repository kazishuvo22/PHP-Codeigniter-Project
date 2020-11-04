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
		<form action="welcome_message.php" method="post">
		id: <input type="text" name="id" value="id"><br>
		<input type="submit" value="go">
		</form>

<?php
		$this->db->where('id=id');
// here we select every column of the table
	$q = $this->db->get('users');
	$data = $q->result_array();

	echo($data[0]['id']);
	echo "<br>";
	echo($data[0]['uname']);
	echo "<br>";
	echo($data[0]['email']);
	echo "<br>";
	echo($data[0]['cr']);
	echo "<br>";
	echo "Database connected Sucessfully";
	?>
	</div>
	
	</div>

</body>
</html>