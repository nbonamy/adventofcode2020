<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);
//sort($lines);

for ($i=0; $i<count($lines); $i++) {
  $a = intval($lines[$i]);
  for ($j=$i+1; $j<count($lines); $j++) {
    $b = intval($lines[$j]);
    if ($a+$b==2020) {
      echo $a.' '.$b.' '.($a*$b);
      exit();
    }
    //if ($a+$b>2020) break;
  }
}
