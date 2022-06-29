<style>

    
.contenedor{
    
    width: 95%;
	max-width: 2000px;
	margin: auto;
	padding: 40px 0;
	margin-top: 5px;

    
	display: grid;
	grid-template-columns: 3fr 1fr;
	gap: 20px;

}
.prueba{
	background: #7c3c00;
}
.contenedor-pedidos {
	display: flex;
	gap: 10px;
	height: 290px;
	overflow-y: scroll;
	position: relative;
	flex-direction: column;
}

.listos{
    height: 130px;
}

.contenedor-pedidos::-webkit-scrollbar{
	width: 0px;
}

.pedido h3{
	color: white;
	text-align: left;
}

.pedido h5{

	color: white;

}

.pedido{
	display: flex;
	justify-content: space-around;
	border-radius: 10px;
	background-image: url(../Img/fondo.jpg);
	background-size:contain ;
	position: relative;
	z-index: 1;
    align-items:center;

}

.pedido::after{
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	border-radius: 10px;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	opacity: 0.7;
	z-index: -1;
}

.pedido-img img{
	height: 80px;
	width: 80px;
	margin-bottom: 20px;
	
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

.titulos{
    text-align: center;
    margin-bottom: 30px;
}

.contenedor-agregar{
    background-image: url(../Img/fondo2.jpg);
	background-size:contain ;
	position: relative;
	z-index: 1;
	height: 570px;
	padding: 25px 30px;
	border-radius: 5px;
}

.contenedor-agregar::after{
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	border-radius: 10px;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	opacity: 0.8;
	z-index: -1;
}

.contenedor-agregar .titulo{
	font-size: 25px;
	font-weight: 500;
    color: #edf0f1;
}

.contenedor-agregar label{
    color: #edf0f1;
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
    <title>Main Mesero</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<header>
    <img class="logo" src="../Img/recort.png" alt="logo">
    <nav >
        <ul class="nav_links" >

       
        </ul>
    </nav>
    <a  href="../BD/out.php"><button>Cerrar sesion</button></a>
    </header>


    
        <!-- Preparados -->

       <div class="contenedor">
    <div>
       <div class="titulos">
                <h2>Preparados</h2>
            </div>

           <div class="contenedor-pedidos listos">
		    <?php
                while($row=mysqli_fetch_array($query)){
                    if($row['orderstatus']=="Preparado"){
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
					<?php 
                          }
						}
					?>
				</div>

                <div class="pedido-mesero">
					<h3><?php echo $row['orderstatus'] ?></h3>                    
				</div>

                <div class="pedido-listo">
                <a href="../BD/delpedido.php? id=<?php echo $row['mesa'] ?>" class="btn btn-danger">Finalizar Pedido</a>
				</div>

			</div>
			<?php 
                    }
				}
        	?>

           </div>
          
        <!-- no Preparados -->

        <?php 
        $sql="SELECT *  FROM pedidos";
        $query=mysqli_query($conexion,$sql);    
        ?>
            <div class="titulos">
                <h2> No preparados</h2>
            </div>

           <div class="contenedor-pedidos nolistos">
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
                <a href="Mod.php? id=<?php echo $row['mesa'] ?>" class="btn btn-danger">Modificar</a>
                <a href="../BD/delpedido2.php? id=<?php echo $row['mesa'] ?>" class="btn btn-danger">Eliminar</a>
				</div>

			</div>
			<?php 
                    }
				}
        	?>

           </div>

        </div>




        <div class="derechaa">
        <div class="contenedor-agregar" >
            <div class="titulo">Pedido a realizar</div>
            <?php 
                    include("../BD/conexion.php");

                    $sql="SELECT prod_name  FROM productos";
                    $query=mysqli_query($conexion,$sql);
                    
                ?>

<form action="../BD/neworder.php" method="post">
                <input type="hidden" name="orderstatus" value="Pendiente">
                <input type="hidden" name="type" value="Mesero">

                
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Numero de mesa</label>
                    <input type="number" name="mesa" placeholder="Ejemplo: 7" required="required">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="inputState">Producto 1</label>
                    <select name="producto1" class="form-control">
                        <option value="none" selected>Ninguno</option>
                        <?php while($row=mysqli_fetch_array($query)){ ?> <option value="<?php echo $row['prod_name']?>"><?php echo $row['prod_name']?></option> <?php } ?>
                    </select>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Cantidad Producto 1</label>
                    <input type="number" name="cantidad1" placeholder="Ejemplo: 2">
                </div>
                <?php 
                    include("../BD/conexion.php");

                    $sql="SELECT prod_name  FROM productos";
                    $query=mysqli_query($conexion,$sql);
                    
                ?>
                <div class="form-outline mb-4">
                    <label for="inputState">Producto 2</label>
                    <select name="producto2" class="form-control">
                        <option value="none" selected>Ninguno</option>
                        <?php while($row=mysqli_fetch_array($query)){ ?> <option value="<?php echo $row['prod_name']?>" ><?php echo $row['prod_name']?></option> <?php } ?>
                    </select>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Cantidad Producto 2</label>
                    <input type="number" name="cantidad2" placeholder="Ejemplo: 2">
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrar</button>
                </div>

           </div>
        </div>


      </div>


    </body>
</html>
