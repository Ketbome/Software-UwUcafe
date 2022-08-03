<?php 
    include("../BD/conexion.php");

    $sql="SELECT *  FROM transacciones";
    $query=mysqli_query($conexion,$sql);
    
?>



<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .list-group {
    max-width: 460px;
    margin: 4rem auto;
  }
  
  .form-check-input:checked + .form-checked-content {
    opacity: .5;
  }
  
  .form-check-input-placeholder {
    border-style: dashed;
  }
  [contenteditable]:focus {
    outline: 0;
  }
  
  .list-group-checkable .list-group-item {
    cursor: pointer;
  }
  .list-group-item-check {
    position: absolute;
    clip: rect(0, 0, 0, 0);
  }
  .list-group-item-check:hover + .list-group-item {
    background-color: var(--bs-light);
  }
  .list-group-item-check:checked + .list-group-item {
    color: #fff;
    background-color: var(--bs-blue);
  }
  .list-group-item-check[disabled] + .list-group-item,
  .list-group-item-check:disabled + .list-group-item {
    pointer-events: none;
    filter: none;
    opacity: .5;
  }
  
  .list-group-radio .list-group-item {
    cursor: pointer;
    border-radius: .5rem;
  }
  .list-group-radio .form-check-input {
    z-index: 2;
    margin-top: -.5em;
  }
  .list-group-radio .list-group-item:hover,
  .list-group-radio .list-group-item:focus {
    background-color: var(--bs-light);
  }
  
  .list-group-radio .form-check-input:checked + .list-group-item {
    background-color: var(--bs-body);
    border-color: var(--bs-blue);
    box-shadow: 0 0 0 2px var(--bs-blue);
  }
  .list-group-radio .form-check-input[disabled] + .list-group-item,
  .list-group-radio .form-check-input:disabled + .list-group-item {
    pointer-events: none;
    filter: none;
    opacity: .5;
  }

  

    </style>
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
            <?php 
            $sql2 = "SELECT prod_name FROM productos WHERE maspedido=(SELECT MAX(maspedido) FROM productos);";#buscar el precio del producto
            $query3 = mysqli_query($conexion,$sql2);
            $row3=mysqli_fetch_array($query3);

            $sql3 = "SELECT prod_name FROM productos WHERE mejor=(SELECT MAX(mejor) FROM productos);";#buscar el precio del producto
            $query4 = mysqli_query($conexion,$sql3);
            $row4=mysqli_fetch_array($query4);
            ?>
            <div class="w-auto list-group ">
  <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <img src="../Img/cafe.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
    <div class="d-flex gap-2 w-100 justify-content-between">
      <div>
        <h6 class="mb-0">Mas pedido</h6>
        <p class="mb-0 opacity-75"><?php echo $row3['prod_name'] ?></p>
      </div>
      <small class="opacity-50 text-nowrap">Actual</small>
    </div>
  </a>
  <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <img src="../Img/cafe.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
    <div class="d-flex gap-2 w-100 justify-content-between">
      <div>
        <h6 class="mb-0">Mejor producto</h6>
        <p class="mb-0 opacity-75"><?php echo $row4['prod_name'] ?></p>
      </div>
      <small class="opacity-50 text-nowrap">Actual</small>
    </div>
  </a>
</div>
    </body>
</html>