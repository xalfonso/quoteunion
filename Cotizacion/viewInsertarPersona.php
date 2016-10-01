         <?php
				  require('menu.php');
				 
		 ?>

   <form id="form1" name="form1" method="post" action="incluirPersona.php">
     <table width="200" border="0">
       <tr>
         <td class='smallText'>Nombres</td>
         <td><label>
           <input name="textfield" type="text"  size="39" align="middle" class='smallText'/>
         </label></td>
         
       </tr>
       <tr>
         <td class='smallText'>Apellidos</td>
         <td><label>
           <input name="textfield1" type="text" size="39" align="middle" class='smallText'/>
         </label></td>
       </tr>
       
       <tr>
         <td class='smallText'>Área de Trabajo </td>
		 <td><?php 
		      require('clases.php'); 
              echo "<select name='areaSeleccionada' class='smallText'>";
			  $obtTipo = new CArea();
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
		 <td align="left"><label>
           <input type="submit" name="botonIncluir" value="Enviar" class='smallText'/>
         </label></td>
		  <td align="right">
	    <label>
		<input type="reset" name="Submit2" value="Restablecer" class='smallText'/>
		</label></td>
       </tr>
     </table>
   </form>
