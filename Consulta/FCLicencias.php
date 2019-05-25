<?php
  session_start();
  include('../valida.php');
  valida();

  $tabla='licencias';
  include("conexion.php");
  $con = Conectar();
  $sql0="SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$tabla';";
  $query0=EjecutarConsulta($con, $sql0);
  $re0=mysqli_num_rows($query0);
  $x=0;
    for($a=0;$a<$re0;$a++){
        $opcion=mysqli_fetch_row($query0);
        /*
        print($fila[0]);
        print("<br>");*/
        $columna[$x]=$opcion[0];
        $x++;
    }
    for($y=0;$y<$re0;$y++){
        //print($columna[$y]);
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>consulta <?php print($tabla) ?></title> 
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label>Criterio
  <input name="criterio" type="text" id="criterio" />
  </label>
  <p>Campo
    <select name="campo" id="campo">
      <option value="<?php if (isset($columna[0])) {print($columna[0]);} ?>">
        <?php if (isset($columna[0])) {print($columna[0]);}  ?></option>

      <option value="<?php if (isset($columna[1])) {print($columna[1]);} ?>">
        <?php if (isset($columna[1])) {print($columna[1]);}  ?></option>

      <option value="<?php if (isset($columna[2])) {print($columna[2]);} ?>">
        <?php if (isset($columna[2])) {print($columna[2]);}  ?></option>
      
      <option value="<?php if (isset($columna[3])) {print($columna[3]);} ?>">
        <?php if (isset($columna[3])) {print($columna[3]);}  ?></option>
      
      <option value="<?php if (isset($columna[4])) {print($columna[4]);} ?>">
        <?php if (isset($columna[4])) {print($columna[4]);}  ?></option>
      
      <option value="<?php if (isset($columna[5])) {print($columna[5]);} ?>">
        <?php if (isset($columna[5])) {print($columna[5]);}  ?></option>
      
      <option value="<?php if (isset($columna[6])) {print($columna[6]);} ?>">
        <?php if (isset($columna[6])) {print($columna[6]);}  ?></option>
      
      <option value="<?php if (isset($columna[7])) {print($columna[7]);} ?>">
        <?php if (isset($columna[7])) {print($columna[7]);}  ?></option>
      
      <option value="<?php if (isset($columna[8])) {print($columna[8]);} ?>">
        <?php if (isset($columna[8])) {print($columna[8]);}  ?></option>

      <option value="<?php if (isset($columna[9])) {print($columna[9]);} ?>">
        <?php if (isset($columna[9])) {print($columna[9]);}  ?></option>

      <option value="<?php if (isset($columna[10])) {print($columna[10]);} ?>">
        <?php if (isset($columna[10])) {print($columna[10]);}  ?></option>

        <option value="<?php if (isset($columna[11])) {print($columna[11]);} ?>">
        <?php if (isset($columna[11])) {print($columna[11]);}  ?></option>

        <option value="<?php if (isset($columna[12])) {print($columna[12]);} ?>">
        <?php if (isset($columna[12])) {print($columna[12]);}  ?></option>

        <option value="<?php if (isset($columna[13])) {print($columna[13]);} ?>">
        <?php if (isset($columna[13])) {print($columna[13]);}  ?></option>

        <option value="<?php if (isset($columna[14])) {print($columna[14]);} ?>">
        <?php if (isset($columna[14])) {print($columna[14]);}  ?></option>

        <option value="<?php if (isset($columna[15])) {print($columna[15]);} ?>">
        <?php if (isset($columna[15])) {print($columna[15]);}  ?></option>

        <option value="<?php if (isset($columna[16])) {print($columna[16]);} ?>">
        <?php if (isset($columna[16])) {print($columna[16]);}  ?></option>

        <option value="<?php if (isset($columna[17])) {print($columna[17]);} ?>">
        <?php if (isset($columna[17])) {print($columna[17]);}  ?></option>

        <option value="<?php if (isset($columna[18])) {print($columna[18]);} ?>">
        <?php if (isset($columna[18])) {print($columna[18]);}  ?></option>
    </select>
  </p>
  <p>
    <label>
    <input name="Consultar" type="submit" id="Consultar" value="Consultar" />
    </label>
  </p>
  <p>&nbsp;</p>
  <?php $re=0 ?>
</form>



<?php 
  if (isset($_POST['criterio'])) {
    $criterio=$_POST['criterio'];
    $campo = $_POST['campo'];
    $sql="SELECT * FROM $tabla WHERE $campo LIKE '$criterio';";
    $query=EjecutarConsulta($con, $sql);
    $re=mysqli_num_rows($query);
?>
  <table>
      <tr>
        <th><?php if (isset($columna[0])) {print($columna[0]);}  ?></th>
        <th><?php if (isset($columna[1])) {print($columna[1]);}  ?></th>
        <th><?php if (isset($columna[2])) {print($columna[2]);}  ?></th>
        <th><?php if (isset($columna[3])) {print($columna[3]);}  ?></th>
        <th><?php if (isset($columna[4])) {print($columna[4]);}  ?></th>
        <th><?php if (isset($columna[5])) {print($columna[5]);}  ?></th>
        <th><?php if (isset($columna[6])) {print($columna[6]);}  ?></th>
        <th><?php if (isset($columna[7])) {print($columna[7]);}  ?></th>
        <th><?php if (isset($columna[8])) {print($columna[8]);}  ?></th>
        <th><?php if (isset($columna[9])) {print($columna[9]);}  ?></th>
        <th><?php if (isset($columna[10])) {print($columna[10]);}  ?></th>
        <th><?php if (isset($columna[11])) {print($columna[11]);}  ?></th>
        <th><?php if (isset($columna[12])) {print($columna[12]);}  ?></th>
        <th><?php if (isset($columna[13])) {print($columna[13]);}  ?></th>
        <th><?php if (isset($columna[14])) {print($columna[14]);}  ?></th>
        <th><?php if (isset($columna[15])) {print($columna[15]);}  ?></th>
        <th><?php if (isset($columna[16])) {print($columna[16]);}  ?></th>
        <th><?php if (isset($columna[17])) {print($columna[17]);}  ?></th>
        <th><?php if (isset($columna[18])) {print($columna[18]);}  ?></th>
        <th></th>
      </tr>
<?php
    for($a=0;$a<$re;$a++){
      $fila=mysqli_fetch_row($query);
?>
      <tr>
        <td><?php if (isset($fila[0])) {print($fila[0]);}  ?></td>
        <td><?php if (isset($fila[1])) {print($fila[1]);}  ?></td>
        <td><?php if (isset($fila[2])) {print($fila[2]);}  ?></td>
        <td><?php if (isset($fila[3])) {print($fila[3]);}  ?></td>
        <td><?php if (isset($fila[4])) {print($fila[4]);}  ?></td>
        <td><?php if (isset($fila[5])) {print($fila[5]);}  ?></td>
        <td><?php if (isset($fila[6])) {print($fila[6]);}  ?></td>
        <td><?php if (isset($fila[7])) {print($fila[7]);}  ?></td>
        <td><?php if (isset($fila[8])) {print($fila[8]);}  ?></td>
        <td><?php if (isset($fila[9])) {print($fila[9]);}  ?></td>
        <td><?php if (isset($fila[10])) {print($fila[10]);}  ?></td>
        <td><?php if (isset($fila[11])) {print($fila[11]);}  ?></td>
        <td><?php if (isset($fila[12])) {print($fila[12]);}  ?></td>
        <td><?php if (isset($fila[13])) {print($fila[13]);}  ?></td>
        <td><?php if (isset($fila[14])) {print($fila[14]);}  ?></td>
        <td><?php if (isset($fila[15])) {print($fila[15]);}  ?></td>
        <td><?php if (isset($fila[16])) {print($fila[16]);}  ?></td>
        <td><?php if (isset($fila[17])) {print($fila[17]);}  ?></td>
        <td><?php if (isset($fila[18])) {print($fila[18]);}  ?></td>
      </tr>
<?php
    }
    Cerrar($con);
  }
  
?>
  </table>
  <button onclick="window.location = '../menu.html'">Regresar</button>
</body>
</html>
<?php print("<br><br>Registros encontrados: ".$re) ?>