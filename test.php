<?php
include('connection.php');
$sql = "SELECT giaidoan, tunut, dennut FROM giaidoan WHERE id_baitap=15 ORDER BY giaidoan, tunut, dennut";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $temp[$row['giaidoan']][] = $row;
}
test(0, $temp, null, 1);

function test($phase, $temp, $path, $count) {
    $num_phase = count($temp);
    for ($i=0;$i<count($temp[$phase])-1;$i++){
        if ($phase == 0){
            $path[] = $temp[$phase][$i]['tunut'];
        }
        $path[] = $temp[$phase][$i]['dennut'];
        if ($phase != $num_phase-1) {
            test($phase+1,$temp,$path, $count++);
        }
        else {
            echo $count;
            print_r($path);
            $result[] = $path;
        }
        array_pop($path);
        if ($phase == 0){
            array_pop($path);
        }
    }
    echo 'phase '.$phase.'<br>';
//    foreach($temp[$phase] as $value) {
//        if (!isset($path)){
//            $path[] = $value['tunut'];
//        }
//        $path[] = $value['dennut'];
//        if ($phase == $num_phase-1){
//            $result[] = $path;
//            $path = null;
//        }
//        else {
//            test($phase+1, $temp, $path);
//        }
//        if (is_array($path)){
//            array_pop($path);
//        }
//    }
}
?>