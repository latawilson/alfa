<?php
include_once("../clases/cls_alfareria.php");

//echo($_GET['txtEmpr']);
//
$nombre_imagen=$_FILE['imagen_al']['name'];
$tipo_imagen=$_FILE['imagen_al']['type'];
$tanano_imagen=$_FILE['imagen_al']['size'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'../imagen_alfa/';
if(move_uploaded_file($_FILES['imagen_al']['tmp_name'], $carpeta_destino.$nombre_imagen)){
 $obj_alfareria= new alfareria();
	    $obj_alfareria->insertar(
		$_POST['nombre_al'],
		$_POST['direccion_al'],
	    $_POST['propietario_al'],
		$_POST['descripcion_al'],
		$_POST['telefono_al'],
		$_FILES['imagen_al']['name']
		);

		header('Location: alfarerias.php');
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}
 // $target_path = "../imagen_alfa/";
	// $target_path = $target_path . basename( $_FILES['imagen_al']['name']); 
	// if(move_uploaded_file($_FILES['imagen_al']['tmp_name'], $target_path)|| " ") 
	// {
	//     echo "El archivo ".  basename( $_FILES['imagen_al']['name']). 
	//     " ha sido subido";
 //        $obj_alfareria= new alfareria();
	//     $obj_alfareria->insertar(
	// 	$_POST['nombre_al'],
	// 	$_POST['direccion_al'],
	//     $_POST['propietario_al'],
	// 	$_POST['descripcion_al'],
	// 	$_POST['telefono_al'],
	// 	$_FILES['imagen_al']['name']

	// 	);

 //       header('Location: alfarerias.php');
	// } else{
	//     echo "Ha ocurrido un error, trate de nuevo!";
	// }

?>
