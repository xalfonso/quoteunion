<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- DW6 -->
	<head>
		<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
		<title>Alojamiento - Texto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link rel="stylesheet" href="mm_lodging1.css" type="text/css"/>
	</head>
	<body bgcolor="#999966">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="15" nowrap="nowrap">&nbsp;</td>
				<td height="60" colspan="3" class="logo" nowrap="nowrap">
				<br />
				COTIZACI?N</td>
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
				<td width="505" valign="top">
				<br />
				<table border="0" cellspacing="0" cellpadding="2" width="440">
					<tr>
						<td class="pageName">Ver Pagos</td>
					</tr>
					<tr>
						<td class="bodyText"><?php
						require ('clases.php');
						require ('menu.php');
						?>

						<form id="form2" name="form2" method="post" action="verPagos.php">
							<table border="0">
								<tr>
									<td class="smallText">Área </td>
									<td><?php
									echo "<select name='areaSeleccionada' class='smallText'>";
									$obtTipo = new CArea();
									$arregloTipos = $obtTipo -> obtenerTodos();
									$cantEle = count($arregloTipos);
									echo " <option value=0>No específico</option>";
									for ($i = 0; $i < $cantEle; $i++) {
										$valor = "" . $arregloTipos[$i] -> id;
										$nomb = $arregloTipos[$i] -> nombre;
										echo " <option value=$valor>$nomb</option>";
									}
									echo "</select>";
									?>
								   </td>
								 
								
										<td class="smallText">Cuota </td>
										<td><?php
										echo "<select name='tipoSeleccionado' class='smallText'>";
										$obtTipo = new CTipoPago();
										$arregloTipos = $obtTipo -> obtenerTodos();
										$cantEle = count($arregloTipos);
										for ($i = 0; $i < $cantEle; $i++) {
											$valor = "" . $arregloTipos[$i] -> id;
											$nomb = $arregloTipos[$i] -> nombre;
											echo " <option value=$valor>$nomb</option>";
										}
										echo "</select>";
										?></td>
									</tr>
									<tr>
									<td class="smallText">Trans. </td>
									<td><?php
									echo "<select name='transaccionSeleccionada' class='smallText'>";
									$obtTipo = new CTransacion();
									$arregloTipos = $obtTipo -> obtenerTodos();
									$cantEle = count($arregloTipos);
									echo " <option value=0>No específico</option>";
									for ($i = 0; $i < $cantEle; $i++) {
										$valor = "" . $arregloTipos[$i] -> id;
										$nomb = $arregloTipos[$i] -> nombre;
										echo " <option value=$valor>$nomb</option>";
									}
									echo "</select>";
									?></td>
									<td>
									<label for="chekAtrazados">Mostrar solo los atrazados</label>
									<input id="chekAtrazados" type="checkbox" value="1"  name="opcionSeleccionadaAtrazados" />
									</td>
									<td>
									<input name="botonConsultar" type="submit" class="smallText" value="Consultar"/>
									</td>
								</tr>
							</table>
						</form>
						<form id="form5" name="form5" method="post" action="incluirCuotas.php">
							<?php

							$obtTipo = new CTipoPago();
							$nombreTipo = "";
							$obt = new CPersona();
							if (@$botonConsultar) {
								$areaSe = $_POST['areaSeleccionada'];
								$tipoSe = $_POST['tipoSeleccionado'];
								$tranSe = $_POST['transaccionSeleccionada'];
								@$opcionMuestraAtrazados = $_POST['opcionSeleccionadaAtrazados'];
								$arreglo = $obt -> obtenerTodosConCuotasyPagosTrans($areaSe, $tipoSe, $tranSe, $opcionMuestraAtrazados);
								$obtTipo = $obtTipo -> obtenerPorId($tipoSeleccionado);
								$nombreTipo = $obtTipo -> nombre;
							} else {
								$arreglo = $obt -> obtenerTodosConCuotasyPagosTrans(0, 1, 0, 0);
								$obtTipo = $obtTipo -> obtenerPorId(1);
								$nombreTipo = $obtTipo -> nombre;
							}

							echo "<table  border='1' class='tabla_datos'>
<tr>
<th class='header'>Nombres y Apellidos </th>
<th class='header'>Área de Trabajo</th>
<th class='header'>Estado</th>
<th class='header'>$nombreTipo (Pagado)</th>
<th class='header'>$nombreTipo (Cuota)</th>

</tr>";

							$cantEle = count($arreglo);
							$saldoTotal = 0.00;
							$saldoTotalPagado = 0.00;
							for ($i = 0; $i < $cantEle; $i++) {
								$nomb = $arreglo[$i] -> nombre;
								$ape = $arreglo[$i] -> apellido;
								$area = $arreglo[$i] -> area -> nombre;
								$saldo = $arreglo[$i] -> saldoFicticio;
								$saldoPagado = $arreglo[$i] -> saldoFicticioPagado;
								$esta = $arreglo[$i]->estado;
															   
								echo "<tr>";

								echo "<td>";
								echo $nomb . " " . $ape;
								echo "</td>";

								echo "<td>";
								echo $area;
								echo "</td>";
                               				
								echo "<td>";
								echo $esta;
								echo "</td>";	

                                $cuotaMensual = $saldo / 12;
								$mesesPagados = $saldoPagado / $cuotaMensual;
								$mActual = date("m");
								$modo = "";
								
							
								if ($mesesPagados < $mActual)
									$modo = "<p align='center' style='color:#EE0000'>atrasado</p>";
									
								if ($mesesPagados == 12)
									$modo = "<p align='center' <p style='color:#0066FF'>completo</p>";
												
								echo "<td>";
								echo $saldoPagado . " CUP" . " <p align='center' style='font-size:13px;'>(" . $mesesPagados . ")$modo</p>";
								echo "</td>";

								$cuotaMensual = $saldo / 12;
								$cuotaMensual = round($cuotaMensual, 2);
								echo "<td>";
								echo $saldo . " CUP" . " <p align='center' style='font-size:13px;'>(" . $cuotaMensual . " CUP)</p>";
								echo "</td>";

								echo "</tr>";
								$saldoTotal = $saldoTotal + $saldo;
								$saldoTotalPagado = $saldoTotalPagado + $saldoPagado;
							}
							$porciento = $saldoTotalPagado * 100 / $saldoTotal;
							$num = round($porciento, 2);
							echo "<tr><th  colspan='2'>Saldo Total:</th><th></th><th> <i> $saldoTotalPagado CUP</i><p>($num %)</p></th> <th> <i> $saldoTotal CUP</i></th></tr>";
							echo "<tr><th class='header' colspan='5'>Total: <i> $cantEle elementos </i></th></tr>";
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
							<p style="font-size:14px; "
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
