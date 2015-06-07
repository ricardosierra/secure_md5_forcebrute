<?php
include('Config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
    <title>Decrypt Password:</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body><div class="main">
    <form action="" method="post">
        Decrypt:<input type="text" name="decrypt" class="no">
        Hash: <input type="text" name="hash" value="{senha}" class="no"><input name="Submit" type="submit" value="Submit" class="no">
    </form><div class="yes"><?php
    
    
    
    
    
    
require('sql.php');
if(isset($_POST['Submit'])){
    /*Select the DB */
    mysql_select_db("Sierra_App", $connect);
    $sql = mysql_query("SELECT * FROM App_Seguranca_Descriptografia WHERE hash='$_POST[hash]' AND (md5 = '$_POST[decrypt]' OR sha1 = '$_POST[decrypt]') LIMIT 1");
    while($row = mysql_fetch_array($sql))
    {
        echo $_POST['decrypt'].": ".$row['senha']."<br>"; exit;
    }
}

?>
        
        
        
        
        
        
</body>
</div>
</div>
</html>
