<?php

/**
 * Created by PhpStorm.
 * User: walterwinser
 * Date: 3/31/17
 * Time: 8:55 PM
 */
if($_GET['done']){
    $myfile = file_put_contents("data.txt", "0,0");
}