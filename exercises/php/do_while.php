<?php

$items = array(
  'for',
  'foreach',
  'while',
  'do-while'
);

echo 'PHP Supports ' . count($items) . ' of loops.';

$i = 0;
$li=null;
do {
  $li .= "<li>{$items[$i++]}</li>";
} while ($i > 0);
