<?php 
include_once('View/Layout/layout.php');
?>
<div class="col-sm-8">
	<h2 class="">Edit Category </h2>
	<form class="form-horizontal" action="" method="post">

		<div class="form-group">
			<label class="control-label col-sm-3" for="pwd">Category Name:</label>
			<div class="col-sm-9">          
				<input type="text" class="form-control" id="pwd" placeholder="Enter Category Name" name="name" value="<?php
				echo $cate['name']?>">
			</div>
		</div>

		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10 text-center">
				<input type="submit" class="btn btn-warning" name="submit" value="Update"></input>
			</div>
		</div>
	</form>
</div>


