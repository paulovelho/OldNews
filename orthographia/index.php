<?php

	$guaranaComRolha = "Orhtographyze seu texto para 1915!";
	$texto = $_POST["texto"];

	if(!empty($texto)) {
		$guaranaComRolha = $texto;
		$trans = array(
			"/ação/i" => "acção",
			"/ações/i" => "acções",
			"/atividade/i" => "actividade",
			"/\bato\b/i" => "acto",
			"/adiante/i" => "adeante",
			"/alfabeto/i" => "alphabeto",
			"/aluno/i" => "alumno",
			"/anedota/i" => "anecdota",
			"/\bano\b/i" => "anno",
			"/apelido/i" => "appellido",
			"/arqui/i" => "archi",
			"/açúcar/i" => "assucar",
			"/atle/i" => "athle",
			"/atmpsfera/i" => "athmosphera",
			"/aumen/i" => "augmen",
			"/atrás/i" => "atraz",
			"/batismo/i" => "baptismo",
			"/beleza/i" => "belleza",
			"/biblioteca/i" => "Bibliotheca",
			"/\bboca\b/i" => "bocca",
			"/\bcair\b/i" => "cair",
			"/catolicismo/i" => "catholicismo",
			"/civilização/i" => "civilisação",
			"/civilizações/i" => "civilizações",
			"/químic/i" => "chimic",
			"/crist/i" => "christ",
			"/coleç/i" => "collecç",
			"/colonizaç/i" => "colonisaç",
			"/coluna/i" => "columna",
			"/comérc/i" => "commerc",
			"/comunic/i" => "communic",
			"/contudo/i" => "comtudo",
			"/crânio/i" => "craneo",
			"/\bcriaç/i" => "\bcreaç",
			"/criança/i" => "creança",
			"/dança/i" => "dansa",
			"/deus/i" => "deos",
			"/dicion/i" => "diccion",
			"/difer/i" => "differ",
			"/difícil/i" => "diffícil",
			"/ditongo/i" => "diphthongo",
			"/direç/i" => "direcç",
			"/ecles/i" => "eccles",
			"/idade/i" => "edade",
			"/igreja/i" => "egreja",
			"/eletri/i" => "electri",
			"/\bele\b/i" => "elle",
			"/\bela\b/i" => "ella",
			"/época/i" => "epocha",
			"/escrit/i" => "escript",
			"/esfer/i" => "espher",
			"/estadual/i" => "estadoal",
			"/esgot/i" => "exgott",
			"/exibi/i" => "exhibi",
			"/exuber/i" => "exhuber",
			"/espetác/i" => "expectac",
			"/\bfala\b/i" => "falla",
			"/\bfruta\b/i" => "fructa",
			"/geograf/i" => "geograph",
			"/gramát/i" => "grammat",
			"/espanho/i" => "hespanho",
			"/idéia/i" => "idea",
			"/ideia/i" => "idea",
			"/inset/i" => "insect",
			"/imóv/i" => "immov",
			"/indene/i" => "indemne",
			"/instrut/i" => "instruct",
			"/instruç/i" => "instrucç",
			"/introduç/i" => "introducç",
			"/luta/i" => "lucta",
			"/queratose/i" => "keratose",
			"/quilômetr/i" => "kilometr",
			"/quilómetr/i" => "kilometr",
			"/matemát/i" => "mathemat",
			"/matemat/i" => "mathemat",
			"/melanc/i" => "melanch",
			"/métod/i" => "method",
			"/monarqui/i" => "monarchi",
			"/\bmês\b/i" => "mez",
			"/objet/i" => "object",
			"/ocasi/i" => "occasi",
			"/ofíci/i" => "offici",
			"/oftalmo/i" => "ophthalmo",
			"/ortodox/i" => "orthodox",
			"/ortograf/i" => "orthograph",
			"/pai/i" => "pae",
			"/país/i" => "paiz",
			"/pátio/i" => "pateo",
			"/patriarcal/i" => "patriarchal",
			"/\bfant/i" => "phant",
			"/farm/i" => "pharm",
			"/fenom/i" => "phenom",
			"/\bfilan/i" => "philan",
			"/\bfilar/i" => "philar",
			"/forma/i" => "phorma",
			"/fósf/i" => "phosph",
			"/\bfoto/i" => "photo",
			"/grafia/i" => "graphia",
			"/frase/i" => "phrase",
			"/português/i" => "portuguez",
			"/portugues/i" => "portuguez",
			"/produt/i" => "product",
			"/prognatismo/i" => "prognathismo",
			"/proib/i" => "prohib",
			"/profec/i" => "prophec",
			"/profet/i" => "prophet",
			"/salmo/i" => "psalmo",
			"/redaç/i" => "redacç",
			"/reumatis/i" => "rheumatis",
			"/\bsaco/i" => "sacco",
			"/saída/i" => "sahida",
			"/\bcena/i" => "scena",
			"/ciência/i" => "sciencia",
			"/cient/i" => "scient",
			"/sinal/i" => "signal",
			"/suces/i" => "succes",
			"/técnic/i" => "technic",
			"/telégraf/i" => "telegraph",
			"/telegraf/i" => "telegraph",
			"/telef/i" => "teleph",
			"/teatr/i" => "theatr",
			"/teolog/i" => "theolog",
			"/tórax/i" => "thorax",
			"/triunf/i" => "triumph",
			"/vitóri/i" => "victori",
			"/vitori/i" => "victori",
			"/abajur/i" => "abajour",
			"/boate/i" => "boîte",
			"/clube/i" => "club",
			"/coquetel/i" => "cocktail",
			"/líder/i" => "leader",
			"/maiô/i" => "maillot",
			"/sutiã/i" => "soutien",
			"/esporte/i" => "desporto",
			"/toalete/i" => "toiette",
			"/banheiro/i" => "casa de banho",
			"/turista/i" => "touriste",
			"/mato grosso/i" => "matto grosso",
			"/distrit/i" => "district",
			"/catarina/i" => "catharina",
			"/port/i" => "pôrt",
			"/lisbo/i" => "lisbô",
			"/piada/i" => "anecdota",
			"/preen/i" => "prehen"
		);
		$guaranaComRolha = preg_replace(array_keys($trans), $trans, $guaranaComRolha);
	}


