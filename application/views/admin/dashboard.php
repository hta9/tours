<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>

<form>

	<table>
		<a href="<?php echo site_url('admin/login/logout'); ?>" >Logout</a>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>

			<!-- <tr><td><a href="<?php //echo site_url('admin/login'); ?>">View Admins</a></td></tr> -->
			<tr><td><a href="<?php echo site_url('admin/login/add_edit_bank_info'); ?>">My Bank-Info</a></td></tr>
			<tr><td><a href="<?php echo site_url('admin/login/view_profile'); ?>">View Profile</a></td></tr>
			<tr><td><a href="<?php echo site_url('admin/tours'); ?>">Tours</a></td></tr>
			

	</table>
</form>

</body>
</html>