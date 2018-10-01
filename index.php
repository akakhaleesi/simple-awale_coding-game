<?php

$opBowls = stream_get_line(STDIN, 100 + 1, "\n");
$myBowls = stream_get_line(STDIN, 100 + 1, "\n");
fscanf(STDIN, "%d",
    $num
);

$opInput = explode(" ", $opBowls);
$myInput = explode(" ", $myBowls);
$replay = null;

$hand = $myInput[$num];
$myInput[$num] = 0;
$num += 1;
$op = 0;
$me = 1;

for($i=1;$i<=$hand;$i++){
    if($me == 1){
        if($num <= 6){
            if($num==6 && $i == $hand){
                $replay = 'REPLAY';
            }
            $myInput[$num] ++;
            $num++;
        }
        else {
            $num = 0;
            $me = 0;
            $op = 1;
        }
    }
    if($op == 1){
        if($num <= 6){
            if($num == 6){
                $i--;
                $num = 0;
                $me = 1;
                $op = 0;
            }
            else {
                $opInput[$num] ++;
                $num++;
            }
        }
    }
    if($i == $hand){
        $opInput[6] = "[".$opInput[6]."]";
        $opOutput = implode(" ",$opInput);

        $myInput[6] = "[".$myInput[6]."]";
        $myOutput = implode(" ",$myInput);
    }
}

echo "$opOutput\n$myOutput\n";
if($replay !== null) echo $replay;

?>
