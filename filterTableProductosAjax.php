<html>
<body>
    <div class="productosTwo">
    <table class="table">
        <thead>
        <tr>
        <th scope="col">#ID</th>
        <th scope="col">Tipo</th>
        <th scope="col" class="marca-genero">Marca</th>
        <th scope="col" class="marca-genero">Talle</th>
        <th scope="col">Precio</th>
        <th scope="col" class="marca-genero">Genero</th>
        <th scope="col">Stock</th>
        <th scope="col">Accion</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php 
                include './conexionBD.php';

                $filtro = $_POST['filter'];
        
                $consulta = 'SELECT * FROM ropa';
                $datos = mysqli_query($conexion, $consulta);
                
                while(  $prenda = mysqli_fetch_array($datos) ) { ?> 
                    <tr>
                        <th scope="row"><?php echo $prenda['id']?></th>
                        <td><?php echo $prenda['tipo']?></td>
                        <td class="marca-genero"><?php echo $prenda['marca']?></td>
                        <td class="marca-genero"><?php echo $prenda['talle']?></td>
                        <td><?php echo $prenda['precio']?></td>
                        <td class="marca-genero"><?php echo $prenda['genero']?></td>
                        <td><?php echo $prenda['stock']?></td>
                        <td>
                            <a href="./editar.php?id=<?php echo $prenda['id'];?>"><button class="btnTable"> <img id="imgadddelete" src="./img/actualizar.png" alt="Actualizar Prenda"></button></a>
                            <a onclick="confirmarDelete(<?php echo $prenda['id'];?>);" ><button class="btnTable"> <img id="imgadddelete" src="./img/eliminar.png" alt="Eliminar Prenda"> </button></a>
                        </td>
                    </tr>
            
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>