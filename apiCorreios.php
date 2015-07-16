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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
    <title>API</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <script type="text/javascript" src="assets/jsProject/api/js/Ajax.js"></script>
    <script type="text/javascript" src="assets/jsProject/api/js/Index.js"></script> 
</head>
<body>
<form action="" id="frmCEP" method="post">
  <fieldset>
  	<legend>Calcular Frete</legend>
		
		<div class="cep">
			<label for="cep">CEP</label>:
			<input type="text" name="cep" id="cep" /> ex.: 
			<span>xxxxx-xxx</span>
			<button>Calcular Frete</button>
		</div>
		<!--
		<div class="rua">
			<label for="rua">Rua</label>:
			<input type="text" name="rua" id="rua" />
		</div>
		
		<div class="numero">
			<label for="numero">N&deg;</label>:
			<input type="text" name="numero" id="numero" size="3" />
		</div>
		
		<div class="complemento">
			<label for="complemento">Complemento</label>:
			<input type="text" name="complemento" id="complemento" />
		</div>
		
		<div class="bairro">
			<label for="bairro">Bairro</label>:
			<input type="text" name="bairro" id="bairro" />
		</div>-->
		
		<div class="cidade">
			<label for="cidade">Cidade</label>:
			<input type="text" name="cidade" id="cidade" />
		</div>
		
		<div class="estado">
			<label for="estado">Estado</label>:
			<input type="text" name="estado" id="estado" size="2" />
		</div>
		
		<div class="botoes">
			<!--<button type="submit">Cadastrar</button>-->
			<button type="reset">Limpar</button>
		</div>
		
  </fieldset>
</form>

</body>
</html>