<?php

$data = $_POST;

foreach($data as $key => $value){
  echo "{$key} = {$value}<br><br>";
}
