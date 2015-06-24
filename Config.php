<?php
define('SISTEMA_LINGUAGEM_PADRAO', 'pt_BR');
define('SISTEMA_SERVIDOR', $_SERVER['SERVER_NAME']);
define('SISTEMA_ENDERECO', $_SERVER['REQUEST_URI']);

define('DS', DIRECTORY_SEPARATOR);
define('US', '/'); // Divisor de URL
define('ROOT'    , realpath(dirname(__FILE__)). DS);
define('DIR_CLASSES'    , ROOT.'Classes'. DS);
define('LIB_PATH',         ROOT.'libs'.DS);
define('LANG_PATH',         ROOT.'i18n'.DS);

require ROOT.'sql.php';
require DIR_CLASSES.'Funcao.php';

if(isset($_GET['tamanho']) && isset($_GET['forca'])){
    $tamanho = (int) $_GET['tamanho'];
    $forca = (int) $_GET['forca'];
    $senha = \Classes\Funcao::Gerar_Senha($tamanho, $forca);
    
    echo json_encode($senha);
    exit;
}


/**
 * Carrega Funções de Internaciolização
 */
$textdomain = "Framework";
if (isset($_GET['locale']) && !empty($_GET['locale'])){
    define('SISTEMA_LINGUAGEM', \Classes\Funcao::anti_injection($_GET['locale']));
}else{
    define('SISTEMA_LINGUAGEM', SISTEMA_LINGUAGEM_PADRAO);
}
putenv('LANGUAGE=' . SISTEMA_LINGUAGEM);
putenv('LANG=' . SISTEMA_LINGUAGEM);
putenv('LC_ALL=' . SISTEMA_LINGUAGEM);
putenv('LC_MESSAGES=' . SISTEMA_LINGUAGEM);
require_once(LIB_PATH.'i18n'.DS.'gettext.inc');
_setlocale(LC_ALL, SISTEMA_LINGUAGEM);
_setlocale(LC_CTYPE, SISTEMA_LINGUAGEM);
_bindtextdomain($textdomain, LANG_PATH);
_bind_textdomain_codeset($textdomain, 'UTF-8');
_textdomain($textdomain);
function _e($string) {
  echo __($string);
}

if(stripos(SISTEMA_ENDERECO, '?')===false){
    define('SISTEMA_URL_ATUAL', "http://" . SISTEMA_SERVIDOR . SISTEMA_ENDERECO.'?locale='.SISTEMA_LINGUAGEM_PADRAO);
}else{
    define('SISTEMA_URL_ATUAL', "http://" . SISTEMA_SERVIDOR . SISTEMA_ENDERECO);
}




@$Conexao_Mysqli  =   new mysqli(SIS_SERVER, SIS_USUARIO, SIS_SENHA, SIS_BANCO);
$sqli = &$Conexao_Mysqli;
if (mysqli_connect_errno()) {
    throw new Exception('Erro de Conexão: '.mysqli_connect_error(),3100);
}
/* change character set to utf8 */
if (!$Conexao_Mysqli->set_charset("utf8")) {
    throw new Exception('Erro mysql set_charset utf8: '.$Conexao_Mysqli->error,3105);
}
if (!$Conexao_Mysqli->query("SET NAMES 'utf8'")) {
    throw new Exception('Erro mysql SET NAMES utf8: '.$Conexao_Mysqli->error,3101);
}
if (!$Conexao_Mysqli->query("SET character_set_connection=utf8")) {
    throw new Exception('Erro character_set_connection=utf8: '.$Conexao_Mysqli->error,3102);
}
if (!$Conexao_Mysqli->query("SET character_set_client=utf8")) {
    throw new Exception('Erro character_set_client=utf8: '.$Conexao_Mysqli->error,3103);
}
if (!$Conexao_Mysqli->query("SET character_set_results=utf8")) {
    throw new Exception('Erro character_set_results=utf8: '.$Conexao_Mysqli->error,3104);
}
function Visual_Erro($erro){
    var_dump($erro);
    exit;
}

?>