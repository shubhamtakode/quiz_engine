<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 5/1/2016
 * Time: 6:41 AM
 */
printf("uniqid(): %s\r\n", uniqid());

//creates a unique id with the 'about' prefix
$a = uniqid("about");
echo $a;
echo "<br>";

//creates a longer unique id with the 'about' prefix
echo "more entroy";
$b = uniqid ("",true);
echo $b."length:".strlen($b);
echo "<br>";

//creates a unique ID with a random number as a prefix - more secure than a static prefix
$c = uniqid (rand(), true);
echo $c;
echo "<br>";

//this md5 encrypts the username from above, so its ready to be stored in your database
$md5c = md5($c);
echo $md5c;
echo "<br>";
?>