<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$total = 1;
foreach (array(array(1,1), array(3,1), array(5,1), array(7,1), array(1,2)) as $t) {

  $i=0;
  $j=0;
  $trees = 0;

  while (true) {

    if ($lines[$j][$i] == '#') {
      $trees++;
    }

    $i = ($i + $t[0]) % strlen($lines[0]);
    $j = $j + $t[1];

    if ($j >= count($lines) || strlen($lines[$j]) == 0) {
      break;
    }

  }

  $total *= $trees;

}

echo $total;