<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Search For Towns</title>
    <?php
    if(isset($_POST['findByProduct'])){
         $prodType = $_POST['productName'];
         $countyName = "";
    }
   else{
          if(isset($_POST['findByCounty'])){
                $countyName = $_POST['countyName'];
                $prodType = "";
          }
   }
    
    ?>
</head>
<body>
    <?php
        echo $prodType ." " . $countyName. "<br/>";
        
    ?>
</body>
</html>