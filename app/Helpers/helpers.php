<?php
/**
 * Fungsi Counting
 */
function counTing($a){
    switch (strlen($a)) {
        case 1:
            echo '00'.$a;
            break;
        case 2:
            echo '0'.$a;
            break;
        default:
            echo $a;
            break;
    }
}