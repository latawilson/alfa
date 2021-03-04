<?php
include_once("../clases/cls_alfareria.php");
print_r($_FILE);
echo $_FILE;
echo "entro";
echo json_encode($_FILE['imagen_al']['name']);

// $nombre=$_FILE['imagen_al']['name'];
// $guardar=$$FILE['imagen_al']['tmp_name']



// //echo($_GET['txtEmpr']);
//  $target_path = "../imagen_alfa/";
// 	$target_path = $target_path . basename( $_FILES['imagen_al']['name']); 
// 	if(move_uploaded_file($_FILES['imagen_al']['tmp_name'], $target_path)) 
// 	{
// 	    echo "El archivo ".  basename( $_FILES['imagen_al']['name']). 
// 	    " ha sido subido";
//         $obj_alfareria= new alfareria();
// 	    $obj_alfareria->insertar(
// 		$_POST['nombre_al'],
// 		$_POST['direccion_al'],
// 	    $_POST['propietario_al'],
// 		$_POST['descripcion_al'],
// 		$_POST['telefono_al'],
// 		$_FILES['imagen_al']['name']

// 		);

//        header('Location: alfarerias.php');
// 	} else{
// 	    echo "Ha ocurrido un error, trate de nuevo!";
// 	}

?>
