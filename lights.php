<?php
/**
 * Created by PhpStorm.
 * User: walterwinser
 * Date: 3/28/17
 * Time: 9:22 PM
 */
$lights = [16,5,4,0,2,14,12,13,15,3,1];
$useron=($_GET['on'])?$_GET['on']:null;
$pins;
if($useron){
    //$pins=explode(",",$useron);
    var_dump($pins);
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
<form action="lights.php" method="get">
    <div>0<input type="checkbox" name="on[0]" value="0">1<input type="checkbox" name="on[1]" value="1">2<input type="checkbox" name="on[2]"
                                                                                              value="2"></div>
    <div>3<input type="checkbox" name="on[3]" value="3">4<input type="checkbox" name="on[4]" value="4">5<input type="checkbox" name="on[5]"
                                                                                              value="5"></div>
    <div>6<input type="checkbox" name="on[6]" value="6">7<input type="checkbox" name="on[7]" value="7">8<input type="checkbox" name="on[8]"
                                                                                              value="8"></div>
    <input type="submit" value="submit">
</form>
</body>
</html>
