<!DOCTYPE html>
<html>
<head>

  <title>Change Password</title>

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
 

  <style type="text/css">
    
    .error
    {
      color:red;

    }

  </style>

</head>

  <body>

    <form action="<?php echo site_url('admin/login/change_password');?>"  method="post" id="form_validate">
      <label>Change Password</label>
      <br>
      <tr></tr><tr></tr>
     Reset New Password For: <b>
<?php 
      
      echo $this->session->userdata('email');
?></b>
  
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="input-group txtbox_pwd" autocomplete="off" placeholder="Enter Password Here">
         <span class="label password-indicator-label-absolute pwd_strength" style="color: rgb(255, 255, 255);"></span>
      </div>

      <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="cpassword" class="input-group" autocomplete="off"
        placeholder="Re-Enter Your Password Here">
      </div>

      <button type="submit" id="submit" name="go" class="btn btn-primary">Go</button>
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
            }

        },

        // for display error message
        messages:
        {

           password:
           {
               required : "<i class='fa fa-window-close'></i> Please Enter Password.",
               minlength: "<i class='fa fa-window-close'></i> Minimum Length of Password Should be 10         Characters.",
               maxlength: "<i class='fa fa-window-close'></i> Maximum Length of Password Should be 18         Characters."
           },

           cpassword:
           {
               required : "<i class='fa fa-window-close'></i> Please Re-Enter Your Password.",
               equalTo  : "<i class='fa fa-window-close'></i> Sorry! Password and Confirm Password Should Be Matched."

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
