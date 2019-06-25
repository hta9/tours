<!DOCTYPE html>
<html>
<head>
	<title>Bank Information</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
	 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>


  <style type="text/css">
  	
  	.error
  	{
  		color:red;

  	}

  </style>
</head>


<body >
<form method="post" action="<?php echo site_url('admin/login/add_edit_bank_info'); ?>/<?php echo base64_encode($bank_data['admin_id']); ?>" id="form_validate">


<a href="<?php echo site_url('admin/login/dashboard'); ?>" class="btn btn-success">Back</a>

	<table>

			<div class="form-group">
				<label for="bank_name">Bank Name</label>
				<input type="text" name="bank_name" value="<?php

												if (!empty($bank_data)) 
												{
													echo $bank_data['bank_name'];
												}
												?>" 

				class="input-group" id="bank_name" autocomplete="off" placeholder="Enter Bank Name Here">

			</div>

			<div class="form-group">
				<label for="owner">Owner Name</label>
				<input type="text" name="owner_name" value="<?php
												if (!empty($bank_data)) 
												{
													echo $bank_data['owner_name'];
												}
												?>" 

				class="input-group" id="owner" autocomplete="off" placeholder="Enter Name of Owner Here">
			</div>

			<div class="form-group">
				<label for="acc_no">Account Number</label>
				<input type="text" name="acc_no" value="<?php
												if (!empty($bank_data)) 
												{
													echo $bank_data['acc_no'];
												}
												?>" 
				 class="input-group" id="acc_no" autocomplete="off" placeholder="Enter Account Number Here">
				 <label style="color:tomato;" class="guideline">Account Number Should contain 9 to 18 Characters Only.</label>
			</div>

			<div class="form-group">
				<label for="code">Swift Code</label>
				<input type="text" name="swift_code" value="<?php
												if (!empty($bank_data)) 
												{
													echo $bank_data['swift_code'];
												}
												?>" 
				class="input-group"  id="code"  autocomplete="off" placeholder="Enter Code Here">
<label style="color:tomato;" class="guideline">Swift Code Should contain 8 to 11 Characters Only.</label>
			</div>

			<input type="submit" name="Save" value="save" class="btn btn-primary">

	</table>
</form>
</body>
</html>

<script type="text/javascript">


$(document).ready(function()
{
	//$('.guideline').hide();	

    $("#form_validate").validate({


        // for check form validations
        rules:
        {

          bank_name:"required",
          owner_name:"required",

          acc_no:
          {
          	 required : true,
          	 minlength:9,
          	 maxlength:18

          },

          swift_code:
          {
          	required: true,
          	digits  : true,
          	minlength:8,
          	maxlength:11

          }


        },

        // for display error message
        messages:
        {
        	bank_name: "<i class='fa fa-window-close'></i> Please Enter Name of Bank.",
	        owner_name : "<i class='fa fa-window-close'></i> Please Enter Account Number.",

           acc_no:{
           	   required : "<i class='fa fa-window-close'></i> Please Enter Your Valid Account Number Here",
           	   minlength: "<i class='fa fa-window-close'></i> The Length of Account Number Should be 9 to 18 Characters Only.",
           	   maxlength: "<i class='fa fa-window-close'></i> The Length of Account Number Should be 9 to 18 Characters Only."
           },

           swift_code:
           {
           	   required : "<i class='fa fa-window-close'></i> Please Enter Your Valid Swift Code.",
           	   minlength: "<i class='fa fa-window-close'></i> The Length of Swift Code Should be 8 to 11 Characters Only.",
           	   maxlength: "<i class='fa fa-window-close'></i> The Length of Swift Code Should be 8 to 11 Characters Only."
           }

        }
    });
});

</script>