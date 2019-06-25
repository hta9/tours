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

    <form action="<?php echo site_url('admin/login/verify');?>"  method="post" id="form_validate">
      <label>Verify Your Details</label>
      <br>
      <tr></tr><tr></tr>

  
        <div class="form-group">
        <label for="password">Verification Code:</label>
        <input type="text" name="code" id="code" class="input-group " autocomplete="off" placeholder="Enter Verfication Code Here">
     
      </div>


      <button type="submit" id="submit" name="go" class="btn btn-primary">Go</button>
    </form>

  </body>
</html>




