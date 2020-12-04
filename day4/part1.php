<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$total = 0;
$expected = array('byr','iyr','eyr','hgt','hcl','ecl','pid');
$fields = array();

foreach ($lines as $line) {

  if (strlen($line) == 0) {
    if (count(array_unique($fields)) == count($expected)) $total++;
    $fields = array();
  } else {
    $tokens = explode(' ', $line);
    foreach ($tokens as $token) {
      $words = explode(':', $token);
      if (in_array($words[0], $expected)) {
        $fields[] = $words[0];
      }
    }
  }
}

echo $total;
