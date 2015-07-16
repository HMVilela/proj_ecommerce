<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>

$(function(){
	$("#btn").click(function(){

		var a = $("input[name=num_a]").val();
		var b = $("input[name=num_b]:checked").val();
		var c = $("input[name=num_c]").val();
		var d = $("input[name=num_d]").val();
		var e = $("input[name=num_e]").val();
		var f = $("input[name=num_f]").val();
		
		$.ajax({
			
			type: "POST",
			data: { destino:a, tipo:b, largura:c, comprimento:d, altura:e, peso:f },
			
			url: "ajax.php",
			dataType: "html",
			success: function(result){
				$("#resultado").html('');
				$("#resultado").append(result);
			},
			beforeSend: function(){
		  	  	$('#carregar').css({display:"block"});
		  	},
	  	    	complete: function(msg){
		  	  	$('#carregar').css({display:"none"});
		  	}
	 	});
	});
});

</script>



<input type="text" placeholder="CEP" name="num_a" required/>
<input type="radio" name="num_b" value="40010" /> SEDEX
<input type="radio" name="num_b" value="41106"/> PAC

<input type="hidden" placeholder="Largura" value="11" name="num_c" />
<input type="hidden" placeholder="Comprimento" value="16" name="num_d" />
<input type="hidden" placeholder="Altura" value="15" name="num_e" />
<input type="hidden" placeholder="Peso" value="1" name="num_f" />

<button id="btn">Calcular</button> 


<div id="carregar" style="display: none;">Carregando...</div>
<div id="resultado"></div>