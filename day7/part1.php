<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$bags = array();

while (true) {

  $count = count($bags);

  foreach ($lines as $line) {

    if (strlen($line) == 0) {
      continue;
    }

    $tok1 = explode('bags contain', $line);
    $tok2 = explode(',', $tok1[1]);

    $bag = trim($tok1[0]);
    //echo "$bag = ";


    foreach ($tok2 as $b) {
      $b = trim(str_replace('.', '', $b));
      $b = trim(str_replace('bags', '', $b));
      $b = trim(str_replace('bag', '', $b));
      if ($b == 'no other') continue;
      $tok3 = explode(' ', $b);
      $b = "$tok3[1] $tok3[2]";
      if (!in_array($bag, $bags)) {
        if ($b == 'shiny gold' || in_array($b, $bags, TRUE)) {
          //echo "$bag contains $b\n";
          $bags[] = $bag;
          break;
        }
      }
    }

    //echo "\n";

  }

  if (count($bags) == $count) {
    break;
  }

}

echo count($bags);
