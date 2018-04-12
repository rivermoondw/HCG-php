<?php
include('connection.php');
$sql = "SELECT giaidoan, tunut, dennut FROM giaidoan WHERE id_baitap=3 ORDER BY giaidoan, tunut, dennut";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $temp[$row['giaidoan']][] = $row;
}
$num_phase = count($temp);
$str = recurse($temp, 0, $num_phase);
echo $str;

function formatArr($temp, $phase, $num_phase, $str = '')
{
    if (is_array($temp) && $phase <= $num_phase - 1) {
        if ($phase == 0) {
            $str .= '[';
        }
        for ($i = 0; $i < count($temp[$phase]); $i++) {
            if ($i == 0) {
                $str .= '[';
            }
            $str .= '[' . $temp[$phase][$i]['tunut'] . ',' . $temp[$phase][$i]['dennut'] . ']';
            if ($i < count($temp[$phase]) - 1) {
                $str .= ',';
            }
            if ($i == count($temp[$phase]) - 1) {
                $str .= ']';
                if ($phase < $num_phase - 1) {
                    $str .= ',';
                }
                recurse($temp, $phase + 1, $num_phase, $str);
            }
        }
        if ($phase == $num_phase - 1) {
            $str .= ']';
            echo $str;
        }
    } else {
        return false;
    }
}

?>