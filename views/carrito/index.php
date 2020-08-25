<h1 class="text-center mt-5 mb-3">Carrito de compras</h1>
<hr>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1): ?>
<table class="table table-bordered table-hover">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>

    </tr>
    <?php
        foreach($carrito as $indice => $elemento):
        $producto=$elemento['producto'];
        ?>
        <tr>
            <td><?php 
                if($producto->imagen !=null):?>
                <img src="../<?= $producto->imagen?>" alt="" class="w-25">
                <?php else: ?>
                    Sin imagen
                <?php endif; ?>
            </td>
            <td> <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a></td>
            <td><?= $producto->precio ?></td>
            <td>
            <div class="unidades d-flex">
            <div class="unidad">
            <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="btn btn-success">+</a> </div>
            <div class="unidad mx-2">
            <?= $elemento['unidades'] ?> </div>
            <div class="unidad">
            <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn btn-danger">-</a></div>
            </div>
            </td>

            <td>
                    <a href="<?=base_url?>carrito/delete&index=<?= $indice ?>" class="btn btn-danger">Quitar producto</a>
            </td>
        </tr>
        <?php endforeach;   
    ?>
    
</table>
<div class="botones d-flex justify-content-between">
<div class="boton">
<a href="<?= base_url ?>carrito/delete_all" class="btn btn-danger">Vaciar Carrito de compras</a>
</div>
<div class="boton">
<a href="<?= base_url ?>pedido/hacer" class="btn btn-success">Hacer pedido</a>
</div>
</div>
                <?php else: ?>
                <h1 class="text-center mt-3">No hay productos en el carrito</h1> 
                <br><br><br><br><br><br><br><br><br><br><br>
                <?php endif; ?>