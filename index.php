<!DOCTYPE html>
<html>
    <head>
        <title>What Color Is This Sound?</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1 id="title">What Color Is This Sound?</h1>
        <br><div id="vid">
            <?php
                $num = $_GET["num"];
                if($num == 1){
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/O4irXQhgMqg?si=6kZUKpy657gica9X&amp;controls=0&amp;clip=UgkxQi4qu3zGbwmqU5mvIsKOTBRAh_712zo_&amp;clipt=EAAYjjg&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
                if($num == 2){
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/wp43OdtAAkM?si=te0_qMAKLGgUKIDg&amp;controls=0&amp;clip=UgkxzWL-SsX2m8vhPIxaAIuLOqSHTTu0jQXD&amp;clipt=ELhJGJh1&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
                if($num == 3){
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/FSjZ7dZVi90?si=UwaLPwBGLrGXA3Ob&amp;controls=0&amp;clip=UgkxPifXYhXAKFv2ABu6kU74BPLSoCNTQmxD&amp;clipt=EAAYjjg&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
                if($num == 4){
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/AnNKsk2a0fI?si=Fz7OM-1pQWLzd6Fs&amp;controls=0&amp;clip=UgkxAspZ7gyudtiRSMYFEZOPzgpaa-QPDtg2&amp;clipt=EAAYsSs&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
                if($num == 5){
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=1VYSHY-twD7LeImT&amp;controls=0&amp;clip=Ugkxk4ujU4eKKCJGI73BO64OzCFmUD95HyI0&amp;clipt=EAAYtjk&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
            ?>
        </div>
        <form action="add.php" method="get">
            <input type="color" id="color" name="color" value="#ff0000">
            <?php
                echo '<input type="hidden" name="num" value="'.$_GET["num"].'">';
            ?>
            <input type="hidden" name="sub" value="yes">
            <input type="submit" value="Submit!">
        </form>
        <form action="add.php" method="get">
            <input type="hidden" name="color" value="#ff0000">
            <?php
                echo '<input type="hidden" name="num" value="'.$_GET["num"].'">';
            ?>
            <input type="hidden" name="sub" value="no">
            <input type="submit" value="Skip">
        </form>
        <div id="answers">
            <?php
                $num = $_GET["num"];
                $number = 0;
                if(!isset($num) || empty($num)){
                    echo "Invalid input!";
                } else{
                $filename = $num.".txt";
                if(file_exists($filename)){
                    $input = fopen($filename, "r");
                    if($input){
                        while(!feof($input)){
                            $color = fgets($input);
                            if($color !== false){
                                echo "<div class='ans' style='background-color:".$color.";'></div>";
                                $number++;
                                if($number > 14){
                                    $number = 0;
                                    echo "<br>";
                                }
                            }
                        }
                        fclose($input);
                    } else{
                        echo "Failed to open the file.";
                    }
                } else{
                    echo "No responses yet";
                }
            }
            ?>
        </div>
    </body>
</html>