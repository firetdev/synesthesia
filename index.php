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
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/O4irXQhgMqg?si=6kZUKpy657gica9X&amp;controls=0&amp;clip=UgkxQi4qu3zGbwmqU5mvIsKOTBRAh_712zo_&amp;clipt=EAAYjjg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>';
                }
            ?>
        </div>
        <form action="add.php" method="get">
            <input type="color" id="color" name="color" value="#ff0000">
            <input type="hidden" id="num" name="num" value="1">
            <input type="submit" value="Submit!">
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
                    echo "File not found.";
                }
            }
            ?>
        </div>
    </body>
</html>