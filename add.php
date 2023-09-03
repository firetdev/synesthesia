<?php
    $color = $_GET["color"];
    $num = $_GET["num"];
    $file = fopen($num.".txt", "a");
    fwrite($file, $color."\n");
    fclose($file);
    header("Location: index.php?num=".($num + 1));
?>