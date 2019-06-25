<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
</head>
<body>
	<a href="<?php echo site_url('admin/login/dashboard'); ?>" class="btn btn-success">Back</a>
	<form>
		<table>
			<h3 style="color:red;">Information:</h3>
			
		<tr>
			<td>Full name: 
				<b><?php echo ucwords($admin_data['firstname']).' '.ucwords($admin_data['lastname']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Username: 
				<b><?php echo ucwords($admin_data['username']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Email:
			 <b><?php echo ucwords($admin_data['email']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Contact Number: 
				<b><?php echo ucwords($admin_data['phone_no']); ?></b>	
			</td>
		</tr>

		<tr>
			<td>Address: 
				<b><?php echo ucwords($admin_data['address']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Postal Code: 
				<b><?php echo ucwords($admin_data['postal_code']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Country: 
				<b><?php echo ucwords($admin_data['country']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Bank Name: 
				<b><?php echo ucwords($bank_data['bank_name']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Owner Name: 
				<b><?php echo ucwords($bank_data['owner_name']); ?></b>
			</td>
		</tr>

		<tr>
			<td>Swift Code: 
				<b><?php echo ucwords($bank_data['swift_code']); ?></b>
			</td>
		</tr>

		</table>
	</form>
</body>
</html>