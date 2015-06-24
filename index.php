<?php
include('Config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
    <title>Encrypt a String</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
</head>

<body>
<div class="main">
    <form action="" method="post" name="form1" id="form1">
        Encrypt: <input type="password" name="test" class="no"> <input name="Submit" type="submit" class="no" value="Submit"><br>
        <?php
                if(isset($_POST['Submit'])){
                    function crypto($string){
                        $string1 = md5($string);
                        $string2 = sha1($string);
                        echo "MD5: $string1 <br>";
                        echo "SHA1: $string2 <br>";
                /*Select the DB */
                    /* Insert value into DB */
                    $sql = "INSERT INTO App_Seguranca_Descriptografia (id,senha, md5, sha1,hash) ".
                        "VALUES ('','$_POST[test]', '$string1', '$string2')";
                    /* Execute the Query*/
                    $sqli->query($sql,$connect);
                    }
                crypto($_POST[test]);
                };
                ?>
    </form>

    <div class="yes">Want to <a href="decrypt.php">Decrypt</a>?</div>
</body>
</div>
</html>
