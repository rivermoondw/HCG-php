<?php
if (!isset($_POST['btnCreate'])){
	Header('Location: index.php');
}
if (!empty($_POST['txtTitle'])) {
	$title = $_POST['txtTitle'];
}
$titlePage = 'Tạo mới';
include('templates/header.php');
?>
<div class="header-title">
	<h3><?php echo $title; ?></h3>
</div>
<div class="content">
    <form action="step1.php" method="post">
        <div class="form-group row">
            <div class="col-md-3">
                <label>Số giai đoạn</label>
                <input type="text" class="form-control" name="txtNumPhase">
            </div>
            <div class="col-md-3">
                <label>Số phương án</label>
                <input type="text" class="form-control" name="txtNumSolution">
            </div>
            <div class="col-md-3">
                <label>Dạng bài toán</label>
                <select name="sltMaxMin" class="form-control">
                    <option value="0">Tìm Min</option>
                    <option value="1">Tìm Max</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="txtTitle" value="<?php echo $title; ?>">
        <button type="submit" name="btnStep1" value="btnStep1" class="btn btn-primary">Xác nhận</button>
    </form>
</div>
<?php include('templates/footer.php'); ?>