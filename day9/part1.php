<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$nums = array();

foreach ($lines as $line)
{
  if (strlen($line) == 0) {
    continue;
  }

  $val = intval($line);

  if (count($nums) < 25) {
    $nums[] = $val;
    continue;
  }

  $found = FALSE;
  for ($j=0; $j<25; $j++) {
    $find = $val - $nums[$j];
    if ($find >= 0) {
      if (in_array($find, $nums)) {
        $found = TRUE;
        break;
      }
    }
  }

  if ($found === FALSE) {
    echo $val;
    exit(0);
  }

  array_shift($nums);
  $nums[] = $val;

}
