<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/views/relatorios/estilos.css">
</head>
<body>
	<h1>Lista de Membros</h1>
	<table>
		<tr>
			<th>Nome</th>
			<th>Endereço</th>
			<th>Email</th>
			<th>Telefones</th>
			<th>Aniversário</th>
		</tr>
		<?php $counter1=-1;  if( isset($dados) && ( is_array($dados) || $dados instanceof Traversable ) && sizeof($dados) ) foreach( $dados as $key1 => $value1 ){ $counter1++; ?>
		<tr>
			<td><?php echo htmlspecialchars( $value1["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["telefones"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["dtnascimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>




