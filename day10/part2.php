<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$target = max($lines);
$total = 0;

function test($jolt)
{
  global $total;
  global $lines;
  global $target;

  //echo "$jolt\n";

  if ($jolt == $target) {
    //echo ".";
    $total++;
    return;
  }

  $ok = FALSE;

  if (in_array($jolt+1, $lines)) {
    test($jolt + 1);
    $ok = TRUE;
  }
  if (in_array($jolt+2, $lines)) {
    test($jolt + 2);
    $ok = TRUE;
  }
  if (in_array($jolt+3, $lines)) {
    test($jolt + 3);
    $ok = TRUE;
  }

  if ($ok === FALSE) {
    echo "X";
  }
  //return FALSE;
  
}

test(0);
echo $total;
