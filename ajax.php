<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
$ceporigem = "88101000"; //  CEP DE ORIGEM
require_once('RsCorreios.php');

$frete = new RsCorreios();
$destino = $_POST['destino'];
$servico = $_POST['tipo'];

$largura = $_POST['largura'];
$comprimento = $_POST['comprimento'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];

if($servico == '41106') { 
$resposta = $frete
    ->setCepOrigem($ceporigem)
    ->setCepDestino($destino)
    ->setLargura($largura)
    ->setComprimento($comprimento)
    ->setAltura($altura)
    ->setPeso($peso)
    ->setFormatoDaEncomenda(RsCorreios::FORMATO_CAIXA)
    ->setServico(empty($tipo) ? RsCorreios::TIPO_PAC : $data['tipo'])
    ->dados();
}
if($servico == '40010') { 
$resposta = $frete
    ->setCepOrigem($ceporigem)
    ->setCepDestino($destino)
    ->setLargura($largura)
    ->setComprimento($comprimento)
    ->setAltura($altura)
    ->setPeso($peso)
    ->setFormatoDaEncomenda(RsCorreios::FORMATO_CAIXA)
    ->setServico(empty($tipo) ? RsCorreios::TIPO_SEDEX : $data['tipo'])
    ->dados();
}

function busca_cep($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
}  
$resultado_busca = busca_cep($destino);  

if($servico == '40010') {
$serviconome = "SEDEX";
}
if($servico == '41106') {
$serviconome = "PAC";
}


// Imprime na tela o resultado obtido:

echo "Servi&ccedil;o: " . $resposta['servico'] . " <br />";
echo "Servi&ccedil;o: " . $serviconome . " <br />";
echo "Cidade: " . $resultado_busca['cidade'] . " <br />";
echo "UF: " . $resultado_busca['uf'] . " <br />";

echo "Valor do Frete: " . $resposta['valor'] . " <br />";
echo "Prazo de Entrega: " . $resposta['prazoEntrega'] . " <br />";
echo "M&atilde;o Pr&oacute;pria: " . $resposta['maoPropria'] . " <br />";
echo "Aviso de Recebimento: " . $resposta['avisoRecebimento'] . " <br />";
echo "Valor Declarado: " . $resposta['valorDeclarado'] . " <br />";
echo "Entrega Domiciliar: " . $resposta['entregaDomiciliar'] . " <br />";
echo "Entrega S&aacute;bado: " . $resposta['entregaSabado'] . " <br />";
echo "Erro: " . $resposta['erro'] . " <br />";
echo "Mensagem de Erro: " . $resposta['msgErro'];
