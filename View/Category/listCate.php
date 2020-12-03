<?php 
//file hiển thị thông báo lỗi
require_once 'View/Message/message.php';

include_once('View/Layout/layout.php');
?>

<div class="col-lg-offset-1 col-sm-10">
	<h2>List Category</h2>
	<a href="index.php?controller=Category&action=add" class="btn btn-primary">Add Category</a>
	<!-- các hoạt động sau phải nối với file ngoài cùng là index.php (dựa theo file điều khiển là index tùy các đặt tên mà thay đổi theo ) -->
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Category</th>
				<th></th>
				
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($category)): ?>

				<?php foreach ($category as $key => $value): ?>
					<tr>
						<td><?php echo $value['id'] ?></td>
						<td><?php echo $value['name']?></td>
						<td>
							<?php 
      					//khai báo 3 url xem, sửa, xóa
							$urlDetail ="index.php?controller=Category&action=detail&id=" . $value['id'];
							$urlEdit ="index.php?controller=Category&action=edit&id=" . $value['id'];
							$urlDelete ="index.php?controller=Category&action=delete&id=" . $value['id'];
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


