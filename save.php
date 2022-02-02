<?php
    session_start();
	
	/* Recebendo os dados via SESSION */
	$nome= $_SESSION['name'];
	$cidade = $_SESSION['city'];
	$email = $_SESSION['email'];
	$nTelefone = $_SESSION['phone'];
	/* Recebendo os dados do formulário */
	$cpf = $_POST['cpf'];
	$dataNasc = $_POST['bDate'];
	$RG = $_POST['rg'];
	$CNH = $_POST['cnh'];
    $renavam = $_POST['renavam'];
	$estado = 'MG';
	$situacao = 'livre';
	$saldoDevedor = 0;
	$verificado = 'cadastroFinalizado';
	$entregasTotais = 0;
	
	/* Conectando com o banco de dados para cadastrar registros */
	$datasource = 'mysql:host=***HOST***;dbname=***DB_NAME***';
	$user = '***USER***';
	$pass = '***PASSWORD***';
	$db = new PDO($datasource, $user, $pass);
	
	$query = "INSERT INTO entregador(
				  cpfEntregador,
				  nome,
				  cidade,
                  estado,
                  email,
                  dataNascimento,
                  telefone,
                  situacao,
                  saldoDevedor,
				  rg,
				  cnh,
				  renavam,
				  verificado,
				  entregasTotais		   
				) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			
	$stm = $db->prepare($query);
	$stm->bindParam(1, $cpf);
	$stm->bindParam(2, $nome);
	$stm->bindParam(3, $cidade);
    $stm->bindParam(4, $estado);
	$stm->bindParam(5, $email);
	$stm->bindParam(6, $dataNasc);
    $stm->bindParam(7, $nTelefone);
	$stm->bindParam(8, $situacao);
	$stm->bindParam(9, $saldoDevedor);
	$stm->bindParam(10, $RG);
	$stm->bindParam(11, $CNH);
	$stm->bindParam(12, $renavam);
	$stm->bindParam(13, $verificado);
	$stm->bindParam(14, $entregasTotais);
	
	if($stm->execute()) {
		header("location:obrigado.php");
	}
	else {
		print "<p>Erro ao cadastrar cliente!</p>";
		print "<a href='cadastro.php'>Voltar</a>";
        print_r($stm->errorInfo());
	}	
?>