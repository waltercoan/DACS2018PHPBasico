<?php

	$con = mysqli_connect("localhost","root","root","dacs2018");
	$delete = "delete from cliente where codigo = ?";
	$stmt = mysqli_prepare($con, $delete);

	$id = intval($_GET['id']);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header('Location: ' . 'clientes.php');

?>