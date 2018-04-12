<?php
function formatArr($temp, $phase, $num_phase, $str = '')
{
    if (is_array($temp)) {
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
                formatArr($temp, $phase + 1, $num_phase, $str);
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