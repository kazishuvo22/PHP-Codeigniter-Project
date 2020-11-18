<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>VIS problem homepage</title>
</head>
<body>
	<div class="container">
    <div class="jumbotron">
        <div id="container">
	<h1>Welcome to VIS problem!</h1>
	<ul>
		<li>
			<a href="users/index">User Home page</a>
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
// here we select every column of the table
	$data = '';
		$p = $this->db->get('user');
		$q = $this->db->get('userdetail');
		if($q && $p)
		{
			$data = $q->result_array();


		/*echo($data[0]['id']);
		echo "<br>";
		echo($data[0]['uname']);
		echo "<br>";
		echo($data[0]['address']);		
		echo "<br>";*/
		
		echo "Database connected Sucessfully";
		echo " ";
		echo time();

		}
		
		?>


	</div>
	
	</div>
</div></div>





</body>
</html>

