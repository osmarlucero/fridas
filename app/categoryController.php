<?php
	if (!isset($_SESSION)) {
    	session_start();
	}
	include_once "connController.php";
	if(isset($_POST['action'])){
		$CategoryController = new CategoryController();
		switch ($_POST['action']) {
			case 'store':
				$id = 1;
				$nombre = strip_tags($_POST['nombre']);
				$apellido = strip_tags($_POST['apellido']);
				$rol = strip_tags($_POST['rol']);
				$mac = strip_tags($_POST['mac']);
				$pass = strip_tags($_POST['password']);
				$CategoryController->storeUser($id, $nombre, $apellido,$rol,$mac,$pass);
			break;
			case 'storeMesa':
				$id = strip_tags($_POST['id']);
				$cantidadPersonas = strip_tags($_POST['cantidadPersonas']);
				$ubicacion = strip_tags($_POST['ubicacion']);
				$CategoryController->storeMesa($id, $cantidadPersonas, $ubicacion);
			break;
			case 'product':
				$id = strip_tags($_POST['id']);
				$CategoryController->getProduct($id);
			break;
		}
	}

	class CategoryController{
		public function storeMesa($id, $cantidadPersonas, $ubicacion){
			$conn = connect();
			if ($conn->connect_error == false) {
			    if ($cantidadPersonas != "") {
			        $query = "INSERT INTO `mesa` (`id_mesa`, `cantidad_personas`, `ubicacion`) VALUES (?, ?	, ?);";
			        $prepared_query = $conn->prepare($query);
			        $prepared_query->bind_param('iss', $id, $cantidadPersonas, $ubicacion);
			        if ($prepared_query->execute()) {
			            header("Location:" . $_SERVER["HTTP_REFERER"]);
			            $_SESSION['success'] = "Datos enviados correctamente";
			        } else {
			            $_SESSION['error'] = "Verifica datos";
			            header("Location:" . $_SERVER["HTTP_REFERER"]);
			        }
			    }
			}

			else{
				$_SESSION['error'] ="COnexion MAl BD";
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}

		}
		public function getMesas(){
 			$conn = connect();
			if ($conn->connect_error==false){
				$query = "SELECT * FROM `mesa`";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();
				$results = $prepared_query->get_result();
				$product = $results->fetch_all(MYSQLI_ASSOC);
				if( count($product)>0){
            		return $product;
				}else{
					echo "No hay producto";				
				}
			}else{
				echo "error";
			}
		}
}