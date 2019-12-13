<?php
require'autoloader.php';

use Model\Alunos;


$alunos = new Alunos();


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
			<h2>Relatório de Alunos</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Curso</th>


					</tr>
				</thead>

			<?php


  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "tcc";
  $strConnection = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
  $connection = new PDO($strConnection, $dbuser, $dbpassword);

  $aluns = $connection->query("SELECT * FROM alunos ORDER BY nome ASC");


 
				while($row = $aluns->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeAluno.php">
								<td><?php echo $row->idAluno ;?></td>
								<td><?php echo $row->Nome ;?></td>
								<td><?php echo $row->Curso ;?></td>


							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>



<?php /* TABELA ALUNOS ANTIGA AQUI 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Curso</th>


					</tr>
				</thead>
				<?php
				$stmt = $alunos->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeAlunos.php">
								<td><?php echo $row->idAluno ;?></td>
								<td><?php echo $row->Nome ;?></td>
								<td><?php echo $row->Curso ;?></td>


							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>*/
?>

		</div>
	</div>
</body>
</html>