<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Belajar Membuat Quick Count</title>
    </head>
    <body>
         <br /><br />
		 <div class="container">
		  <nav class="navbar navbar-inverse">
		   <div class="container-fluid">
			<div class="navbar-header">
			 <a class="navbar-brand" href="#">Quick Count</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			 <li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
			 </li>
			</ul>
		   </div>
		  </nav>
		  <br />
		  <?php
			include("koneksi.php");
			$query = "SELECT * FROM candidates ORDER BY id";
			$result = mysqli_query($con, $query);
			echo $result1['earned_vote'];
			
			if(mysqli_num_rows($result) > 0){
			foreach ($result as $paslon){ ?>
				<table border="1" class="table table-responsive table-bordered table-striped table-hover">
					<form method="post" id="<?php echo $paslon['id'];?>">
					<div class="form-group">
					<tr>					
						<td><label><?php echo $paslon['nama'];?></label><br></td>
						<td rowspan=2 ><center>
						<label><input type="submit" name="post" id="post" class="btn btn-info" value="Tambah Suara" />
						</center></td>
					</tr>
					<tr>
						<td><label id="<?php echo $paslon['id'];?>"><?php echo $paslon['earned_vote'];?></label><br></td>
					</div>			
					</tr>
					</form>
		  <?php
			}
			}
		  ?>
		 
		  
		 </div>
    </body>
			
		<script>
		$(document).ready(function(){
			function tambah(){
				$('#'+ <?php echo $paslon['id'];?>).on('submit', function(event){
				event.preventDefault();
				 $.ajax({
					url : "update.php?" + <?php echo $paslon['id'];?>,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id"]').val(data.id);
						$('[name="nama"]').val(data.nama);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				});
			}
			
		// updating the view with notifications using ajax
		function load_unseen_notification(view = '')
		{
		 $.ajax({
		  url:"fetch.php",
		  method:"POST",
		  data:{view:view},
		  dataType:"json",
		  success:function(data)
		  {
		   $('.dropdown-menu').html(data.notification);
		   if(data.unseen_notification > 0)
		   {
			$('.count').html(data.unseen_notification);
		   }
		  }
		 });
		}
		load_unseen_notification();
		// submit form and get new records
		$('#comment_form').on('submit', function(event){
		 event.preventDefault();
		 if($('#subject').val() != '' && $('#comment').val() != '')
		 {
		  var form_data = $(this).serialize();
		  $.ajax({
		   url:"insert.php",
		   method:"POST",
		   data:form_data,
		   success:function(data)
		   {
			$('#comment_form')[0].reset();
			load_unseen_notification();
		   }
		  });
		 }
		 else
		 {
		  alert("Both Fields are Required");
		 }
		});
		// load new notifications
		$(document).on('click', '.dropdown-toggle', function(){
		 $('.count').html('');
		 load_unseen_notification('yes');
		});
		setInterval(function(){
		load_unseen_notification();;
		}, 5000);
		});
		</script>			
</html>

