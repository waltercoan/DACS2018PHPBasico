<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Title of the document</title>
    </head>

    <body>
    	<form method="POST" action="clientes.php">
	    	<input type="text" name="busca">
	    	<input type="submit" value="buscar">
    	</form>
    	<a href="formcliente.html">Incluir</a>
	    <table>
	    	<thead>
	    		<td>Código</td>
	    		<td>Nome</td>
	    		<td>Endereco</td>
	    		<td>Ação</td>
	    	</thead>
	    	<tbody>
		        <?php
				   $con = mysqli_connect("localhost","root","root","dacs2018");
				   //var_dump($_con);

				   if(isset($_POST["busca"])){
                        //$sql = "select * from cliente where nome like '%" . $_POST["busca"] . "%'";
				   	    $sql = "select * from cliente where nome like ?";
				   	    $stmt = mysqli_prepare($con, $sql);
				   	    $param1="%".$_POST["busca"]."%";
				   	    mysqli_stmt_bind_param($stmt, "s", $param1);
				   	    mysqli_stmt_execute($stmt);
				   	    $result = mysqli_stmt_get_result($stmt);
				   }else{				   
				   		$sql = "select * from cliente";
				   	    $result = mysqli_query($con,$sql);
				   }

				   //$result = mysqli_query($con,$sql);

				   while($row = $result->fetch_row()){
				       echo "<tr>";
				   	   	  echo "<td>" . $row[0] . "</td>";
				   	   	  echo "<td>" . $row[1] . "</td>";
				   	   	  echo "<td>" . $row[2] . "</td>";
				   	   	  echo "<td><a href='editcliente.php?id=".$row[0]."'>Edit</a></td>";
				   	   	  echo "<td><a href='deletecliente.php?id=".$row[0]."'>Excluir</a></td>";
				   	   echo "</tr>";
				   }
				   $con->close();
				?>
			</tbody>
		</table>
    </body>

</html>



