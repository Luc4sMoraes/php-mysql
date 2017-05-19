<!DOCTYPE html>
<html>
<head><title>Conversão Numeros Binários flutuantes</title></head>
<body>

<form method="POST">

<fieldset><legend>Conversão Numeros Binarios com virgula</legend>
<label for="num">Digite o numero Binario </label></span><input type="number" name="num" id="num">
<p>
<?php
if(isset($_POST["num"])){
$num = $_POST["num"];

// Converte a variavel a em array;
$num = str_split($num);
$resultado = 0;
echo "Valor Binario: ". $_POST["num"]."</br>";

if($num[0] == 0 ){
	
	foreach ($num as $chave =>$valor) {
	
	echo $valor ."*"." (2 elevado a ".$chave .")"." = ".$valor*(2**-$chave) . "</br>";
	$resultado += $valor*(2**-$chave);
	
}
	echo "Valor Decimal = ".$resultado . "</br>";
		}else{
			$n = count($num) -1;
			$i = 0;
			for($n;$n>=0;$n--){
				
				$v =  $num[$n] * 2**$i;
				echo $num[$n]."* (2 elevado ".$v . ") = " . $v . "</br>";
				$resultado += $v;
				$i++;
			};
			echo "Valor em Decimal: ". $resultado;
			
		};			
}
?>
</fieldset>
</form>
</body>
</html>