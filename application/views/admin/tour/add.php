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

 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
 <script type="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js">
  </script>

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/password-score.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/password-score-options.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/bootstrap-strength-meter.js"></script>
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
	<a href="<?php echo site_url('admin/tours'); ?>" class="btn btn-warning" style="margin-top:1%;margin-bottom:1%; ">Back</a>
		<form action="<?php echo site_url('admin/tours/add'); ?>"  method="post" id="form_validate">
			<label>Tours / Add Tour</label>

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="input-group" id="title" autocomplete="off"
					placeholder="Enter Title Here">

			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" name="price" id="price" class="input-group" autocomplete="off"
					placeholder="Enter Price Here">
					<select name="rates_per">
						
						<option value="per_day">Per Day</option>
						<option value="per_km">Per KM </option>

					</select>

			</div>

			<!-- <div class="form-group">
				<label for="ratings">Ratings</label>
				<input type="text" name="ratings" id="ratings" class="input-group" autocomplete="off"
				placeholder="Enter Ratings Here.">
			
			</div> -->

			<div class="form-group">
				<label for="ratings">Ratings</label>
 				<input id="rating" name="ratings" class="rating rating-loading"  data-min="0" data-max="5" data-step="0.5" data-size="xs">
 		   </div>

			<div class="form-group">
				<label for="pickup_loc">Pickup Location</label><br>
				<input type="text" name="pickup_loc" id="pickup_loc" class="input-group" placeholder="Search" autocomplete="off">
			</div>
      		
      		<div class="form-group">
				<label for="drop_loc">Drop Location</label><br>
				<input type="text" name="drop_loc" id="drop_loc" class="input-group" placeholder="Search" autocomplete="off">
			</div>

			<div class="form-group">
				<label for="pickup_date">Pickup Date</label><br>
				<input type="date" name="pickup_date" id="pickup_date" class="input-group" placeholder="Search" autocomplete="off">
			</div>

			<div class="form-group">
				<label for="drop_date">Drop Date</label><br>
				<input type="date" name="drop_date" id="drop_date" class="input-group" placeholder="Search" autocomplete="off">
			</div>

			<div class="form-group">
				<label for="pickup_time">Pickup Time</label><br>
				<input type="time" name="pickup_time" id="pickup_time" class="input-group" placeholder="Search" autocomplete="off">
			</div>

			<div class="form-group">
				<label for="drop_time">Drop Time</label><br>
				<input type="time" name="drop_time" id="drop_time" class="input-group" placeholder="Search" autocomplete="off">
			</div>

			<button type="submit" id="submit" name="register" class="btn btn-primary">Save</button>
		</form>

	</body>
</html>

<script type="text/javascript">

 var autocomplete,autocomplete2;


function initAutocomplete() 
{

  autocomplete = new google.maps.places.Autocomplete
  (
    document.getElementById('pickup_loc'), {types: ['geocode']}
    
  );

  autocomplete2 = new google.maps.places.Autocomplete
  (
    document.getElementById('drop_loc'), {types: ['geocode']}
    
  );
 

}

</script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClQ_Y_F3mJtS_6rpylRvn-8cREsaae29E&libraries=places&callback=initAutocomplete"
        async defer></script>

<script type="text/javascript">


$(document).ready(function()
{

    $("#form_validate").validate({

        // for check form validations
        rules:
        {

            title       : "required" ,
            price       : "required" ,
            pickup_loc  : "required",
            drop_loc    : "required",
            pickup_time : "required",
            drop_time   : "required",
        
            ratings     : 
            {
            	max :5
            },
            drop_date: 
            { 
              greaterThan: "#pickup_date" 
            },
            rates_per	: "required"

        },
        // for display error message
        messages:
        {
	           title      	 : "<i class='fa fa-window-close'></i> Please Enter Title of Tour.",
	           price 	  	 : "<i class='fa fa-window-close'></i> Please Enter Tour Amount.",
	           pickup_loc 	 : "<i class='fa fa-window-close'></i> Please Choose Pickup Location.",
	           drop_loc    	 : "<i class='fa fa-window-close'></i> Please Choose Drop Location.",
	           pickup_time 	 : "<i class='fa fa-window-close'></i> Please Enter Proper Pickup Time.",
	           drop_time   	 : "<i class='fa fa-window-close'></i> Please Enter Proper Drop Time.",
	       
	           ratings:
	           {
	           		
	           	max    : "<i class='fa fa-window-close'></i> Please Enter Ratings Less Than or Equal To 5 only."

	           },
	           dropdate:
	           {
	           	 greaterThan:"<i class='fa fa-window-close'></i> ",
	           }

        },
  
});


	jQuery.validator.addMethod("greaterThan", 
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val())); 
},'Drop-Date Must Be Greater Than Pickup-Date.');
});

</script>



