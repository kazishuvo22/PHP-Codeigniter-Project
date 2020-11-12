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
			<a href="index">User Home page</a>
		</li>
		<li>
			<a href="registration">Registration</a>
		</li>
		<li>
			<a href="login">Login</a>
		</li>
	</ul>
	
	</div>
</div></div>
<script>
                        $(document).ready(function() {
                          var start = new Date();

                          $window.unload(function() {
                              var end = new Date();
                              $.ajax({ 
                                url: current_url(),
                                data: {'timeSpent': end - start},
                                async: false
                              })
                           });
                        });


                        </script>



</body>
</html>

