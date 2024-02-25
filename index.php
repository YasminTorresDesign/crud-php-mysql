<?php 
include("connection.php");

$con = connection();

$sql = "SELECT * FROM producto";
$query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Registro de Productos</title>
</head>

<body>
    <div class="vista">

        <div class="producto-card">
            <div class="formulario-columna">
                <div class="producto-form" >
                    <form action="insert_producto.php" method="POST" enctype="multipart/form-data" >
                        <!-- enctype="multipart/form-data" -->
                            <h1>Registrar Producto</h1>

                            <input type="text" name="name" placeholder="Nombre">
                            <input type="text" name="description" placeholder="Descripcion">
                            <input type="text" name="price" placeholder="Precio"> 
                            <input type="text" name="category" placeholder="Categoria">
                            <!-- Campo para carga de imagenes  -->
                            <input type="file" name="image" placeholder="Imagen"> 
                            <!-- <input type="text" name="image" placeholder="Imagen">  -->
                            
                            <input type="submit" value="Agregar Producto"> 
                    </form>
                </div>
            </div>
        </div>

        <div class="productos-columna">
            <div class="producto-table">
                <h2>Productos Registrados</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>        Acciones </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <th><?= $row['id'] ?></th>
                                    <th><?= $row['name'] ?></th>
                                    <th><?= $row['description'] ?></th>
                                    <th><?= $row['price'] ?></th>
                                    <th><?= $row['category'] ?></th>
                                    <!-- Muestra la imagen -->
                                    <th><img src="uploads/<?= $row['image'] ?>" alt="Imagen del producto" style="width: 80px"></th>


                                    <th><a href="update.php?id=<?= $row['id'] ?>" class="producto-table--edit">Editar</a></th>
                                    <th><a href="delete_producto.php?id=<?= $row['id'] ?>" class="producto-table--delete">Eliminar</a></th>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        
            </div>

        </div>
              
    </div>

</body>
</html>