<?php
  // креирање на променливи
  $gumi = $_POST['gumi'];
  $nafta = $_POST['nafta'];
  $akumulatori = $_POST['akumulatori'];
  $pronajdi = $_POST['pronajdi'];
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Веб продавница za автоделови - Преглед на нарачката</title>
</head>
<body>
<h1>Веб продавница za автоделови</h1>
<h2>Резултати од нарачката</h2>
<?php

	date_default_timezone_set('Europe/Skopje');
	echo date("l jS \of F Y h:i:s A"). "<br>";
		
	$t=time();
    echo (date("l jS \of F Y h:i:s A", $t)) . "<br>";
	echo "<p>Вашата нарачка е: </p>";

	$vkupnakolicina = 0;
	$vkupnakolicina = $gumi + $nafta + $akumulatori;
	echo "Нарачани ставки: ".$vkupnakolicina."<br />";


	if ($vkupnakolicina == 0) {
	  echo "Не нарачавте ништо на претходната страница!<br />";
	} else {
	  if ($gumi > 0) {
		echo $gumi." гуми<br />";
	  }
	  if ($nafta > 0) {
		echo $nafta." шишиња со нафта<br />";
	  }
	  if ($akumulatori > 0) {
		echo $akumulatori." акумулатори<br />";
	  }
	}

	$vkupnakolicina = 0.00;

	define('CENAGUMI', 100);
	define('CENANAFTA', 10);
	define('CENAAKUMULATORI', 4);

	$vkupnakolicina = $gumi * CENAGUMI
				 + $nafta * CENANAFTA
				 + $akumulatori * CENAAKUMULATORI;

	echo "Вкупно: $".number_format($vkupnakolicina,2)."<br />";

	$danocnastapka = 0.15;  
	
	$ddv = ($vkupnakolicina * $danocnastapka)+ $vkupnakolicina;
	echo "Вкупно вклучувајќи ддв: $".number_format($ddv,2)."<br />";
	
	$ddv = $vkupnakolicina *15/100 + $vkupnakolicina;
	echo "Вкупно вклучувајќи ддв: $".number_format($ddv,2)."<br />";
	
	if($pronajdi == "a") {
	  echo "<p>Редовен корисник.</p>";
	} elseif($pronajdi == "b") {
	  echo "<p>Клиент посочен од страна на ТВ реклама.</p>";
	} elseif($pronajdi == "c") {
	  echo "<p>Клиент посочен од страна на рекламирање преку телефон.</p>";
	} elseif($pronajdi == "d") {
	  echo "<p>Клиент посочен од страна на комуникација.</p>";
	} else {
	  echo "<p>Не знаеме како корисникот не пронајдел.</p>";
	}
?>
</body>
</html>
