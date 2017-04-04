<?php

/**
 * Created by PhpStorm.
 * User: cit
 * Date: 4/4/2017
 * Time: 8:30 AM
 */
class index
{
    private $title;
    public $scripts;
    function __construct()
    {
        $this->title = "Butte College Arduino Day";
        $this->scripts = json_decode(file_get_contents("scripts.json"),true,2);
    }
    function getTitle(){
        return $this->getTitle();
    }
    function script($name)
    {

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?
$test = new index();
var_dump($test->scripts);
?>
</body>
</html>
