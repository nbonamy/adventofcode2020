<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$error = 14360655;

for ($i=0; $i<count($lines); $i++) {

  if (strlen($lines[$i]) == 0) {
    continue;
  }

  $nums = array();
  $nums[] = $lines[$i];
  $val = intval($lines[$i]);

  for ($j=$i+1; $j<count($lines); $j++) {

    if (strlen($lines[$j]) == 0) {
      continue;
    }

    $nums[] = $lines[$j];
    $val += intval($lines[$j]);

    if ($val == $error) {
      sort($nums);
      echo intval($nums[0]) + intval($nums[count($nums)-1]);
      exit(0);
    } else if ($val > $error) {
      break;
    }
  
  }

}
