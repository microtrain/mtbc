<?php
//Probably not a good example for production.
//allow up to two strings with dot concatenation any letter, any case any number with _- before the @
//require @
//allow up to two strings with dot concatenation any letter, any case any number with - after the at
//require at least 2 letters and only letters for the domain
$validEmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

$data = $_POST;

$errors = [];
foreach($data as $key => $value){
  echo "{$key} = {$value}<br><br>";

  switch($key){
      case 'email':
        if(preg_match($validEmail, $value)!==1){
            $errors[$key] = "Invalid email";
        }

      break;

      default:
        if(empty($value)){
            $errors[$key] = "Invalid {$key}";
        }
      break;
  }

}

var_dump($errors);
