<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$acc = 0;

function test($lines) {

  global $acc;
  $acc = 0;
  
  $cursor = 0;
  $exec = array();

  while (true) {

    if (in_array($cursor, $exec)) {
      return false;
    }
    $exec[] = $cursor;

    $line = $lines[$cursor];
    if (strlen($line) == 0) {
      return true;
    }

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

}

for ($i=0; $i<count($lines)-1; $i++) {

  $save = $lines[$i];
  if (strpos($lines[$i], 'jmp') !== FALSE) {
    $lines[$i] = str_replace('jmp', 'nop', $lines[$i]);
    if (test($lines)) {
      echo $acc;
      exit(0);
    }
  } else if (strpos($lines[$i], 'nop') !== FALSE) {
    $lines[$i] = str_replace('nop', 'jmp', $lines[$i]);
    if (test($lines)) {
      echo $acc;
      exit(0);
    }
  }
  $lines[$i] = $save;

}

echo 'bad';
