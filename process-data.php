<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 5/1/2016
 * Time: 5:46 AM
 */
// Test if our data came through
if (isset($_POST["points"])) {
    // Decode our JSON into PHP objects we can use
    $points = json_decode($_POST["points"]);
    // Access our object's data and array values.
    echo "Data is: " . $points->name . "number".$points->number;
    echo "info".$points->info->name;
    $arr1=$points->arr;
    echo "1 element".$arr1[1];
   // echo "Point 1: " . $points->arPoints[0]->x . ", " . $points->arPoints[0]->y;
}


?>