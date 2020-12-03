<?php 
include_once('View/Layout/layout.php');
?>
<div style="color: red">
	<?php echo $error; ?>
</div>
<div class="col-sm-8">
	<h2>Add Book</h2>
	<form class="form-horizontal" action="" method="POST">
		<!-- https://www.facebook.com/groups/laptrinh.IT/permalink/3242910372394232/ -->		
		<div class="form-group">
			<label class="control-label col-sm-2" for="">Category:</label>
			<select class="form-control" style="width: 100px;" name="cate_id">

				<?php foreach ($categories as $value): ?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
				<?php endforeach ?>
							
			</select>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="">Code:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="code" placeholder="Enter Code" name="code">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Name:</label>
			<div class="col-sm-10">          
				<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">List Price:</label>
			<div class="col-sm-10">          
				<input type="number" class="form-control" id="price" placeholder="Enter number" name="price">
			</div>
		</div>

		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" name="submit"  value="Thêm"></input>
			</div>
		</div>
	</form>
</div>

