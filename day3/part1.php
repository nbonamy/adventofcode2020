<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$i=0;
$j=0;
$trees = 0;

while (true) {

  if ($lines[$j][$i] == '#') {
    $trees++;
  }

  $i = ($i + 3) % strlen($lines[0]);
  $j = $j + 1;

  if ($j >= count($lines) || strlen($lines[$j]) == 0) {
    break;
  }

}

echo $trees;