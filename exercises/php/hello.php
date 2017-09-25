<?php
/**
 * Greets the user with the current date and time.
 */

//Create a date object http://php.net/manual/en/book.datetime.php from PHP's built
$date = new DateTime();

#Format the date http://php.net/manual/en/datetime.formats.date.php
$formattedDate = $date->format('Y-m-d h:i:s');

echo "Hello World it is {$formattedDate}";
