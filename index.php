<?php $titlePage = 'Trang chủ'; ?>
<?php include('templates/header.php'); ?>
<div class="content">
	<div class="row">
		<div class="form-group col-md-3">
			<form action="details.php" method="post">
				<label>Các bài đã lưu</label>
				<select name="sltSave" class="form-control">
					<option value="">-- Chưa có bài</option>
				</select>
				<br />
				<button type="submit" name="btnOpen" value="btnOpen" class="btn btn-primary">Mở</button>
			</form>
		</div>
		<div class="form-group col-md-3">
			<form action="create.php" method="post">
				<label>Tiêu đề</label>
				<input type="text" class="form-control" name="txtTitle">
				<br />
				<button type="submit" name="btnCreate" value="btnCreate" class="btn btn-primary">Tạo mới</button>
			</form>
		</div>
	</div>
</div>
<?php include('templates/footer.php'); ?>