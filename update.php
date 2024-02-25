<?php 
    include("connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM producto WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar Productos</title>
        
    </head>
    <body>
        <div class="producto-form">
            <form action="edit_producto.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="name" placeholder="Nombre" value="<?= $row['name']?>">
                <input type="text" name="description" placeholder="Descripcion" value="<?= $row['description']?>">
                <input type="text" name="price" placeholder="Precio" value="<?= $row['price']?>">
                <input type="text" name="category" placeholder="Categoria" value="<?= $row['category']?>">
                
                <!-- Mostrar la imagen actual -->
                <img src="uploads/<?= $row['image'] ?>" alt="Imagen actual del producto" style="max-width: 200px;">
            
                <!-- Permitir al usuario cargar una nueva imagen -->
                <input type="file" name="new_image" placeholder="Nueva imagen">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>