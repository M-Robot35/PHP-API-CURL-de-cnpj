
<?php include_once "./pesquisa.php";?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CONSUMINDO API |THIAGO TELES</title>
    
    <style>
        

    </style>
</head>
<body>
    <a href="./index.php">pagina principal [Teste ]</a><br><br>
    <a href="./sessao.php">Area de sessao [Teste ]</a>
    <br>
    <hr>
    <h1>Consumindo API SPEEDIO | CNPJ: <a href="https://apiconsultacnpj.com.br/">Site da Api</a></h1>
    <?php

        $cnpj = "00000000000191";
        $consultar = new apiconsultacnpj;
        $result = $consultar->consultarCnpj($cnpj);

        // SE FOR ARRAY E FOR DIFERENTE DE VAZIO  MOSTRA
        if(!empty($result) and (is_array($result))){

            echo "<pre>";
                echo "CNPJ: " . $cnpj . "<br>";
                echo "Razão Social: " . $result['RAZAO SOCIAL']. "<br>";
                echo "Nome Fantasia: " . $result['NOME FANTASIA']. "<br>";
                echo "Municipip: " . $result['MUNICIPIO']. "<br>";
                echo "Endereço: " . $result['COMPLEMENTO']. "<br>";
                
            echo "</pre>";                

        }else{
            echo "Error <br>";
            echo $result;
        }

        
    ?>
</body>
</html>





















