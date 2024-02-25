<?php 

include("connection.php");
$con = connection();

//obtener los datos de entrada del formulario
$id = null;
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
// $image = $_POST['image'];

//capturar el archivo
$archivo = $_FILES['image'];
$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
$image = $name."-".".".$extension;

move_uploaded_file($archivo["tmp_name"], "./uploads/$image");

$sql = "INSERT INTO producto VALUES('$id', '$name', '$description', '$price', '$category', '$image')";
$query = mysqli_query($con, $sql);


if($query) {
    Header("Location: index.php");
};

?>

