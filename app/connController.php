<?php
	
define("HOST", "srv901.hstgr.io");
	define("USER", "u848276287_main");
	define("PSWD", "Fixcel016_");
	define("DBNM", "u848276287_fixcel");

	function connect(){
		$conn = new mysqli(HOST,USER,PSWD,DBNM);
		if ($conn) {
			return $conn;
		}
		return null;
	}
?>