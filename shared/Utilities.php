<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 5/14/2016
 * Time: 6:02 PM
 */
class Utilities {
    public static function CreateUniqueId($prefix) {
        return uniqid ($prefix,true);
    }
}


?>