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
        echo $this->getTitle();
    }
    function script($name)
    {
        if($this->scripts[$name]){
            $s=$this->scripts[$name];
            echo "<script src='$s'></script>";
        }
    }
}
$page = new index;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $page->getTitle()?></title>
</head>
<body>
<?php $page->script("jquery")?>
<?php $page->script("bootstrap")?>
</body>
</html>
