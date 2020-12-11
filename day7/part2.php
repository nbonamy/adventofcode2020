<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$bags = array();

foreach ($lines as $line) {

  if (strlen($line) == 0) {
    continue;
  }

  $tok1 = explode('bags contain', $line);
  $tok2 = explode(',', $tok1[1]);

  $bag = trim($tok1[0]);

  $bags[$bag] = array();

  foreach ($tok2 as $b) {
    $b = trim(str_replace('.', '', $b));
    $b = trim(str_replace('bags', '', $b));
    $b = trim(str_replace('bag', '', $b));
    if ($b == 'no other') continue;
    $tok3 = explode(' ', $b);
    $count = intval($tok3[0]);
    $b = "$tok3[1] $tok3[2]";
    $bags[$bag][] = array($count, $b);
  }

}

function c($bags, $bag) {

  $total = 1;
  $arr = $bags[$bag];
  for ($i=0; $i<count($arr); $i++) {
    $total += intval($arr[$i][0]) * c($bags, $arr[$i][1]);
  }
  return $total;

}

echo c($bags, 'shiny gold')-1;
