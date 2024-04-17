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
			case 'storeProduct':
				$nombreProducto = strip_tags($_POST['nombreProducto']);
				$familia = strip_tags($_POST['familia']);
				$grupo = strip_tags($_POST['grupo']);
				$subgrupo = strip_tags($_POST['subgrupo']);
				$precio = strip_tags($_POST['precio']);
				$costo = strip_tags($_POST['costo']);
				$almacen = strip_tags($_POST['almacen']);
				$codigo = strip_tags($_POST['codigo']);
				$stock = strip_tags($_POST['stock']);
		$CategoryController->storeProduct($nombreProducto, $familia, $grupo, $subgrupo, $precio, $costo, $almacen, $codigo, $stock);
			break;
			case 'product':
				$id = strip_tags($_POST['id']);
				$CategoryController->getProduct($id);
			break;
		}
	}

	class CategoryController{
		public function storeProduct($nombreProducto, $familia, $grupo, $subgrupo, $precio, $costo, $almacen, $codigo, $stock){
			$conn = connect();
			if ($conn->connect_error == false) {
			    if ($nombreProducto != "") {
			        $query = "INSERT INTO `articulos` (`idArticulo`, `nombre`, `costo`, `familia`, `almacen`, `stock`, `grupo`, `subgrupo`, `precio`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
			        $prepared_query = $conn->prepare($query);
			        $prepared_query->bind_param('ssdsisssd', $codigo, $nombreProducto, $costo, $familia, $almacen, $stock, $grupo, $subgrupo, $precio);
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
		public function getProduct($id){
 			$conn = connect();
			if ($conn->connect_error==false){
					$query = "SELECT * FROM `articulos` where idArticulo =?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('s',$id);
				$prepared_query->execute();
				$results = $prepared_query->get_result();
				$product = $results->fetch_all(MYSQLI_ASSOC);
				if( count($product)>0){
					$json_product = json_encode($product);
            		echo $json_product;
				}else{
					echo "No hay producto";				
				}
			}else{
				echo "error";
			}
		}
		public function getProducts(){
 			$conn = connect();
			if ($conn->connect_error==false){
				$query = "SELECT * FROM `articulos`";
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