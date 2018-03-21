<?php
	$con = mysqli_connect("localhost","root","root","dacs2018");
	$sql = "select * from cliente where codigo = " . $_GET['id'];

	$result = mysqli_query($con,$sql);
	
	$row = $result->fetch_row();
	$id = $row[0];
	$nome = $row[1];
	$endereco = $row[2];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário Cliente</title>
    </head>

    <body>
        <h2>Cliente</h2>
        <form method="POST" action="savecliente.php">
        	<input type="hidden" name="id" value="<?php echo $id ?>"/>
        	<label>Nome:</label>
        	<input type="text" name="nome" value="<?php echo $nome ?>"/></br>
        	<label>Endereco:</label>
        	<input type="text" name="endereco" value="<?php echo $endereco ?>"/></br>
        	<input type="submit" value="Enviar"/>
        </form>
    </body>
</html>

