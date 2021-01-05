<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$diff1 = 0;
$diff3 = 0;
$jolt = 0;

while (true) {

  if (in_array($jolt+1, $lines)) {
    $jolt = $jolt + 1;
    $diff1++;
  } else if (in_array($jolt+2, $lines)) {
    $jolt = $jolt + 2;
  } else if (in_array($jolt+3, $lines)) {
    $jolt = $jolt + 3;
    $diff3++;
  } else {
    break;
  }

}

$iff3++;
echo "$diff1 $diff3 ".($diff1*$diff3)."\n";
