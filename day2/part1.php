<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$valid = 0;
foreach ($lines as $line) {

  if (strlen($line) == 0) continue;
  $tokens = explode(' ', $line);
  $counts = explode('-', $tokens[0]);

  $min = intval($counts[0]);
  $max = intval($counts[1]);
  $char = $tokens[1][0];
  $pass = $tokens[2];

  $count = 0;
  for ($c=0; $c<strlen($pass); $c++) {
    if ($pass[$c] == $char) $count++;
  }

  if ($count >= $min && $count <= $max) {
    $valid++;
  }

}

echo $valid;