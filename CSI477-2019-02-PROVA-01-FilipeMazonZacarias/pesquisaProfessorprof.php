<?php
require'autoloader.php';

use Model\Professores;


$professor = new Professores();


include('headerprofessor.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Relatório de Professores por Área</h2>	
			<br>
			<form action="buscaprofessor.php" method="post" class="prof" id='prof'>
				<div class="form-group">	
					<center>
					<label>Área:</label>
					<input type="text" name="area" id="area" class="form-text" placeholder="Nome" required>

                    
					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Buscar" class="btn btn-success btn-sm">Buscar</button>
				</div>
			</center>
			</form>	
			<br><br>



			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Área</th>


					</tr>
				</thead>
				<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "tcc";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $profs = $connection->query("SELECT * FROM professores ORDER BY nome ASC");


 
				while($row = $profs->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeProfessor.php">
								<td><?php echo $row->idProfessor ;?></td>
								<td><?php echo $row->Nome ;?></td>
								<td><?php echo $row->Area ;?></td>


							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>