<?php
    class apiconsultacnpj{

        // URL BASE PARA CONSULTAR NA API
        private $url_base = 'https://api-publica.speedio.com.br';
                
        
        public function consultarCnpj($cnpj){

            $parametros = "/buscarcnpj?cnpj=";

            $link = $this->url_base . $parametros . preg_replace("/\D/", '', $cnpj);

            $curl = curl_init();

            // CONFIGURAÇÃO CURL
            curl_setopt_array($curl, [
                CURLOPT_URL => $link,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_CUSTOMREQUEST  => "GET",
            ]);

            // CURL EXECUTAR
            $response_curl = curl_exec($curl);

            // RESPONSE IN ARRAY
            $response_array = json_decode($response_curl, true);

            if (isset($response_array['detail'])){
                die("<h1> Serviço Indisponivel </h1>");
            }

            if (isset($response_array['error'])){
                die("<h1> CNPJ não encontrado </h1>");
            }
            
            return is_array($response_array)? $response_array : [];         
            
        }

    }

?>

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
    <h1>Consumindo API SPEEDIO | CNPJ: <a href="https://apiconsultacnpj.com.br/">Site da Api</a></h1>
    <?php

        $cnpj = "00000000000-1.9";
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





















