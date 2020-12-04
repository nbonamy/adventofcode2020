<?php

$lines = file_get_contents('input.txt');
$lines = explode("\n", $lines);

$total = 0;
$expected = array('byr','iyr','eyr','hgt','hcl','ecl','pid');
$fields = array();
$valid = TRUE;
foreach ($lines as $line) {

  if (strlen($line) == 0) {
    if ($valid === TRUE && count(array_unique($fields)) == count($expected)) {
      $total++;
    }
    $fields = array();
    $valid = TRUE;
  } else if ($valid === TRUE) {
    $tokens = explode(' ', $line);
    foreach ($tokens as $token) {
      $words = explode(':', $token);
      $field = trim($words[0]);
      $value = trim($words[1]);
      if (in_array($field, $expected)) {
        $fields[] = $field;
        if ($field === 'byr') {
          if (strlen($value) != 4) $valid = FALSE;
          if (intval($value) < 1920) $valid = FALSE;
          if (intval($value) > 2002) $valid = FALSE;
        } else if ($field === 'iyr') {
          if (strlen($value) != 4) $valid = FALSE;
          if (intval($value) < 2010) $valid = FALSE;
          if (intval($value) > 2020) $valid = FALSE;
        } else if ($field == 'eyr') {
          if (strlen($value) != 4) $valid = FALSE;
          if (intval($value) < 2020) $valid = FALSE;
          if (intval($value) > 2030) $valid = FALSE;
        } else if ($field === 'hgt') {
          $unit = substr($value, strlen($value)-2);
          if ($unit == 'cm') {
            if (intval($value) < 150) $valid = FALSE;
            if (intval($value) > 193) $valid = FALSE;
          } else if ($unit === 'in') {
            if (intval($value) < 59) $valid = FALSE;
            if (intval($value) > 76) $valid = FALSE;
          } else {
            $valid = FALSE;
          }
        } else if ($field === 'hcl') {
          if (strlen($value) != 7) $valid = FALSE;
          if ($value[0] != '#') $valid = FALSE;
          if ($value != strtolower($value)) $valid = FALSE;
          if (ctype_xdigit(substr($value,1)) == FALSE) $valid = FALSE;
        } else if ($field === 'ecl') {
          if (!in_array($value, array('amb','blu','brn','gry','grn','hzl','oth'))) {
            $valid = FALSE;
          }
        } else if ($field === 'pid') {
          if (strlen($value) != 9) $valid = FALSE;
          if (ctype_digit($value) === FALSE) {
            $valid = FALSE;
          }
        }

        // print error
        if ($valid == FALSE) {
          //echo "$field:$value\n";
        }
      }

      if ($valid === FALSE) {
        break;
      }
    }
  }
}

echo $total;
