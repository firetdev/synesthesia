<?php
    $sub = $_GET["sub"];
    if($sub == "yes"){
        $color = $_GET["color"];
        $num = $_GET["num"];
        $file = fopen("../../synData/".$num.".txt", "a");
        fwrite($file, $color."\n");
        fclose($file);
    } else{
        $num = $_GET["num"];
    }
    header("Location: index.php?num=".($num + 1));
?>