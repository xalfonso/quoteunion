<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Alojamiento - Texto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_lodging1.css" type="text/css" />
</head>
<body bgcolor="#999966">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="15" nowrap="nowrap">&nbsp;</td>
	<td height="60" colspan="3" class="logo" nowrap="nowrap"><br />
	COTIZACIÓN</td>
	<td width="100%">&nbsp;</td>
	</tr>

	<tr bgcolor="#ffffff">
	<td colspan="5"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#a4c2c2">
	<td width="15" nowrap="nowrap">&nbsp;</td>
	<td height="36" colspan="2" id="navigation" class="navText"><a href="index.php">INICIO</a></td>
	<td>&nbsp;</td>
	<td width="100%">&nbsp;</td>
	</tr>

	<tr bgcolor="#ffffff">
	<td colspan="5"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#ffffff">
	<td valign="top" width="15"><img src="mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td valign="top" width="140"><img src="mm_spacer.gif" alt="" width="140" height="1" border="0" /></td>
	<td width="505" valign="top"><br />
	<table border="0" cellspacing="0" cellpadding="2" width="440">
		<tr>
		<td class="pageName">Ver Tipos de Pagos</td>
		</tr>

		<tr>
		<td class="bodyText">
		<?php
		   require('clases.php');
		   require('menu.php');
		   echo "<table  border='1' class='tabla_datos'>
				 <tr>
				 <th class='header'>Nombre</th> </tr>";
			$obtTipo = new CTipoPago();
			$arregloTipos = $obtTipo->obtenerTodos();
			$cantEle = count($arregloTipos);
			  for($i = 0; $i < $cantEle; $i++)
			   {
				$nomb = $arregloTipos[$i]->nombre;
				echo "<tr><td>";
				echo $nomb;
				echo "</td></tr>";
			   }
		   
		   echo "</table>";       
			   	 
		 ?> 

		<br /></td>
		</tr>
	</table>
	 <br />
	&nbsp;<br />	</td>
	<td valign="top">&nbsp;</td>
	<td width="100%">&nbsp;</td>
	</tr>

	<tr>
	<td width="15">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="505">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
