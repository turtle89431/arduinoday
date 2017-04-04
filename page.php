<?php

/**

 * User: Walter
 * Date: 4/4/2017
 * Time: 12:36 PM
 */
class Page
{

    private $title;
    public $scripts;
    function __construct()
    {
        $this->title = "Butte College Arduino Day";
        $this->scripts = json_decode(file_get_contents("scripts.json"),true,2);
    }
    function getTitle(){
        echo $this->title;
    }
    function script($name)
    {
        if($this->scripts[$name]){
            $s=$this->scripts[$name];
            echo "<script src='$s'></script>";
        }
    }
}


