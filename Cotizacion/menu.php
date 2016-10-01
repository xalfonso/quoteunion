<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
 <p>
   <?php
  session_start();
  //$paco = "Leydis la locota";
  //$HTTP_SESSION_VARS['nombre'] = $paco;
  
  $menu = ' <ul type="circle" >
            <li><a href="efectuarPago.php">Efectuar Pago</a></li>
			<li><a href="verPagos.php">Ver Pagos</a></li>
            <li><a href="asignarCuotas.php">Asignar Cuotas </a> </li>
            <li><a href="verCuotas.php">Ver Cuotas</a></li>
            <li><a href="insertarPersona.php">Insertar Persona</a></li>
			<li><a href="verPersonas.php">Ver Personas</a></li>
            <li><a href="verAreas.php">Ver Área de Trabajo</a></li>
            <li><a href="insertarArea.php">Insertar Área de Trabajo</a></li>
			<li><a href="verTiposPagos.php">Ver Tipos de Pagos</a></li>
            <li><a href="insertarTipoPago.php">Insertar Tipo de Pago</a></li>
            </ul> ';
	echo $menu;
 ?>
</p>
 <p>&nbsp;</p>
 <p>&nbsp; </p>
</body>
</html>
