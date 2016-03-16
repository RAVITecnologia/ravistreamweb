<?php

	include 'db/bannerrandomico.php';

	if(isset($_POST))
	{
		$p = $_POST;
		
		$_UP['pasta'] = '../../assets/img/banners/';
	
		// Tamanho máximo do arquivo (em Bytes)
		$_UP['tamanho'] = 1024 * 1024 * 5; // 10Mb
		
		// Array com as extensões permitidas
		$_UP['extensoes'] = array('jpg');
		
		// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
		$_UP['renomeia'] = true;
		
		// Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		
		// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
		if ($_FILES['imagembanner']['error'] != 0) {
		  header("location: ../../index.php?m=Não foi possível fazer o upload, erro: " . $_UP['erros'][$_FILES['imagembanner']['error']].'. ');
		  die;
		}
		
		// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
		// Faz a verificação da extensão do arquivo
		$extensao = strtolower(end(explode('.', $_FILES['imagembanner']['name'])));
		
		if (array_search($extensao, $_UP['extensoes']) === false) {
		  header("location: ../../index.php?m=Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png ou gif. ");
		  die;
		}
		
		// Faz a verificação do tamanho do arquivo
		if ($_UP['tamanho'] <= $_FILES['imagembanner']['size']) {
		  header("location: ../../index.php?m=O arquivo enviado é muito grande, envie arquivos de até 5Mb.");
		  die;
		}
		
		if(bannerrandomico_insert($p))
		{
			$idbanner = mysql_insert_id();			
			
			// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
			
			// Primeiro verifica se deve trocar o nome do arquivo
			if ($_UP['renomeia'] == true) {
				
			  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			  $nome_final = $idbanner.'.'.$extensao;
			  
			} else {
			  // Mantém o nome original do arquivo
			  $nome_final = $_FILES['imagembanner']['name'];
			}
			
			if(file_exists($_UP['pasta'] . $nome_final)) unlink($_UP['pasta'] . $nome_final);
			
			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['imagembanner']['tmp_name'], $_UP['pasta'] . $nome_final)) {
				
			  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			  header("location: ../../index.php?m=O banner foi enviado com sucesso!");
			  
			} else {
				
			  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
			  header("location: ../../index.php?m=Não foi possível enviar o banner, tente novamente.");
			}
			
		}
		else
		{
			
			header('location: ../../index.php');
		}
	}
	else
	{
		header('location: ../../index.php');
	}
?>