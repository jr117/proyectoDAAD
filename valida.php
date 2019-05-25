<?php
	function valida()
	{	
		if (!isset($_SESSION['validacion']) or !isset($_SESSION['username'])) {
			?>
			<script>alert("Lo siento, no se ha iniciado sesion")</script>
			<?php
			//sleep(1);
			header("refresh:0;url=../Usuarios/FAcceso.html");
			exit();
		}else{
			return;
		}
	}

 ?>