<?php
include('Config.php');
    
    
require('sql.php');
$i = 0;
while($i<10000){
    $senha = Classes\Funcao::Gerar_Senha($tamanho, 8);
    /*Select the DB */
    mysql_select_db("Sierra_App", $connect);
    $sql = mysql_query("SELECT * FROM App_Seguranca_Descriptografia WHERE senha = '$senha' LIMIT 1");
    $achou = false;
    while($row = mysql_fetch_array($sql))
    {
        $achou = true;
    }
    if($achou===false){
        $md5 = md5($senha);
        $sha1 = sha1($senha);
    }
    /* Insert value into DB */
    $sql = "INSERT INTO App_Seguranca_Descriptografia (senha, md5, sha1) ".
        "VALUES ('$senha', '$md5', '$sha1')";
    /* Execute the Query*/
    mysql_query($sql,$connect);
} 