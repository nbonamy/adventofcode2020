<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$total = 0;
$items = array();

foreach ($lines as $line) {

  if (strlen($line) == 0) {
    $u = array_unique($items);
    $total += count($u);
    $items = array();
    continue;
  }

  for ($i=0; $i<strlen($line); $i++) {
    $items[] = $line[$i];
  }

}

echo $total;
