<!DOCTYPE html>
<html>
    <head>
        <title>What Color Is This Sound?</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1 id="title">What Color Is This Sound?</h1>
        <div id="vid"></div>
        <form action="add.php" method="get">
            <input type="color" id="color" name="color" value="#ff0000">
            <input type="hidden" id="num" name="num" value="1">
            <input type="submit" value="Submit!">
        </form>
        <div id="answers">
            <?php
                $num = $_GET["num"];
                if(!isset($num) || empty($num)){
                    echo "Invalid input!";
                } else{
                $filename = $num . ".txt";
                if(file_exists($filename)){
                    $input = fopen($filename, "r");
                    if($input){
                        while(!feof($input)){
                            $color = fgets($input);
                            if($color !== false) {
                                echo "<div class='ans' style='background-color:" . $color . ";'></div><br>";
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