<?php if(isset($_SESSION['usuario'])): ?>
<h1 class="text-center mt-3">Hacer pedido</h1>
<hr>
<a href="<?= base_url ?>carrito/index" class="btn btn-success">Ver los productos y el precio del pedido</a>
<h2 class="mt-3">Direccion para el envio:</h2>
<form action="<?= base_url ?>pedido/add" method="POST" class="mt-3">
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="" class="form-control" required value="<?= $_SESSION['usuario']->estado ?>">
    </div>
    <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="" class="form-control" required value="<?= $_SESSION['usuario']->ciudad ?>">
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="" class="form-control" value="<?= $_SESSION['usuario']->domicilio ?>">
    </div>
    <input type="submit" value="Confirmar pedido" class="btn btn-success" required>

</form>
<?php else: ?>
<h1 class="text-center mt-5">Necesitas iniciar sesion</h1>
<p class="text-center">Para realizar pedidos, debes iniciar sesion</p>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?>