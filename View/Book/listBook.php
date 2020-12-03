<?php 
require_once 'View/Message/message.php';

include_once('View/Layout/layout.php');
?>
<div class="col-lg-offset-1 col-sm-10">
	<h2>List Category</h2>
	<a href="index.php?controller=book&action=create" class="btn btn-primary">Add Book</a>
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>Category</th>
				<th>code</th>
				<th>name</th>
				<th>price</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($books)): ?>
				<?php foreach ($books as $value): ?>				
					<tr>
						<td><?php echo $value['id'];?></td>
						<td><?php echo $value['cate_name'];?></td>
						<td><?php echo $value['code']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['price']; ?></td>
						<td>
							<?php 
      					//khai báo 3 url xem, sửa, xóa
							$urlDetail ="index.php?controller=book&action=detail&id=" . $value['id'];
							$urlEdit ="index.php?controller=book&action=edit&id=" . $value['id'];
							$urlDelete ="index.php?controller=book&action=delete&id=" . $value['id'];
							?>
						</td>
						<td><a href="<?php echo $urlDetail?>">Chi tiết</a> &nbsp;</td>
						<td><a href="<?php echo $urlEdit?>">Edit</a></td>
						<td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
							href="<?php echo $urlDelete?>">Delete</a></td>
						</tr>
					<?php endforeach ?>	
					<?php else: ?>
						<tr>
							<td colspan="2">KHông có dữ liệu</td>
						</tr>
					<?php endif; ?>

				</tbody>
			</table>
		</div>
