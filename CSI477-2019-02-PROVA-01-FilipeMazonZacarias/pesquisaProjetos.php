<?php
require'autoloader.php';

use Model\Projetos;


$projetos = new Projetos();


include('headerestudante.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Relatório de Projetos</h2>	
				<table class="table table-striped">
				<thead>
					<tr>
						<th>Ano</th>
						<th>Semestre</th>
						<th>ID</th>
						<th>Professor</th>
						<th>Aluno</th>
						<th>Título</th>
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

  $projs = $connection->query("SELECT p.Ano as Ano, p.Semestre as Semestre, p.id as idProjeto, x.Nome as Nome, a.Nome as Nomea, p.Titulo as Titulo, x.Area as Area FROM projetos P, professors X, alunos A WHERE P.alunos_id = A.id and P.professors_id = X.id ORDER BY Ano DESC, Semestre DESC, Nomea ASC");

 
				while($row = $projs->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="exibeProjeto.php">
								<td><?php echo $row-> Ano ;?></td>
								<td><?php echo $row-> Semestre ;?></td>
								<td><?php echo $row-> idProjeto ;?></td>
								<td><?php echo $row-> Nome ;?></td>
								<td><?php echo $row-> Nomea ;?></td>
								<td><?php echo $row-> Titulo ;?></td>
								<td><?php echo $row-> Area ;?></td>



							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>



<?php 
?>

		</div>
	</div>
</body>
</html>