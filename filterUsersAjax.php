<html>
<body>
    <div class="productosTwo">
        <button type="button" class="btn btn-success" onclick="showUsers('users');">Refresh</button>
        <table style="align-items: center;" class="table">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" class="marca-genero">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contraseña</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php 
                        include './conexionBD.php';

                        $filtro = $_POST['filter'];

                        $consulta = 'SELECT * FROM usuarios';
                        $datos = mysqli_query($conexion, $consulta);
                        
                        while(  $user = mysqli_fetch_array($datos) ) { ?>    

                            <tr>
                                <th scope="row"><?php echo $user['id']?></th>
                                <td><?php echo $user['user']?></td>
                                <td class="marca-genero"><?php echo $user['surname']?></td>
                                <td>
                                    <?php
                                        if($user['active'] == 'true') {
                                        if($user['email'] == 'tom@gmail') {
                                            echo '<img width="10px" src="./img/circleGreen.png" alt="Online">  '.$user['email'].'(ADMIN)';
                                        } else {
                                            echo '<img width="10px" src="./img/circleGreen.png" alt="Online">  '.$user['email'];
                                        }
                                        } else {
                                        if($user['email'] == 'tom@gmail') {
                                            echo '<img width="10px" src="./img/circleRed.png" alt="Online">  '.$user['email'].'(ADMIN)';
                                        } else {
                                            echo '<img width="10px" src="./img/circleRed.png" alt="Online">  '.$user['email'];
                                        }
                                        }
                                    ?>
                                </td>
                                <td><?php echo $user['password']?></td>
                            </tr>
                        
                    <?php } ?>
                </tbody>
            </table>
    </div>
</body>
</html>