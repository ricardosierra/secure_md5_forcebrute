<?php
include('Config.php');




$i = 0;
$senha_repetida = false;



$md5 = '';
// Gera uma Senha Aleatória muito segura, e cria um md5 dela..
// Fica Processando Semanas ou Meses Até achar a resposta pra Essa Senha.
// Enquanto faz isso cria um super banco de dados com todas as senhas em md5 e sha1.
// Quando atingir centenas de terabytes, voce poderá procurar por qualquer md5, 
// e ele te dará uma senha válida para abrilo
$achar = md5(Classes\Funcao::Gerar_Senha(8));
while($md5!==$achar){
    
    ++$i;
    
    // Gera Senha e Armazena na Variavel Senha
    $senha = Classes\Funcao::Gerar_Senha(
            rand(4, 32), // Tamanho da Senha -> Aleatorio de 4 até 32
            rand(0, 10) // Força da Senha -> Aleatorio de 0 até 10
    );
    // Criptografa a Senha em MD5 e em SHA1
    $md5 = md5($senha);
    $sha1 = sha1($senha);
    
    /* Verifica se a senha existe no Banco de Dados */
    $query_result = $sqli->query("SELECT * FROM App_Seguranca_Descriptografia WHERE senha = '$senha' LIMIT 1");
    $repetiu = false;
    
    if($query_result){
        // Enquanto existir resultado.
        while($row = $query_result->fetch_object())
        {
            $repetiu = true;
            $senha_repetida = true;
            echo '<br><b>Senha Repetida:</b> '.$senha;
            echo '<br><b>Md5:</b> '.$md5;
            echo '<br><b>Sha1:</b> '.$sha1;
            echo '<br><br>';
        }
    }
    
    //
    if($repetiu===false){
        /* Insert value into DB */
        $sql = "INSERT INTO App_Seguranca_Descriptografia (senha, md5, sha1) ".
            "VALUES ('$senha', '$md5', '$sha1')";
        /* Execute the Query*/
        $sqli->query($sql);
        /*echo '<br><b>Senha Gerada:</b> '.$senha;
        echo '<br><b>Md5:</b> '.$md5;
        echo '<br><b>Sha1:</b> '.$sha1;
        echo '<br><br>';*/
    }
} 

if(!$senha_repetida)
header('Location: '.SISTEMA_ENDERECO);