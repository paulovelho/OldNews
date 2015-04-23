<?php

	$wsContato = "http://contato.paulovelho.com.br";

//	p_r($_GET);

	$data = @$_POST;
	if(!empty($data)){
		$name = $data["name"];
		$email = $data["email"];
		$subject = $data["subject"];
		$message = $data["message"];
		$secret = "wall-e";

		$email_message = "FROM: [".$name." <".$email.">] :  \n\n".$message;
		$postData = array(
			'source' => 3,
			'to' => '100anosatras@paulovelho.com',
			'replyto' => "'".$name."' <".$email.">",
			'subject' => $subject,
			'message' => $email_message,
			'priority' => 70,
			'auth' => $secret 
		);
		$options = array(
			'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($postData),
			),
		);
		$context  = stream_context_create($options);
		$wsContato = $wsContato."/server.php?addMail";
		$result = file_get_contents($wsContato, false, $context);
//		print_r($result);

		$successMessage = "<div class=\"alert alert-success\">" .
				"Mensagem enviada!</div>";
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

<title>Contacto - Agência secular de notícias / 100 anos atrás</title>

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

h1 {
	margin: 30px;
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

		<div class="row-fluid">
			<div class="span12">
				<h1>Contacto</h1>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Qual a sua graça?" value="<?=$name?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Caixa Postal nº" value="<?=$email?>">
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Assunto</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="" value="<?=$subject?>">
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Mensagem</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?=$message?></textarea>
						</div>
					</div>
					<?php
					if(empty($successMessage)) {
						?>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button  type="submit">
								Enviar
							</button>
						</div>
					</div>
						<?
					} else {
						?>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" id="sentResponse"><?=$successMessage?></div>
					</div>
						<?
					}
					?>
				</form>
			</div>
		</div>

	</div>
	<div class="clear"></div>
</div>
<div id="footer">
	<div class="container">
	</div>
</div>

</body>
</html>