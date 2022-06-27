<style>
.contenedor{
    
    width: 95%;
	max-width: 2000px;
	margin: auto;
	padding: 40px 0;
	margin-top: 30px;

}
.prueba{
	background: #7c3c00;
}
.contenedor-pedidos{
	display: flex;
	gap: 10px;
	height: 520px;
	overflow-y: scroll;
	position: relative;
	flex-direction: column;
}

.contenedor-pedidos::-webkit-scrollbar{
	width: 7px;
}

.contenedor-pedidos::-webkit-scrollbar-thumb{
	background: #7c3c00;
}

.pedido{
	display: flex;
	justify-content: space-around;
	background-color: #A64B2A;
	border-radius: 30px;
	align-items: center;

}

.pedido-img img{
	width: 60px;
	height:60px ;
	border-radius: 80%;
	
}

.pedido-img{
     flex-basis:100px;
}

.pedido-info{
	 flex-basis:300px;
}

.pedido-mesero{
	flex-basis:200px;
}

.pedido-listo{
	flex-basis:300px;
}

</style>


<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM pedidos";
    $query=mysqli_query($conexion,$sql);
	$sql2="SELECT * FROM pedidos_productos";
	$query2=mysqli_query($conexion,$sql2);
    
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<html lang="en">
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Chef</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 nave">
    <img class="my-0 mr-md-auto font-weight-normal imgn" src="../Img/recort.png">
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="chef.php">Inicio</a>
        <a class="p-2 text-white" href="../BD/out.php">Cerrar sesion</a>
    </nav>
    </div>
    <div class="bgcolor">

    </div>
</body>
</html>

<html>
    <body >

    
        <!-- Productos -->

       <div class="contenedor">

           <div class="contenedor-pedidos">
		    <?php
                while($row=mysqli_fetch_array($query)){
                    if($row['orderstatus']=="Pendiente"){
            ?>

            <div class="pedido" >

				<div class="pedido-img">
					<img src="../Img/cafe.png">
				</div>

                <div class="pedido-info">
					<h3>Mesa <?php echo $row['mesa']; ?></h3>
					<?php
                        $mesa = $row['mesa'];
                        $sql2="SELECT * FROM pedidos_productos WHERE mesa=$mesa;";
                        $query2=mysqli_query($conexion,$sql2);
						while($row2=mysqli_fetch_array($query2)){
						if($row2['mesa'] == $row['mesa']){
					?>
                    <h5><?php  echo $row2['producto']?>: <?php  echo $row2['cantidad']?></h5>
					<?php }
						}
					?>
				</div>

                <div class="pedido-mesero">
					<h3><?php echo $row['orderstatus'] ?></h3>                    
				</div>

                <div class="pedido-listo">
				<a href="../BD/updatestatus.php? id=<?php echo $row['mesa'] ?>" class="btn btn-danger">Pedido Preparado</a>
				</div>

			</div>
			<?php }
				}
        	?>

           </div>



      </div>


    </body>
</html>




