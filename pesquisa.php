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