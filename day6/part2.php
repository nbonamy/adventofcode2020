<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$total = 0;
$group = 0;
$items = array();

foreach ($lines as $line) {

  if (strlen($line) == 0) {
    foreach ($items as $key => $val) {
      if ($val == $group) {
        $total++;
      }
    }
    $items = array();
    $group = 0;
    continue;
  }

  for ($i=0; $i<strlen($line); $i++) {
    $items[$line[$i]]++;    
  }

  $group++;

}

echo $total;
