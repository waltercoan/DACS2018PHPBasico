<?php
	$con = mysqli_connect("localhost","root","root","dacs2018");
	if(isset($_POST['id'])){
		$update = "update cliente set nome = ?, endereco = ? where codigo = ?";
		$stmt = mysqli_prepare($con, $update);

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];

	    mysqli_stmt_bind_param($stmt, "ssi", $nome, $endereco,$id);
	}else{
		$insert = "insert into cliente(nome,endereco) values(?,?)";
		$stmt = mysqli_prepare($con, $insert);

		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];

	    mysqli_stmt_bind_param($stmt, "ss", $nome, $endereco);

	}

    mysqli_stmt_execute($stmt);

    header('Location: '. 'clientes.php');
?>