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
		<td class="pageName">Ver Personas</td>
		</tr>

	<tr>
		<td class="bodyText">
		
		
		
		
		<?php
           require('clases.php');
           require('menu.php');
		
		?>
	   
	     <form id="form2" name="form2" method="post" action="verPersonas.php">
			<table border="0">
				<tr>
				<td class="smallText"> Área </td>
				<td>      
				
				<?php 
		       echo "<select name='areaSeleccionada' class='smallText'>";
			  $obtTipo = new CArea();
			  $arregloTipos = $obtTipo->obtenerTodos();
			  $cantEle = count($arregloTipos);
			 echo " <option value=0>No específico</option>";
			  for($i = 0; $i < $cantEle; $i++)
			   {
			    $valor = "".$arregloTipos[$i]->id;
				$nomb = $arregloTipos[$i]->nombre;
				echo " <option value=$valor>$nomb</option>";
			   }
			  echo "</select>";
		     ?>
				
				</td>
				<td> <input name="botonConsultar" type="submit" class="smallText" value="Consultar"/></td>
				</tr>
		   </table>
		</form>
		 

		 
      <?php	 
	   echo "<table  border='1' class='tabla_datos'>
         <tr>
         <th class='header'>Nombres y Apellidos </th> 
         <th class='header'>Área de Trabajo</th> 
		 </tr>";
	$obt = new CPersona();
    if(@$botonConsultar)	
         {
		    $area1 = $_POST['areaSeleccionada'];
         	$arreglo = $obt->consultarPorArea($area1);
         }		 
    else
		 {
		  $arreglo = $obt->obtenerTodos();
	     } 
	
		  	
    $cantEle = count( $arreglo);
	
	  for($i = 0; $i < $cantEle; $i++)
	   {
		$nomb = $arreglo[$i]->nombre;
		$ape = $arreglo[$i]->apellido;
		$area = $arreglo[$i]->area->nombre;
		echo "<tr>";
		
		echo "<td>";
		echo $nomb. " ".$ape;
		echo "</td>";
		
			
		echo "<td>";
		echo $area;
		echo "</td>";
		echo "</tr>";
		
	   }		
  echo "<tr><th class='header' colspan='2'>Total: <i> $cantEle elementos </i></th>";		 
  echo "</table>";    
 ?>
		

		</td>
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
