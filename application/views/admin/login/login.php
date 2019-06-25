<!DOCTYPE html>
<html>
<head>

  <title>Login</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
 <script type="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
 
 <?php 

  if($this->session->userdata('email'))
  {
    
    redirect('admin/login/dashboard');
  }

  ?>

  <style type="text/css">
  	
  	.error
  	{
  		color:red;

  	}

  </style>

</head>

	<body style="margin-left:5%;">

<?php 

  if($login_err = $this->session->flashdata('login_err'))
  {
?>      
       <h5 style="color:red;"> <?php echo $login_err; ?></h5>

<?php
  }


 ?>
		<form action="<?php echo site_url('admin/login/login');?>"  method="post" id="form_validate">
			<label>Login</label>


			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="input-group" autocomplete="off"
				placeholder="Enter Email Id Here" value="<?php if (get_cookie('email')) { echo get_cookie('email'); } ?>">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="input-group" autocomplete="off"
				placeholder="Enter Password Here" value="<?php if (get_cookie('password')) { echo get_cookie('password'); } ?>">
			</div>

					<div class="row">
									<div class="col-sm-2">
										<label>
											<input type="checkbox" name="remembar" <?php if (get_cookie('email')) { ?> checked="checked" <?php } ?>> Remember Me?
										</label>
									</div>

									<div class="col-sm-2">
										<a href="<?php echo base_url()?>admin/login/forgot_password">Forgot Password?</a>
									</div>
								</div>

			<button type="submit" id="submit" name="register" class="btn btn-primary">Login</button>
      <br>
      New User? Create Account From Here: <a href="<?php echo site_url('admin/login/register');?>">Register</a>
		</form>

	</body>
</html>
<script type="text/javascript">


$(document).ready(function() 
{
    $("#form_validate").validate({

        // for check form validations
        rules: 
        {

            email:{
            	required: true,
            	email 	: true
            },
            password:
            {
            	required:true,

            }

        },

        // for display error message
        messages: 
        {            

           email:{
           	   required : "<i class='fa fa-window-close'></i> Please Enter Your Email Id.",
           	   email    : "<i class='fa fa-window-close'></i> Please Enter Valid Email Address"
           },

           password:
           {
           	   required : "<i class='fa fa-window-close'></i> Please Enter Password.",
           	   minlength: "<i class='fa fa-window-close'></i> Minimum Length of Password Should be 10 Characters."
           }

        }
    });
});

</script>