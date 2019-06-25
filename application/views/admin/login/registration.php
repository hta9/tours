<!DOCTYPE html>
<html>
<head>

  <title>Registraion</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClQ_Y_F3mJtS_6rpylRvn-8cREsaae29E&libraries=places&callback=initAutocomplete" -->
        <!-- async defer></script> -->
   

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
 <script type="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
 

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/password-score.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/password-score-options.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/bootstrap-strength-meter.js"></script>


<script src="<?php echo base_url(); ?>assets/js/my_validations.js"></script> 

  <style type="text/css">

  	.error
  	{
  		color:red;

  	}

</style>

</head>

<?php 

  if($message = $this->session->flashdata('users'))
  {
?>      
       <h5 style="color:red;"> <?php echo $message; ?></h5>

<?php
  }


 ?>

	<body style="margin-left:5%;">

		<form action="<?php echo site_url('admin/login/register'); ?>"  method="post" id="form_validate">
			<label>Registration</label>

			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="text" name="firstname" class="input-group" id="firstname" autocomplete="off"
					placeholder="Enter Firstname Here">

			</div>

			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" name="lastname" id="lastname" class="input-group" autocomplete="off"
					placeholder="Enter Lastname Here">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="input-group" autocomplete="off"
				placeholder="Enter Username Here">
			
			</div>


			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="input-group" autocomplete="off"
				placeholder="Enter Email Id Here">
			</div>

		
 			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="input-group txtbox_pwd" autocomplete="off" placeholder="Enter Password Here">
				 <span class="label password-indicator-label-absolute pwd_strength" style="color: rgb(255, 255, 255);"></span>
			</div>
<!-- 		<div class="form-group">
            <label for="password">Password</label>
                 <div id="progress_bar" style="width:11%"></div>
                 <input type="password" placeholder="Password ..." class=" password" id="password" autocomplete="off"  name="password"  />
         
        </div> -->

			<div class="form-group">
				<label for="cpassword">Confirm Password</label>
				<input type="password" name="cpassword" id="cpassword" class="input-group" autocomplete="off"
				placeholder="Re-Enter Your Password Here">
			</div>


			<div class="form-group">
				<label for="phone_no">Contact Number:</label>
				<input type="text" name="phone_no" onkeypress="return isNumberKey(event)" id="phone_no" class="input-group" autocomplete="off">
			</div>


			<div class="form-group">
				<label for="address">Address</label><br>
				<input type="text" name="address" id="address" class="single-textarea" placeholder="Search"  onFocus="geolocate()"  autocomplete="off">
			</div>
      <div class="form-group">
        <label for="country">Country</label><br>
        <input type="text" name="country" id="country" class="single-textarea" placeholder="Country"  autocomplete="off">
      </div>
      <div class="form-group">
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code" class="single-textarea" placeholder="Code"  autocomplete="off">
      </div>

      <div class="form-group">
        <a href="#">Agree To Our Terms And Conditions?</a>
         <input type="checkbox" name="terms"  id="terms"/> 
      </div> 

			<button type="submit" id="submit" name="register" class="btn btn-primary">Register</button>

       <br>
      Already Registered User? Login From Here: <a href="<?php echo site_url('admin/login/login');?>">Login</a>
		</form>

	</body>
</html>



<script type="text/javascript">


 var autocomplete;
 var componentForm =
      {

      country     : 'long_name',
      postal_code : 'short_name'

      };

function initAutocomplete() 
{

  autocomplete = new google.maps.places.Autocomplete
  (
    document.getElementById('address'), {types: ['geocode']}
    );
  autocomplete.setFields(['address_component']);
  autocomplete.addListener('place_changed', fillInAddress);

}

