<?php
include 'connection.php';
if (isset($_POST['btnStep2'])){
    $title = $_POST['title'];
    $num_phase = $_POST['numPhase'];
    $num_solution = $_POST['numSolution'];
    $last_id = $_POST['lastId'];
    if (is_array($_POST['costArr'])){
        $costArr = $_POST['costArr'];
    }
    for($i=0;$i<$num_phase;$i++){
        for($j=0;$j<$num_solution;$j++){
            $cost = $costArr[$i][$j];
            $sql = "INSERT INTO chiphi (id_baitap, giaidoan, phuongan, giatri) VALUES ($last_id, $i, $j, $cost)";
            mysqli_query($conn, $sql);
        }
    }
}
if (isset($_POST['btnSaveStep2'])){
    $title = $_POST['title'];
    $num_phase = $_POST['numPhase'];
    $num_solution = $_POST['numSolution'];
    $last_id = $_POST['lastId'];
    $phase = $_POST['sltPhase'];
    $from = $_POST['sltFrom'];
    $to = $_POST['sltTo'];
    $sql = "SELECT * FROM giaidoan WHERE id_baitap=$last_id AND giaidoan=$phase AND tunut=$from AND dennut=$to";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO giaidoan (id_baitap, giaidoan, tunut, dennut) VALUES ($last_id, $phase, $from, $to)";
        mysqli_query($conn, $sql);
    }
    else {
        $message = 'Đường đi đã có';
    }
}
$sql = "SELECT giaidoan, tunut, dennut FROM giaidoan WHERE id_baitap=$last_id ORDER BY giaidoan, tunut,dennut";
$result = mysqli_query($conn, $sql);
$num_path = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)){
    $pathArr[] = $row;
}

$titlePage = 'Bước 2';
include('templates/header.php');
?>
<div class="header-title">
    <h3><?php echo $title; ?></h3>
</div>
<div class="content">
    <h3>Nhập đường đi</h3>
    <h4 style="color:red"><?php echo isset($message) ? $message : null; ?></h4>
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label>Giai đoạn</label>
                    <select name="sltPhase" class="form-control">
                        <?php
                        for($i=0;$i<$num_phase;$i++){
                            echo '<option value="'.$i.'">'.($i+1).'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Từ nút</label>
                    <select name="sltFrom" class="form-control">
                        <?php
                        for($i=0;$i<$num_solution;$i++){
                            echo '<option value="'.$i.'">'.($i+1).'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Từ nút</label>
                    <select name="sltTo" class="form-control">
                        <?php
                        for($i=0;$i<$num_solution;$i++){
                            echo '<option value="'.$i.'">'.($i+1).'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="lastId" value="<?php echo $last_id; ?>">
                <input type="hidden" name="numPhase" value="<?php echo $num_phase; ?>">
                <input type="hidden" name="numSolution" value="<?php echo $num_solution; ?>">
                <input type="hidden" name="title" value="<?php echo $title; ?>">
                <button type="submit" class="btn btn-primary" name="btnSaveStep2" value="btnSaveStep2">Lưu lại</button>
            </form>
        </div>
        <div class="col-md-8" id="sodo">

        </div>
    </div>
</div>
<script src="./js/Chart.js"></script>
<script>
    var options = {
        elements: {
            line: {
                tension: 0,
            }
        },
        tooltips: {
            enabled: false
        },
        scales: {
            xAxes: [{
                type: 'category',
                labels: xLabels,
                scaleLabel: {
                    display: true,
                    labelString: 'Giai đoạn'
                }
            }],
            yAxes: [{
                type: 'category',
                labels: yLabels,
                scaleLabel: {
                    display: true,
                    labelString: 'Phương án'
                }
            }]
        },
        legend: {
            display: false
        }
    }
    var data = {
        datasets: [{
            data: graphData,
            label: "Đường đi",
            borderColor: "#3e95cd",
            fill: false,
            pointRadius: 5,
            pointBackgroundColor: '#ff0000'
        }]
    }
</script>
<?php include('templates/footer.php'); ?>
