<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Search For Towns</title>
    <?php
    $prodType = $_POST['productName'];
    function SetUpConnection(){
        $db = "towns";
        $server = "localhost";
        $user = "root";
        $pword= "";
        $success = true;
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
        try {
            $conn = mysqli_connect($server,$user,$pword,$db);
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
        $conn = SetUpConnection();
        if($conn == false){
                echo "Sorry";
        }
        else 
        {
            echo $prodType . "<br/>";
            //the following line adds an escape to any inserted attack data
            $prodType = $conn->real_escape_string($prodType);
            echo $prodType . "<br/>";
            $sql= "select from productID  producttype  where productName like '$prodType';";
            echo $sql."<br/>";
            //the following lines make sure the mysqli_query can throw an Exception!
            $driver = new mysqli_driver();
            $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
            try{
                if (($result = mysqli_query($conn,$sql))) {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo $row['productID'] ."<br/>";
                    }
                }
            }
            //The following line codes should give a legitimate user who has just hit a problem some idea of why
            catch(mysqli_sql_exception $e){
                echo "Exception caught for info on this sort of error please contact peter" ;//. $e;
                //$conn = false;
            }
            
        }
        
    ?>
</body>
</html>