function giveMeWeek($n){
	$dias_semana = array("domingo", "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira", "sexta-feira", "sábado");
	return $dias_semana[$n];
}
function giveMeMonth($n){
	$meses = array("", "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
	return $meses[$n];	
}
function show100yearsAgoDate(){
	$HundredAgo = @mktime(0, 0, 0, date("m"), date("d"), date("Y")-100);
	echo "Hoje é ".giveMeWeek(@strftime('%w', $HundredAgo)).@strftime(", %d de ", $HundredAgo).giveMeMonth(intval(@strftime('%m', $HundredAgo))).@strftime(' de %Y', $HundredAgo);
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR">
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />	

<title>Orthographia - Projeto de publicação de 100 anos atrás</title>

<!-- 100anosatras -->
<link rel="stylesheet" href="http://www.100anosatras.com.br/wp-content/themes/100AnosAtras/css/bootstrap.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.100anosatras.com.br/wp-content/themes/100AnosAtras/css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Cardo|UnifrakturMaguntia' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/ico" href="http://www.100anosatras.com.br/wp-content/themes/100AnosAtras/images/favicon.ico" />

<!-- wp -->
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.100anosatras.com.br/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.100anosatras.com.br/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.1.1" />

	<style type="text/css" media="screen">
body { 
	/* fallback */ 
	background-color: #AAA; 
	background-position: center center; 
	background-repeat: no-repeat; 
	
	/* Safari 4-5, Chrome 1-9 */ 
	/* Can't specify a percentage size? Laaaaaame. */ 
	background: -webkit-gradient(radial, center center, 0, center center, 460, from(#EEE), to(#999)); 
	/* Safari 5.1+, Chrome 10+ */ 
	background: -webkit-radial-gradient(circle, #EEE, #999); 
	/* Firefox 3.6+ */ 
	background: -moz-radial-gradient(circle, #EEE, #999); 
	/* IE 10 */ 
	background: -ms-radial-gradient(circle, #EEE, #999); 
	/* Opera cannot do radial gradients yet */ 

	font-family: Verdana;
}
.result {
	padding: 30px;
	margin: 20px;
	width: 700px;
	margin-bottom: 50px;
	border: 1px solid #555;
	font-family: Times New Roman;
	font-size: 16px;
	text-align: justify;
}
textarea {
	width: 100%;
	background-color: #EEE;
	height: 400px;
	margin-top: 10px;
	padding: 10px;
	font-size: 16px;
	font-family: Helvetica;
}
button {
	left: 400px;
	position: absolute;
	margin-top: 30px;
	margin-bottom: 100px;
	height: 70px;
	width: 200px;
	font-family: Arial;
	font-weight: bold;
	font-size: 16px;
	font-variant: small-caps;
}
#footer {
	margin-top: 200px;
}
	</style>
</head>

<body class="home blog">

<div class="container">
	<div id="header">
		<div class="header-top">
			<div class="clock"><?=show100yearsAgoDate()?></div>
		</div>
		<div class="header-title">
			<h1><a href="http://www.100anosatras.com.br/">100 anos atrás</a></h1> 
			<span class="subtitle">As notícias do dia de hoje, 100 anos atrás</span>
		</div>
		<div class="header-bottom">
			<div id="search">
				&nbsp;
			</div>
		</div>
	</div>
	<div class="content">
		<div class="result"><?=nl2br($guaranaComRolha)?></div>
		<form name="ortho" method="post">
			Texto original: <br/>
		<textarea name="texto"><?=$texto?></textarea>
		<button type="submit">Orthographyzar!</button>
		</form>
	</div>
	<div class="clear"></div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-3">
					<span>Busca nos arquivos</span>
				</div>
			</div>
		</div>
	</div>

</body>
</html>