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
 

  <style type="text/css">
    
    .error
    {
      color:red;

    }

  </style>

</head>

  <body>

    <form action="<?php echo site_url('admin/login/forgot_password');?>"  method="post" id="form_validate">
      <label>Login</label>
<?php 
      
      echo $this->session->userdata('email');
?>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="input-group" autocomplete="off"
        placeholder="Enter Your Email Id Here" value="" >
        <h6 id="error_msg" style="color:red;">Please Eneter Your Registered Email-ID.</h6>
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

            email:{
              required: true,
              email   : true
            }

        },

        // for display error message
        messages: 
        {            

           email:{
               required : "Please Enter Your Email Id.",
               email    : "Please Enter Valid Email Address"
           }

        }
    });
});

</script>