<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$ids = array();
foreach ($lines as $line) {

  if (strlen($line) == 0) {
    continue;
  }

  $row_min = 0;
  $row_max = 127;

  for ($i=0; $i<7; $i++) {
    $row_mid = ($row_max-$row_min+1)/2;
    if ($line[$i] == 'F') {
      $row_max = $row_max - $row_mid;
    } else if ($line[$i] == 'B') {
      $row_min = $row_min + $row_mid;
    } else {
      echo "$line $i $line[$i]\n";
      exit(1);
    }
  }

  $col_min = 0;
  $col_max = 7;  

  for ($i=7; $i<10; $i++) {
    $col_mid = ($col_max-$col_min+1)/2;
    if ($line[$i] == 'L') {
      $col_max = $col_max - $col_mid;
    } else if ($line[$i] == 'R') {
      $col_min = $col_min + $col_mid;
    } else {
      echo "$line $i $line[$i]\n";
      exit(1);
    }
  }

  $score = $row_min * 8 + $col_min;
  $ids[] = $score;

}

$ids = array_unique($ids, SORT_NUMERIC);
sort($ids);

for ($i=0; $i<count($ids)-1; $i++) {

  if ($ids[$i+1] == $ids[$i]+2) {
    echo $ids[$i]+1;
  }

}
