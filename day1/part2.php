<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);
sort($lines);

for ($i=0; $i<count($lines); $i++) {
  $a = intval($lines[$i]);
  for ($j=$i+1; $j<count($lines); $j++) {
    $b = intval($lines[$j]);
    for ($k=$j+1; $k<count($lines); $k++) {
      $c = intval($lines[$k]);
      if ($a+$b+$c==2020) {
        echo $a.' '.$b.' '.$c.' '.($a*$b*$c);
        exit();
      }
      if ($a+$b+$c>2020) break;
    }
  }
}
