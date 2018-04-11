<?php
if (isset($_POST['btnStep1'])) {
    include('connection.php');
    $title = $_POST['txtTitle'];
    if (!empty($_POST['txtNumPhase'])){
        $num_phase = $_POST['txtNumPhase'];
    }
    if (!empty($_POST['txtNumSolution'])){
        $num_solution = $_POST['txtNumSolution'];
    }
    $maxmin = $_POST['sltMaxMin'];
    $sql = "INSERT INTO baitap (tieude, sogiaidoan, sophuongan, maxmin) VALUES ('$title', $num_phase, $num_solution, $maxmin)";
    if (mysqli_query($conn,$sql) === TRUE){
        $last_id = mysqli_insert_id($conn);
    }
}
else {
    echo '<h1>Lỗi</h1>';
    die();
}
$titlePage = 'Bước 1';
include('templates/header.php');
?>
<div class="header-title">
    <h3><?php echo $title; ?></h3>
</div>
<div class="content">
    <h3>Nhập chi phí</h3>
    <form action="step2.php" method="post">
        <table class="table table-bordered">
            <tr>
                <th></th>
                <?php
                for($i=0;$i<$num_phase;$i++){
                    echo '<th>Giai đoạn '.($i+1).'</th>';
                }
                ?>
            </tr>
            <?php
            for($i=0;$i<$num_solution;$i++){
            ?>
                <tr>
                    <th><?php echo 'Phương án '.($i+1); ?></th>
                    <?php
                    for($j=0;$j<$num_phase;$j++){
                        echo '<td><input type="text" class="form-control" name="costArr['.$j.']['.$i.']"></td>';
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </table>
        <input type="hidden" name="lastId" value="<?php echo $last_id; ?>">
        <input type="hidden" name="title" value="<?php echo $title; ?>">
        <input type="hidden" name="numPhase" value="<?php echo $num_phase; ?>">
        <input type="hidden" name="numSolution" value="<?php echo $num_solution; ?>">
        <button type="submit" class="btn btn-primary" name="btnStep2" value="btnStep2">Lưu lại</button>
    </form>
</div>
<?php include('templates/footer.php'); ?>
