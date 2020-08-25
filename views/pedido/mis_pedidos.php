<?php if (isset($gestion)): ?>
	<h1 class="mt-3">Gestionar pedidos</h1>
<?php else: ?>
	<h1 class="mt-3">Mis pedidos</h1>
<?php endif; ?>

<?php 
			if(isset($_SESSION["cancel"]) && $_SESSION["cancel"]=="Pedido cancelado"){
		?>
			<div class="alert alert-success mt-3"><?=$_SESSION["cancel"]?></div>

		<?php
	}elseif(isset($_SESSION["cancel"]) && $_SESSION["cancel"]=="No se pudo cancelar el pedido"){
		?>
		<div class="alert alert-danger mt-3"><?=$_SESSION["cancel"]?></div>

		<?php
	}
		?>

<table class="table table-bordered mt-3">
	<tr>
		<th>Nº Pedido</th>
		<th>Total</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th>Acciones</th>


	</tr>
	<?php
	if(mysqli_num_rows($pedidos)>=1){
	while ($ped = $pedidos->fetch_object()):
		?>

		<tr>
			<td>
				<?= $ped->id ?>

			</td>
			<td>
			$<?= $ped->coste ?> 
			</td>
			<td>
				<?= $ped->fecha ?>
			</td>
			<td>
				<?=Utils::showStatus($ped->estado)?>
			</td>

			<td>
				<a href="<?= base_url ?>pedido/delete&id=<?= $ped->id ?>" class="btn btn-danger">Cancelar pedido</a>
			</td>


		</tr>

	<?php endwhile; 
	}else{
	?>
	<h1 class="text-center">No has hecho ningun pedido aun</h1>
	<?php }
	 ?>


</table>
<br><br><br>



<?php Utils::deleteSession("cancel"); ?>