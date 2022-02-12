<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Create Table Town</title>
    <?php
    /*
    $prodType = $_POST['productName'];*/
    function CreateTable(){
        $db = "towns";
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
            $conn = mysqli_connect($server,$user,$pword,$db);
            $sql = "CREATE TABLE towns.town ( ID INT NOT NULL AUTO_INCREMENT , name VARCHAR(255) NOT NULL , county VARCHAR(255) NOT NULL , PRIMARY KEY (ID)) ENGINE = InnoDB;";      
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
        $conn = CreateTable();
        if($conn == false){
            echo "Table could not be added";
        }
        else{
            echo "Table added";
        }
    ?>
</body>
</html>