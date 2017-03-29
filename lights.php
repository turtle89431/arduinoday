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
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get">
    <div>0<input type="checkbox" name="on[]" id="">1<input type="checkbox" name="on[]" id="">2<input type="checkbox" name="on[]"
                                                                                              id=""></div>
    <div>3<input type="checkbox" name="on[]" id="">4<input type="checkbox" name="on[]" id="">5<input type="checkbox" name=""
                                                                                              id=""></div>
    <div>6<input type="checkbox" name="" id="">7<input type="checkbox" name="" id="">8<input type="checkbox" name=""
                                                                                              id=""></div>
    <input type="submit" value="">
</form>
</body>
</html>
