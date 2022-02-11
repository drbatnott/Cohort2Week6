<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Read A File And Write to A File</title>
    <?php
        
        function ReadData(){
            $myfile = fopen("C:\\xampp\\htdocs\\cohort2\\FileReadAndWrite\\bin\\Debug\\net5.0\\ProductData.csv", "r") or die("Unable to open file!");
            while(!feof($myfile)){
                if(($input = fgets($myfile))!=""){
                //echo $input."<br/>";
                    $bits = explode(",",$input);
                    echo "<label>$bits[0] has image </label><image src='$bits[1]' alt='image of $bits[0]' /><br/>";
                }
            }
            fclose($myfile);
        }
    ?>
</head>
<body>
    <h1>Finding Errors in an Interpreted Language</h1>
    <?php
        ReadData();
    ?>
</body>
</html>