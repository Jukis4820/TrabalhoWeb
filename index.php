<?php
if (isset($_GET['lang'])) {
    setcookie("idioma", $_GET['lang'], time() +259200);
    header("Location: index.php");
    exit;
}

if (isset($_COOKIE["idioma"])) {

    $conteudo_portugues = "<b>EMPRESA</b><br>A XXX INDÚSTRIA DE MÁQUINAS LTDA, foi fundada em 1970, e tornou-se o mais importante e tradicional fabricante de máquinas ensacadeiras no Brasil.";
    $conteudo_ingles = "<b>OUR PLANT</b><br>The XXX INDÚSTRIA DE MÁQUINAS LTDA, was founded in 1970, and became the most important and traditional supplier of BAGGING MACHINES in Brazil.";
    $conteudo_espanhol = "<b>EMPRESA</b><br>La XXX INDÚSTRIA DE MÁQUINAS LTDA, fue fundada en 1970, y se ha convertido en la más importante y tradicional fábrica de MÁQUINAS ENSACADORAS en Brasil.";

   
    switch ($_COOKIE["idioma"]) {
        case 'portugues':
            $conteudo = $conteudo_portugues;
            break;
        case 'ingles':
            $conteudo = $conteudo_ingles;
            break;
        case 'espanhol':
            $conteudo = $conteudo_espanhol;
            break;
        default:
            $conteudo = "Idioma não reconhecido.";
            break;
    }

  
    file_put_contents("versao.txt", $conteudo);

    $conteudo_gravado = file_get_contents("versao.txt");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trabalho Web</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
   <div class="titulo">
    <h1><center>Bem Vindo ao Site de Web Design em Foco</center></h1>
   </div>
   <br><br>
   
    <div class="conteudo">
        <h2><center>Escolha o idioma para entrar</center></h2>
    </div>

    <?php
  
    if (isset($_COOKIE["idioma"])) {
        echo "<p>Idioma selecionado: " . htmlspecialchars($_COOKIE["idioma"]) . "</p>";
        echo "<div>$conteudo_gravado</div>";
        echo '<p><a href="index.php?delete_cookie=true">Escolher outro idioma</a></p>';
    } 
    else {
    
        echo '
        <center>
            <a href="index.php?lang=ingles">
                <img src="img/eua.png" alt="Inglês" width="10%" height="10%">
            </a> 
            <a href="index.php?lang=portugues">
                <img src="img/brasil.png" alt="Português" width="10%" height="10%">
            </a> 
            <a href="index.php?lang=espanhol">
                <img src="img/espanha.png" alt="Espanhol" width="10%" height="10%">
            </a>
        </center>';
    }

   
    if (isset($_GET['delete_cookie'])) {
        setcookie("idioma", "", time() - 3600); 
        header("Location: index.php");
        exit;
    }
    ?>
   
    <script src="" async defer></script>
</body>
</html>
