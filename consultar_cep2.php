<?php

    //


    // CONEXÃO COM BANCO DE DADOS; 'host' 'user' 'senha' 'datatabase'
	$conection = mysqli_connect('localhost', 'root', '','cep');
	
    //CONDIÇÃO PARA VERIFICAR ERRO NO BANCO;
	if(!$conection){
		mysql_errno();
		echo "Erro conexão com banco.";


	}

    //FUNÇÃO PARA CARREGAR DADOS DA API VIACEP
    function webClient ($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //GET DA INFORMAÇÃO COLETADA DO USUÁRIO

    $cep = $_GET['cep'];

    $url = sprintf('http://viacep.com.br/ws/%s/json/ ', $cep);
    $result = json_decode(webClient($url));

    //CONDIÇÃO PARA VERIFICAR O CAMPO VAZIO DO CEP
if(empty($cep)){

    echo "Campo vazio ! Favor informar o CEP!";
    mysqli_close($conection);
}else{

    //SQL QUE VERIFICA NO BANCO SE JÁ EXISTE ESTE CEP

    $sql = mysqli_query($conection,"SELECT cep FROM cep_tab WHERE cep = $cep");


    //CONDIÇÃO PARA VERIFICAR SE JÁ HÁ ALGUM CADASTRO DESTE CEP, SE HOUVER, CARREGA DO BANCO COMO CACHE

    if(mysqli_num_rows($sql) > 0 ){
    echo "Dados carregados do banco";
    echo '<br>';
    echo '<br>';
    echo "CEP: ".$result->cep;
    echo '<br>';
    echo "Logradouro: ".$result->logradouro;
    echo '<br>';
    echo "Complemento : ".$result->complemento;
    echo '<br>';
    echo "Bairro: ".$result->bairro;
    echo '<br>';
    echo "Localidade: ".$result->localidade;
    echo '<br>';
    echo "UF: ".$result->uf;
    echo '<br>';
    echo "Unidade: ".$result->unidade;
    echo '<br>';
    echo "IBGE: ".$result->ibge;
    echo '<br>';
    echo "Guia: ".$result->gia;

    //SENÃO HOUVER, CRIA UM REGISTRO NO BANCO DAS INFORMAÇÕES

    }else if (mysqli_num_rows($sql) <= 0){
    $insert =mysqli_query ($conection,"INSERT INTO cep_tab  (cep, logradouro, complemento, bairro, localidade, uf, unidade, ibge, guia)VALUES ('$cep', '$result->logradouro', '$result->complemento', '$result->bairro', '$result->localidade', '$result->uf', '$result->unidade', '$result->ibge', '$result->gia')");

    echo "dados salvos no banco, carregados da API";
    echo '<br>';
    echo '<br>';
    echo "CEP: ".$result->cep;
    echo '<br>';
    echo "Logradouro: ".$result->logradouro;
    echo '<br>';
    echo "Complemento : ".$result->complemento;
    echo '<br>';
    echo "Bairro: ".$result->bairro;
    echo '<br>';
    echo "Localidade: ".$result->localidade;
    echo '<br>';
    echo "UF: ".$result->uf;
    echo '<br>';
    echo "Unidade: ".$result->unidade;
    echo '<br>';
    echo "IBGE: ".$result->ibge;
    echo '<br>';
    echo "Guia: ".$result->gia;
    }


}

    





 ?>

