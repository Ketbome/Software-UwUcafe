<?php 
include("../BD/conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM pedidos, pedidos_productos WHERE pedidos.mesa=pedidos_productos.mesa AND pedidos.mesa=$id";
$query=mysqli_query($conexion,$sql);
$row=mysqli_fetch_array($query);

$sql="SELECT prod_name  FROM productos";
$query=mysqli_query($conexion,$sql);
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
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 nave">
    <img class="my-0 mr-md-auto font-weight-normal imgn" src="../Img/recort.png">
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="mesero.php">Inicio</a>
        <a class="p-2 text-white" href="../BD/out.php">Cerrar sesion</a>
    </nav>
    </div>
    <div class="bgcolor">

    </div>
</body>
</html>
<html>
<section>
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modificar pedido de la mesa <?php echo $row['mesa'] ?></h2>

              <form action="../BD/updateped.php" method="post">
                <input type="hidden" name="orderstatus" value="Pendiente">
                <input type="hidden" name="mesa" placeholder="Ejemplo: 7" required="required" value="<?php echo $row['mesa']  ?>">

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
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Modificar</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
</section>

</html>
