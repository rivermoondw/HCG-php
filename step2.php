<?php
include 'connection.php';
include 'functions.php';
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
if (isset($_POST['btnDel'])){
    $title = $_POST['title'];
    $num_phase = $_POST['numPhase'];
    $num_solution = $_POST['numSolution'];
    $last_id = $_POST['lastId'];
    $phase = $_POST['sltPhase'];
    $from = $_POST['sltFrom'];
    $to = $_POST['sltTo'];
    $sql = "DELETE FROM giaidoan WHERE id_baitap=$last_id AND giaidoan=$phase AND tunut=$from AND dennut=$to";
    mysqli_query($conn, $sql);
}
$sql = "SELECT giaidoan, tunut, dennut FROM giaidoan WHERE id_baitap=$last_id ORDER BY giaidoan, tunut,dennut";
$result = mysqli_query($conn, $sql);
$num_path = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)){
    $pathArr[$row['giaidoan']][] = $row;
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
                <button type="submit" class="btn btn-primary" name="btnDel" value="btnDel">Xóa</button>
            </form>
            <form action="ketqua.php" method="post">
                <input type="hidden" name="idBaitao" value="<?php echo $last_id; ?>">
                <button type="submit" class="btn btn-primary" name="btnResult" value="<?php echo $last_id; ?>" style="margin-top: 20px;">Xem kết quả</button>
            </form>
        </div>
        <div class="col-md-8" id="sodo">
            <canvas id="graphIn"></canvas>
        </div>
    </div>
</div>
<script src="./js/Chart.js"></script>
<script>
    var xLabels = [];
    var yLabels = [];
    for (let i=0;i<<?php echo $num_phase; ?>+1;i++){
        xLabels.push(i);
    }
    for (let i=<?php echo $num_solution ?>-1;i>=0;i--){
        yLabels.push(i+1);
    }
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
        },
        animation: {
            duration: 0
        }
    }
    <?php
        if (isset($pathArr) && is_array($pathArr)){
    ?>
    var graphInput = getInputPath(<?php echo formatArr($pathArr); ?>);
    var dts = [];
    for (let i=0;i<graphInput.length;i++){
        let tempData = {
            data: graphInput[i],
            borderColor: "#3e95cd",
            fill: false,
            pointRadius: 5,
            pointBackgroundColor: '#ff0000'

        }
        dts.push(tempData);
    }
    var data1 = {
        datasets: dts
    }
    new Chart(document.getElementById("graphIn").getContext('2d'), {
        type: 'line',
        data: data1,
        options: options
    })
    <?php
        }
    ?>
</script>
<?php include('templates/footer.php'); ?>
