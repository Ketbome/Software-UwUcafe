<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM productos";
    $query=mysqli_query($conexion,$sql);
    
?>
<?php
include_once("admin.php");
?>

<style>
.columna{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;

} 

.columna div{
    justify-content: flex-end;
}

.incio{
    margin: 0px 80px;
}
.row2{
    justify-content: space-between;
    margin: 50px 0px 50px;
}

.productos{
    max-width: 1180px;
    margin: auto;

}

.col-4{
    flex-basis: 20%;
    padding: 15px;
    min-width: 100px;
    margin-bottom: 30px;
    transition: transform 0.5s;
}

.col-4 img{
    width: 100%;
}

.col-4 p{
    padding: 0px;
    font-size: 14px;
}

h4{
    color: #555;
    font-weight: normal;
}

.col-4:hover{
    transform: translateY(-5px);
}

.page-btn{
    margin: 0 auto 80px;
    text-align: end;
}

.page-btn span{
    display: inline-block;
    border: 1px solid #ff523b;
    margin-left: 15px;
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    cursor: pointer;
}

.page-btn span:hover{
    background: #ff523b;
    color: #fff;
}


</style>

<body class="text-white">
       <!-- Productos -->

<section class="incio">
    <div class="columna row2 text-dark">
        <h2>All Products</h2>

    </div>

</section>

<!--Prodcutos-->

<section class="productos">
    <div class="columna">
        <?php
            while($row=mysqli_fetch_array($query)){
        ?>
        <div class="col-4 text-dark">
            <img src="../Img/recort.png" >
            <h4><?php  echo $row['prod_name']?></h4>
            <p>Precio: $<?php  echo $row['precio']?></p>
            <p>Cantidad: <?php  echo $row['cantidad']?></p>
            <a href="updateprod.php? id=<?php echo $row['id'] ?>" class="btn btn-info">Actualizar</a>
            <a href="../BD/delprod.php? id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a> 
        </div>
        <?php 
            }
        ?>
    </div>

   <div class="page-btn">
       <span>1</span>
       <span>2</span>
       <span>3</span>
       <span>4</span>
       <span>&#8594;</span>
   </div>

</section>
    </body> 
</html>