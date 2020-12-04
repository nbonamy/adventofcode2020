<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$valid = 0;
foreach ($lines as $line) {

  if (strlen($line) == 0) continue;
  $tokens = explode(' ', $line);
  $counts = explode('-', $tokens[0]);

  $pos1 = intval($counts[0]);
  $pos2 = intval($counts[1]);
  $char = $tokens[1][0];
  $pass = $tokens[2];

  $count = 0;
  if ($pass[$pos1-1] == $char) $count++;
  if ($pass[$pos2-1] == $char) $count++;
  if ($count == 1) {
    $valid++;
  }

}

echo $valid;