<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<table>
	
		<tr>
			 <td>
				Hi!!.. <b style="color:red;"><?php echo strstr(ucwords($email), '@', true);?></b>

			</td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td>
				We Have Reccieved Request That You Have Forgot Your Password at <b>Reddy Tours</b>.
			</td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
				
			<td>
				Click This Link To Set New Password : <a class="btn btn-primary" href="<?php echo site_url('admin/login/change_password'); ?>">Click Here To Reset Your Password.</a>
			</td>
		</tr>

</table>
</body>
</html>