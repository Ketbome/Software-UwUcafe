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

</style>
<?php
include_once("admin.php");
?>
<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM pedidos";
    $query=mysqli_query($conexion,$sql);
	$sql2="SELECT * FROM pedidos_productos";
	$query2=mysqli_query($conexion,$sql2);
    
?>

<!DOCTYPE html>
<html>
    <body >

    
        <!-- Productos -->

       <div class="contenedor">

           <div class="contenedor-pedidos">
		    <?php
                while($row=mysqli_fetch_array($query)){
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

                <!--<div class="pedido-listo">
				<h3>Mesero:</h3>
				<h5>Eduardo Jofre</h5>
				</div> -->

			</div>
			<?php 
				}
        	?>

           </div>

		   	<?php 
    		include("../BD/conexion.php");

    		$sql="SELECT prod_name  FROM productos";
    		$query=mysqli_query($conexion,$sql);
    
			?>

      </div>


    </body>
</html>
