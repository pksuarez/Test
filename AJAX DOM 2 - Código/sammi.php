<?php
	$consulta = $_GET["xyz"];
	$conn =  mysqli_connect("localhost","root","","dicc");
	mysqli_set_charset($conn, "utf8");

	if (!$conn) {
		//echo "No Conectado";
	}else{
		$sql = "SELECT * FROM entries WHERE word like '".$consulta."%'";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$nA = array();
			
			while ($registro = mysqli_fetch_assoc($result)) {
				$nA[] = $registro;
			}
			header('Content-Type: application/json');
			echo json_encode($nA);
		}else{
			echo "";
		}

}

?>