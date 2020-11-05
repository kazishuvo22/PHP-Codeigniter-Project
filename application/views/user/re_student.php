
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Registration</title>

<div id="container">
	<h1>Registration page for Students</h1>

	
	
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Fill the field below and complete your register</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('users/register_user'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter UserName" name="uname" type="text" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Full Name" name="name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter E-mail" name="email" type="text" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password" name="md5_pw" type="password" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Confirm Password" name="valid" type="password" value="">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Student ID" name="studentid" type="text" value="">
                              </div>

                              <div class="form-group">
                                  <b>Gender</b>
                                  <input type="radio" name="gender" value="male"> Male 
                                  <input type="radio" name="gender" value="female"> Female<br>
                              </div>

                              <div class="form-group">
                              <b>Date</b>
                              <input type="date" name="cdate" value="<?php echo date("Y-m-d"); ?>">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url('users/login'); ?>"> Please Login</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>