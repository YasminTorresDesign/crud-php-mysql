<?php 
include("connection.php");
$con = connection();


    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Procesamiento de la imagen
    $new_image = $_FILES['image']['name']; // Nombre de la nueva imagen
    $image_tmp = $_FILES['image']['tmp_name']; // Ruta temporal de la nueva imagen

    if ($new_image) {
        // Mover la imagen cargada a la carpeta de destino
        
        move_uploaded_file($image_tmp, "uploads/" . $new_image);
    } else {
        // Si no se cargó una nueva imagen, conservar la imagen actual
        $sql = "SELECT image FROM producto WHERE id = '$id'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $new_image = $row['image'];
    }

    // Actualizar el registro en la base de datos
    $sql = "UPDATE producto SET name='$name', description='$description', price='$price', category='$category', image='$new_image' WHERE id='$id'";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "Producto actualizado correctamente.";
        
        Header("Location: index.php");
        
    } else {
        echo "Error al actualizar el producto.";
    }

?>


<!-- <?php

include("connection.php");
$con = connection();

$id = $_POST["id"];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$image = $_POST['image'];


$sql = "UPDATE producto SET name='$name', description='$description', price='$price', category='$category', image='$image' WHERE id='$id'";
$query = mysqli_query($con, $sql);


if($query) {
    Header("Location: index.php");
};
?> -->