<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Search For Towns</title>
    <?php
    function CreateDbase(){
        //$db = "towns";
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
        try {
            $conn = mysqli_connect($server,$user,$pword);
            $sql = "create database towns;";
            mysqli_query($conn,$sql);
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

        CreateDbase();
    ?>
</body>
</html>