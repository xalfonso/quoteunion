<?php
		   require('menu.php');
		  
		?> 
		
		   <form  method="post" action="incluirTipoPago.php">
			 <table width="200" border="0">
			   <tr>
				 <td>Nombre</td>
				 <td><label>
				   <input name="nombre" type="text" size="39" align="middle" >
				 </label></td>
			   </tr>
			   <tr>
				 <td align="left"><label>
				   <input type="submit" name="botonIncluir" value="Enviar" />
				 </label></td>
				 <td align="right">
				   <label>
				   <input type="reset" name="Submit2" value="Restablecer" />
				 </label></td>
			   </tr>
			 </table>
		   </form>