function fillInAddress() 
{
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
      document.getElementById(component).value = '';
      document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) 
    {
      var addressType = place.address_components[i].types[0];

      if (componentForm[addressType]) 
      {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
 }

  function geolocate() 
  {
    if (navigator.geolocation) 
    {
      navigator.geolocation.getCurrentPosition(function(position) 
      {
        var geolocation = 
        {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        var circle = new google.maps.Circle(
          {
            center: geolocation, 
            radius: position.coords.accuracy
          });

        autocomplete.setBounds(circle.getBounds());
      });
    }
  }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQQUPe-GBmzqn0f8sb_8xZNcseul1N0yU&libraries=places&callback=initAutocomplete" async defer></script> 
  

<script type="text/javascript">


$(document).ready(function()
{
    $("#form_validate").validate({

        // for check form validations
        rules:
        {   

            postal_code:
            {
              digits:true
            },

            firstname: 
            {
                lettersonly: true,
                required:true
            },
            username : "required" ,
            lastname : "required",
            terms    :
            {
              required: true
            },

            email:{
            	required: true,
            	email 	: true
            },
            password:
            {
            	required:true,
            	minlength :10,
            	maxlength :18

            },
            cpassword:
            {
            	 equalTo : "#password",
            	 minlength : 10,
            	 required : true
            },
             phone_no:
            {
              required  :true,
              minlength :10,
              maxlength :10,
              //digits    :true

            },



        },
        // for display error message
        messages:
        {
	           firstname:
             {
                required: " <h6> <i class='fa fa-window-close'></i> Please Enter Your Firstname.</h6>",
                lettersonly: "<h6><i class='fa fa-window-close'></i> Only Alphabates Are Allowed without Space.</h6>",
             },
	           lastname : "<h6><i class='fa fa-window-close'></i> Please Enter Your Lastname.</h6>",
	           username : "<h6><i class='fa fa-window-close'></i> Please Enter Username.</h6>",

           email:{
           	   required : "<h6><i class='fa fa-window-close'></i> Please Enter Your Email Id.</h6>",
           	   email    : "<h6><i class='fa fa-window-close'></i> Please Enter Valid Email Address.</h6>"
           },

           password:
           {
           	   required : "<h6><i class='fa fa-window-close'></i> Please Enter Password.</h6>",
           	   minlength: "<h6><i class='fa fa-window-close'></i> Minimum Length of Password Should be 10 				Characters.</h6>",
           	   maxlength: "<h6><i class='fa fa-window-close'></i> Maximum Length of Password Should be 18 				Characters.</h6>"
           },

           cpassword:
           {
           	   required : "<h6><i class='fa fa-window-close'></i> Please Re-Enter Your Password.</h6>",
           	   equalTo  : "<h6><i class='fa fa-window-close'></i> Sorry! Password and Confirm Password Should be Matched.</h6>"

           },

           terms:
           {
             required :"<h6><i class='fa fa-window-close'></i> Sorry, You Have To Accept Our Terms And Conditions.</h6>"
           },

           phone_no:
           {
            required :"<h6><i class='fa fa-window-close'></i> Contact Number is Required.</h6>",
            // digits   : "<h6><i class='fa fa-window-close'></i> Sorry, Only Digits Are Allowed.",
            minlength :"<h6><i class='fa fa-window-close'></i>Sorry, Minimum 10 Digits Are Allowed.</h6>",
            maxlength :"<h6><i class='fa fa-window-close'></i>Sorry, Maximum 10 Digits Are Allowed.</h6>",
           }

        },
  
});


});

</script>


<script type="text/javascript">

    $(document).on('keyup','#password',function()
    {
        var pass_str = $('#password').val();
        pass_length = pass_str.length;

        if(pass_length<10)
        {
            $('.pwd_strength').css('background-color','#F44336').html('weak');
            $('txtbox_pwd').css('border','1px red');

        }

        if(pass_length>=10 && (pass_str.match(/([a-zA-Z])/) || pass_str.match(/([0-9])/)))
        {
            $('.pwd_strength').css('background-color','#2196F3').html('Normal');
        }

        if(pass_length>=10 && pass_str.match(/([a-zA-Z])/) && pass_str.match(/([0-9])/) && pass_str.match(/([!,@,#,$,%,^,&,*,(,),+,?,_,~])/))
        {
            $('.pwd_strength').css('background-color','#00BCD4').html('Good');
        }

        if(pass_length>=10 && pass_str.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && pass_str.match(/([0-9])/) && pass_str.match(/([!,@,#,$,%,^,&,*,(,),+,?,_,~])/))
        {
            $('.pwd_strength').css('background-color','#4CAF50').html('Strong');
        }
    });
</script>

