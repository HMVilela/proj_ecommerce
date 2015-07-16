<?php
 $data['nCdEmpresa'] = '';
 $data['sDsSenha'] = '';
 $data['sCepOrigem'] = '37540000';
 $data['sCepDestino'] = '37468000';
 $data['nVlPeso'] = '1';
 $data['nCdFormato'] = '1';
 $data['nVlComprimento'] = '16';
 $data['nVlAltura'] = '5';
 $data['nVlLargura'] = '15';
 $data['nVlDiametro'] = '0';
 $data['sCdMaoPropria'] = 's';
 $data['nVlValorDeclarado'] = '0';
 $data['sCdAvisoRecebimento'] = 'n';
 $data['StrRetorno'] = 'xml';
 //40010=SEDEX  41106=PAC
 $data['nCdServico'] = '40010,41106';
 $data = http_build_query($data);

 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

 $curl = curl_init($url . '?' . $data);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($curl);
 $result = simplexml_load_string($result);
 foreach($result -> cServico as $row) {
 //Os dados de cada serviço estará aqui
 if($row -> Erro == 0) {
     echo "Código: ",$row -> Codigo . '<br>';
     echo "Valor: ",$row -> Valor . '<br>';
     echo "Prazo de entrega: ",$row -> PrazoEntrega . '<br>';
     echo "Valor mão própria: ",$row -> ValorMaoPropria . '<br>';
     echo "Aviso de recebimento: ",$row -> ValorAvisoRecebimento . '<br>';
     echo "Valor declarado: ",$row -> ValorValorDeclarado . '<br>';
     echo "Entrega domiciliar: ",$row -> EntregaDomiciliar . '<br>';
     echo "Entrega aos sábados: ",$row -> EntregaSabado;
 } else {
     echo "Erro: ",$row -> MsgErro;
 }
 echo '<hr>';
 }

?>

<!DOCTYPE html>
<html>
    <head></head>
    <body></body>
</html>