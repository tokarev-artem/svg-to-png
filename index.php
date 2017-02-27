<?php

if(isset($_GET['url']))

{

    $link=$_GET['url'];
    $file = basename($link);
    $file = basename($link, ".svg");
    $path="files/";
    $im = new Imagick();
    $svg = file_get_contents($link);
    $im->readImageBlob($svg);
    $im->setImageFormat("png24");
    $im->writeImage("files/$file.png");
    $im->clear();
    $im->destroy();

}

    $url = ("http://example.com/convert/files/");
    $result = ("$url" . "$file" . ".png");
    $arr = array('url' => $result);

    echo json_encode($arr);

?>
