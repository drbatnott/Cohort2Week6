<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Search For Towns</title>
    <?php
    function SetUpConnection($theDatabase){
        $server = "localhost";
        $user = "root";
        $pword= "";
        $success = true;
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
/*
// OR Method 2:
        //mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
*/
        $db = $theDatabase;
        try {
            $conn = mysqli_connect($server,$user,$pword,$db);
        } 
        catch(mysqli_sql_exception $e){
            echo "Exception caught " ;//. $e;
            $conn = false;
        }
        return $conn;
    }
    function AddToTable($conn,$theTable,$theFile){
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
        try {
            $myfile = fopen($theFile, "r") or die("Unable to open file!");
            while(!feof($myfile)){
                $input = fgets($myfile);
                if(str_contains($input,",")){
                    $split = explode(",",$input);
                    $sql = "insert into $theTable (name,county) values ('". $split[0] . "', '". $split[1] . "');";
                    echo $sql ."<br>";
                    mysqli_query($conn,$sql);
                }
            }
            fclose($myfile);
        } 
        catch(mysqli_sql_exception $e){
            echo "Exception caught " ;//. $e;
            $conn = false;
        }
        return $conn;
    }
    ?>
</head>
<body>
    <?php
        $theDB = "towns";
        $conn = SetUpConnection($theDB);
        if($conn != false){
            $theTb = "town";
            $file = "towns.csv";
            AddToTable($conn,$theTb,$file);
        }
        else
        {
            echo "An error occured<br/>";
        }     
    ?>
</body>
</html>