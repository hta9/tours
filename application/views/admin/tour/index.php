<!DOCTYPE html>
<html>
<head>
	<title>Tours</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!--data table--> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" /> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script> 
    <!--/.data table--> 


	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
	<!-- sweet alert end -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ratings.css'); ?>" />

  <script src="<?php echo base_url('assets/js/rating.js'); ?>"></script>

</head>
<body >

<form>
	<a href="<?php echo site_url('admin/login/logout'); ?>" >Logout</a>
	<table border="1" align="center"  style="margin-left:10%;margin-right:10%;" id="mytable">
		<h1 align="center">Tours</h1>
		<a href="<?php echo site_url('admin/tours/add'); ?>" class="btn btn-primary" style="margin-left:10%;margin-top:1%;margin-bottom:1%; ">Add New+</a>

		<a href="javascript:void(0)" class="btn btn-danger" name="delete_all" id="delete_all" style="margin-left:1%;margin-top:1%;margin-bottom:1%; ">Delete</a>
	

		<tr>
			<td align="center" width="5%"><input type="checkbox" id="select_all" title="select_all" > </th>
			<th style="width:20%">Title</th>
			<th style="width:20%">Route</th>

			<th style="width:15%">Pickup Date-Time</th>
			<th style="width:15%">Drop Date-Time</th>
			<th style="width:8%">Price</th>
			<th >Ratings</th>
			<th style="width:8%" align="center">Action</th>

		</tr>


<?php

	if(!empty($tours))
	{

		foreach ($tours as $tour)
		{

?>
			<tr>
			 <td align="center"><input type="checkbox" class="delete_checkbox" value="<?php echo $tour['id']?>" name="selected_tours[]"/></td>
			<td>
			<?php echo ucwords($tour['title']); ?>
			</td>

			<td>
			<?php echo $tour['pickup_loc'] ?> <b>To</b>  <?php
				echo $tour['drop_loc']; ?>
			</td>

			<td><?php echo $tour['pickup_date'] ?>  |  <?php
				echo $tour['pickup_time']; ?>	
			</td>

			<td>
				<?php echo $tour['drop_date'] ?>  |  <?php
				echo $tour['drop_time']; ?>
				
			</td>
			<?php 
				$per = str_replace("per_"," ",$tour['rates_per']);
			 ?>
			<td><?php echo $tour['price']?> / <?php echo ucwords($per); ?></td>

			<td>
				<input id="rating" name="ratings" value="<?php echo $tour['ratings']; ?>" class="rating rating-loading"  data-min="0" data-max="5" data-step="0.5" data-size="xs" readonly >
			</td>


			<td>
				&nbsp;&nbsp;
				<a  class="confirm_del" data-id="<?php echo base64_encode($tour['id']); ?>"><i class="glyphicon glyphicon-trash" ></i></a>
				|
					<a href="<?php echo site_url('admin/tours/edit') ?>/<?php echo base64_encode($tour['id']); ?>" ><i class="glyphicon glyphicon-edit"></i></a>
			</td>
			</tr>
		<?php
	}
}
else
{
	?>
		<h2>No Records Found..</h2>
<?php
 }

?>
	</table>
 </form>
</body>
</html>



<!-- this is for select  all records  -->
<script>


 $(document).on('click', '#select_all', function() {


  $(".delete_checkbox").prop("checked", this.checked);


});

  // <!-- this is for select and deselect all records  -->

 $(document).on('click', '.delete_checkbox', function() {



  if ($('.delete_checkbox:checked').length == $('.delete_checkbox').length)
  {
    $('#select_all').prop('checked', true);
  } 
  
  else

  {
    $('#select_all').prop('checked', false);
  }


}); 

 //for multiple delete records with ajax

 $(document).ready(function(){
 
   $('.delete_checkbox').click(function()
   {

    if($(this).is(':checked'))

    {

     $(this).closest('tr').addClass('removeRow');

    }

   else

   {

     $(this).closest('tr').removeClass('removeRow');

   }

 });

   $('#delete_all').click(function(){


    var checkbox = $('.delete_checkbox:checked');

    if(checkbox.length > 0)
    {
    	
     var cnt =0;	
     var checkbox_value = [];

     $(checkbox).each(function(){
      $(this).closest('tr').addClass('removeRow');
      checkbox_value.push($(this).val());
      cnt++;
    });
      
   
  swal({
  title: "Are you sure?",
  text: "You will Not be Able to Recover Your Data!!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Delete It.",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
       $.ajax({
        url:"<?php echo base_url(); ?>admin/tours/delete_all",
        method:"POST",
        data:{checkbox_value:checkbox_value},

        success:function(data)
        {
        	// var items = data;
         $('.removeRow').fadeOut(1000);
          swal("Deleted!", data + " Record(s) Have Been Deleted Successfully.", "success");
          // window.location.href= "<?php echo site_url('admin/tours'); ?>";
       }
     })

  } else {
    swal("Cancelled", "Your Record(s) Are Safe..!!", "error");
  }
});


  }

  else

  {
   swal('Please Select Atleast One Record.');
 }

});

 });
</script>

<script type="text/javascript">

$(document).ready(function($) 

{
  $('.confirm_del').click(function(event) {

    event.preventDefault();
    var id = $(this).data('id');
     $(this).closest('tr').addClass('remove');

  swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel Please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {

	
  if (isConfirm) {
     //swal("Deleted!", "Your imaginary file has been deleted.", "success");
     $.ajax({
        url:"<?php echo base_url(); ?>admin/tours/delete",
        method:"POST",
        data:
        {
        	id:id
        },

        success:function()
        {
        	
         $('.remove').fadeOut(1000);
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
       }
     })

  } 
  else 
  {
    swal("Cancelled", "Your Record is safe :)", "error");
  }
});



});

  
});


</script>
