<?php 
include_once('View/Layout/layout.php');
?>
<div style="color: red">
	<?php echo $error; ?>
</div>
<div class="col-sm-8">
	<h2>edit Product</h2>
	<form class="form-horizontal" action="" method="post">

		<div class="form-group">
			<label class="control-label col-sm-2" for="">Category:</label>

			<select class="form-control" style="width: 100px;" name="cate_id">
				<?php foreach ($categories as $key => $value): 
					$selected = "";
					if ($book['cate_id'] == $value['id']) {
						$selected = "selected=TRUE";
					}
					?>
					<option  <?php echo $selected; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>	
				<?php endforeach ?>			
			</select>

		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="">Code:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" value="<?php echo $book['code'] ?>" id="code" placeholder="Enter Code" name="code">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Name:</label>
			<div class="col-sm-10">          
				<input type="text" class="form-control" value="<?php echo $book['name'] ?>" id="name" placeholder="Enter Name" name="name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">List Price:</label>
			<div class="col-sm-10">          
				<input type="number" class="form-control"  value="<?php echo $book['price'] ?>" id="price" placeholder="Enter number" name="price">
			</div>
		</div>

		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit"  name="submit" class="btn btn-warning" value="Sửa"></input>
			</div>
		</div>
	</form>
</div>

