<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM transacciones";
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
                                        <th>Id</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="text-dark">
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['n_trans']?></th>
                                                <th><?php  echo $row['precio']?></th>
                                                <th><?php  echo $row['fecha']?></th>
                                                <th><a href="../BD/deltrans.php? id=<?php echo $row['n_trans'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>