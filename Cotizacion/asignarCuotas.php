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
		<td class="pageName">Asignar Cuotas</td>
		</tr>

	<tr>
		<td class="bodyText">
		
		
		
		
		<?php
           require('clases.php');
           require('menu.php');
		
		?>
	   
	     <form id="form2" name="form2" method="post" action="asignarCuotas.php">
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
				<td class="smallText">Cuota </td>
				<td>      
				
				<?php 
		       echo "<select name='tipoSeleccionado' class='smallText'>";
			  $obtTipo = new CTipoPago();
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
		 

	<form id="form5" name="form5" method="post" action="incluirCuotas.php"> 
      <?php	 
	   echo "<table  border='1' class='tabla_datos'>
         <tr>
         <th class='header'></th> 
		 <th class='header'>Nombres y Apellidos </th> 
         <th class='header'>Área de Trabajo</th> 
		 
		 </tr>";
	$obt = new CPersona();
    if(@$botonConsultar)	
         {
		  $arreglo = $obt->obtenerTodosSinCuotaAsignadaSegunTipo($tipoSeleccionado, $areaSeleccionada);
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
		$id = $arreglo[$i]->id;
		echo "<input type='checkbox' name='personaSeleccionadas[]' value='$id'>";
		echo "</td>";
		
		echo "<td>";
		echo $nomb. " ".$ape;
		echo "</td>";
		
			
		echo "<td>";
		echo $area;
		echo "</td>";
		echo "</tr>";
		
	   }		
  echo "<tr><th class='header' colspan='3'>Total: <i> $cantEle elementos </i></th>";		 
  echo "</table>";   
 
 ?>
    <table border="0">
	<tr>
	<td class="smallText"> Cuota a Asignar </td>
    <td class="smallText"> 
	  <input name="textCuota" type="text" size="27" align="middle" class='smallText'/>
	</td> 
	 </tr>
	 <tr>
	<td class="smallText">Cuota </td>
	<td class="smallText">
	 <?php 
		       echo "<select name='tipoSeleccionado' class='smallText'>";
			  $obtTipo = new CTipoPago();
			  $arregloTipos = $obtTipo->obtenerTodos();
			  $cantEle = count($arregloTipos);
			  for($i = 0; $i < $cantEle; $i++)
			   {
			    $valor = "".$arregloTipos[$i]->id;
				$nomb = $arregloTipos[$i]->nombre;
				echo " <option value=$valor>$nomb</option>";
			   }
			  echo "</select>";
		     ?>
	</td>
	 </tr> 
	 
	  <tr>
         <td colspan="2" class="smallText">
	      <input name="botonAsignar" type="submit" class="smallText" value="Asignar"/>
	    </td>
	  </tr>
	  </table>
	 </form> 	

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
