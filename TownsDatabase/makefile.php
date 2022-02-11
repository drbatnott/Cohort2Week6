<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Search For Towns</title>
    <?php
    /*
    $prodType = $_POST['productName'];*/
    function SetUpConnection(){
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
        } 
/*        try{
            $conn = mysqli_connect($server,$user,$pword,$db);
            if(mysqli_connect_errno()){
                throw new Exception(mysqli_connect_error);
                echo "Connection Failed: " . mysqli_connect_error;
              $success=false;
              exit();
            }
        }*/
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

    /*
    CREATE TABLE `towns`.`towntype` ( `ID` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `county` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;
    
        
        //$sql = "CREATE TABLE productType ( productID INT NOT NULL AUTO_INCREMENT , productName VARCHAR(255) NOT NULL , PRIMARY KEY (`productID`)) ENGINE = InnoDB;";
        //$result = mysqli_query($conn,$sql);
        $conn = SetUpConnection();
        if($conn == false){
                echo "Sorry";
        }
        else {
           // $myfile = fopen("products.txt", "r") or die("Unable to open file!");
        //$count = 0;
            //$sql1 = "insert into producttype (productName) values ('";
           // $sql1 = "update townmakes set productID = "
 /*           while(!feof($myfile))//this will loop while you have not reached the end of the file. feof means file end of file
            {
                $input = fgets($myfile);// like readline in C#
                if($input != ""){
                    
                    $sql = $sql1 . $input . "');";
                    echo "$sql<br/>";
                    $result = mysqli_query($conn,$sql);
                }
                //fwrite($myfile,$output);
            }
            fclose($myfile); 
        
               // $sql = "select towntype.name as name , towntype.county as county from towntype where county like '$prodType';";//, productType.productName as product from towntype, productType, townmakes where towntype.ID = townmakes.townID and productType.productID = townmakes.productID and productType.productName Like '".$prodType."' order by county asc;"; 
               $sql = "select townmakes.townID from townmakes;";
                if (($result = mysqli_query($conn,$sql))) {

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $sql1 = "update townmakes set productId = " .rand(1,18). " where townID = " .$row['townID'].";";
                        echo "$sql1 <br/>";
                        $result1 = mysqli_query($conn,$sql1);
                       // echo "Town ". $row['name']. " is  in County " .$row['county']."<br/>";
                    }
                }
            }
          */  

        //}//$prodType = 'cor%';
        /*catch(Exception $e){
            echo "Exception caught " . $e;
        }
        /*
             
        */
        $conn = SetUpConnection();
        $myfile = fopen("products.txt", "r") or die("Unable to open file!");
        //$myOtherFile = fopen("townsTab.txt","w") or die("Unable to open file!");
        $count = 1;
       while(!feof($myfile)){
           $input = fgets($myfile);
           $split = explode(",",$input);
           // echo "Town name ". $split[0] . " County name ". $split[1] . " town type ". $split[2] ."<br/>";
           $sql = "update producttype set productName = '". $split[0] . "' where productID = ". $count . ";";
           $count++;
           echo $sql ."<br>";
           $result1 = mysqli_query($conn,$sql);
           /* $sql = "select productID, productName from producttype;";
                if (($result = mysqli_query($conn,$sql))) {

                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "product ID ". $row['productID']. " Name *".$row['productName']."*<br/>";
                    }
                }*/
            //fwrite($myOtherFile,$tabbed);
        }
        fclose($myfile);
        //fclose($myOtherFile);
    ?>
</body>
</html>