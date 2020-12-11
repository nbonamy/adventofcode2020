<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$acc = 0;
$cursor = 0;
$exec = array();


while (true) {

  if (in_array($cursor, $exec)) {
    break;
  }
  $exec[] = $cursor;

  $line = $lines[$cursor];
  $toks = explode(' ', $line);

  $cmd = $toks[0];
  $val = ($toks[1][0] == '-' ? -1 : +1) * intval(substr($toks[1], 1));

  if ($cmd == 'nop') {
    $cursor++;
  } else if ($cmd == 'acc') {
    $acc += $val;
    $cursor++;
  } else if ($cmd == 'jmp') {
    $cursor += $val;
  }


}

echo $acc;
