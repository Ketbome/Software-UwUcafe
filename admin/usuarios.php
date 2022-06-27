<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM usuarios";
    $query=mysqli_query($conexion,$sql);
    
?>
<?php
include_once("admin.php");
?>
    <body class="text-dark">
            <div class="container mt-5">
                    <div class="row"> 
                        <div class="col-md-12">
                            <table class="table" >
                                <thead class="table-striped text-white up" >
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="text-dark">
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['username']?></th>
                                                <th><?php  echo $row['type']?></th>
                                                <th><a href="updateus.php? id=<?php echo $row['username'] ?>" class="btn btn-info">Actualizar</a></th>
                                                <?php if($row['username'] != 'admin'){ ?>
                                                <th><a href="../BD/delus.php? id=<?php echo $row['username'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                                }
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>