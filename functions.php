<?php
function formatArr($temp)
{
    if (is_array($temp)) {
        $num_phase = count($temp);
        $str = '[';
        for ($phase=0;$phase<$num_phase;$phase++){
            $length = count($temp[$phase]);
            for ($i=0;$i<$length;$i++){
                if ($i == 0){
                    $str .= '[';
                }
                $str .= '['.$temp[$phase][$i]['tunut'].','.$temp[$phase][$i]['dennut'].']';
                if ($i < $length-1){
                    $str .= ',';
                }
                if ($i == $length-1){
                    $str .= ']';
                }
            }
            if ($phase < $num_phase-1){
                $str .= ',';
            }
        }
        $str .= ']';
        return $str;
    } else {
        return false;
    }
}