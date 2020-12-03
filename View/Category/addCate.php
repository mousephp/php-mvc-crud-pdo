<?php 
include_once('View/Layout/layout.php');
?>
<div style="color: red">
	<?php echo $error; ?>
</div>
<div class="col-sm-8">
	<h2 class="">Add Category </h2>
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label class="control-label col-sm-3" for="pwd">Category Name:</label>
			<div class="col-sm-9">          
				<input type="text" class="form-control" id="pwd" placeholder="Enter Category Name" name="name">
			</div>
		</div>
		
		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10 text-center">
				<input type="submit" name="submit" class="btn btn-success" value="save"></input>
			</div>
		</div>
	</form>
</div>




