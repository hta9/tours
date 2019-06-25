<!DOCTYPE html>
<html>
<head>
	<title>Admins</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">

  	input[type='text']
  	{
  		border-style: none;
  	}
  </style>
</head>
<body >

<form>
	<a href="<?php echo site_url('admin/login/logout'); ?>" >Logout</a>
	<table border="1" align="center"  style="margin-left:10%;margin-right:10%;">
		<h1 align="center">Admins</h1>
		<tr>
			<th style="width:10%">Name</th>
			<th style="width:10%">Username</th>
			<th>Email</th>
			<th style="width:10%">Contact Number</th>
			<th>Country</th>
			<th>Postal Code</th>
			<th>Address</th>
			<th colspan="2" align="center">Action</th>

		</tr>

		<?php

foreach ($admins as $admin)
{
	?>
		<input type="hidden" name="id" value="<?php echo $admin['id'];?>" class="id">
			<tr>

			<td>
				<input type="text"   value="<?php echo ucwords($admin['firstname'])." ".ucwords($admin['lastname']); ?>">
			</td>

			<td>
				<input type="text" class="uname" data-id="<?php echo $admin['id'];?>" value="<?php echo $admin['username']; ?>"></td>
			</td>

			<td><a href="mailto:<?php echo $admin['email']; ?>"><?php echo $admin['email']; ?></a></td>

			<td><input type="text"  value="<?php echo $admin['phone_no']; ?>"></td>

			<td><?php echo ucwords($admin['country']); ?></td>

			<td><?php echo $admin['postal_code']; ?></td>

			<td><?php echo ucwords($admin['address']); ?></td>
			<td>
				&nbsp;&nbsp;
				<a href="<?php echo site_url('admin/login/delete') ?>/<?php echo base64_encode($admin['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="glyphicon glyphicon-trash"></i></a>
				
			</td>
			</tr>
		<?php
}

?>
	</table>
 </form>
</body>
</html>

<script type="text/javascript">

	$(document).ready(function($)
	{
		$('.uname').blur(function(event) {

			var uname = $(this).val();
			var id    = $(this).data('id');
			
			$.ajax({
				url: '<?php echo site_url('admin/login/edit'); ?>',
				type: 'POST',
				
				data: 
				{
					uname : uname,
					id    :id
				},
				success: function(data)
				{
					window.location.href = '<?php echo base_url();?>admin/login/';
				}
			})
			
		});
	});
</script>


