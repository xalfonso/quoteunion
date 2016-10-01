<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
 <?php
 class CArea
 { 
   var $id;
   var $nombre;
   
   
   function CArea()
   {
     $this->id = 0;
	 $this->nombre = "";
   }
   
   /*function CTipo($pnombre)
   {
     $this->nombre = $pnombre;
   }*/
   
   function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
    $consulta = "insert into area_tb (nombre) values ('$this->nombre')";
    $result  = mysql_query($consulta);
	if($result)
	 echo "Se ha incluido satisfactoriamente el área";
	else
	 echo "Ha ocurrido un error al insertar el área"; 
	$bd->desconectar();
      
   }
   
   function obtenerTodos()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select * from area_tb";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los tipos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CArea();
	   $nuevoTipo->id = $listado['idArea'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   }
 }
 //----------------------------------------------------------------------------------------------------------------------
 class CTransacion
 { 
   var $id;
   var $nombre;
   
   
   function CTransacion()
   {
     $this->id = 0;
	 $this->nombre = "";
   }
   
   /*function CTipo($pnombre)
   {
     $this->nombre = $pnombre;
   }*/
   
   function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
    $consulta = "insert into trans_tb (nombre) values ('$this->nombre')";
    $result  = mysql_query($consulta);
	if($result)
	 echo "Se ha incluido satisfactoriamente la transacción";
	else
	 echo "Ha ocurrido un error al insertar la transacción "; 
	$bd->desconectar();
      
   }
   
   function obtenerTodos()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select * from trans_tb";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las transacciones"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CTransacion();
	   $nuevoTipo->id = $listado['idTrans'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   }
 }
   
//----------------------------------------------------------------------------------------------------------------------------   
class CTipoPago
 { 
   var $id;
   var $nombre;
   
   
   function CTipoPago()
   {
     $this->id = 0;
	 $this->nombre = "";
   }
   
   /*function CTipo($pnombre)
   {
     $this->nombre = $pnombre;
   }*/
   
   function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
    $consulta = "insert into tipo_tb (nombre) values ('$this->nombre')";
    $result  = mysql_query($consulta);
	if($result)
	 echo "Se ha incluido satisfactoriamente el área";
	else
	 echo "Ha ocurrido un error al insertar el área"; 
	$bd->desconectar();
      
   }
   
   function obtenerTodos()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select * from tipo_tb";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los tipos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CTipoPago();
	   $nuevoTipo->id = $listado['idTipoPago'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   } 
   
   
    function obtenerPorId($tipoSeleccionado)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select * from tipo_tb where tipo_tb.idTipoPago = '$tipoSeleccionado'";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los tipos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  
	  
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CTipoPago();
	   $nuevoTipo->id = $listado['idTipoPago'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   
	   
	$bd->desconectar();
	return $nuevoTipo;
   }
   
 
 }
 //----------------------------------------------------------------------------------------------------------------------------   
class CFecha
 { 
   var $d;
   var $m;
   var $a;
   
   
   function CFecha()
   {
     $this->d = 0;
	 $this->m = 0;
	 $this->a = 0;
	 
   }
   
   
   function formatoMySQL()
   {
     $fecha1 = "";
	 $fecha1 = $fecha1.$this->a."-".$this->m."-".$this->d;
     return $fecha1;  
   }
   
 }
 
 
//---------------------------------------------------------------------------------- 
 class CCuota
 { 
   var $tipoPago;
   var $persona;
   var $saldoAnual;
   var $fechaAct;
   
   
   function CCuota()
   {
     $this->tipoPago = new CTipoPago();
	 $this->persona = new CPersona();
	 $this->saldoAnual = 0.00;
	 $this->fechaAct = new CFecha();
	 
   }
    
 }
 
 //-----------------------------------------------------------------------------------------
  class CPago
 { 
   var $tipoPago;
   var $persona;
   var $saldo;
   var $fechaAct;
   var $trans;
   
   
   function CFecha()
   {
     $this->tipoPago = new CTipoPago();
	 $this->persona = new CPersona();
	 $this->saldoAnual = 0.00;
	 $this->fechaAct = new CFecha();
	 $this->trans = new CTransacion();
	 
   }
    
     
 }
 
//---------------------------------------------------------------------------------------------------------------------------
   
class CPersona
 { 
   var $id;
   var $nombre;
   var $apellido;
   var $area;
   var $fechaAlta;
   var $fechaBaja;
   var $saldoFicticio;
   var $saldoFicticioPagado;
   var $estado;
   
   function CPersona()
   {
     $this->id = 0;
	 $this->nombre = "";
	 $this->apellido = "";
	 $this->area = new CArea();
	 $this->fechaAlta = new CFecha();
	 $this->fechaBaja = new CFecha();
	 $this->saldoFicticio = 0.00;
	 $this->saldoFicticioPagado = 0.00;
	 $this->estado = "";
   }
   
    
	
  function establecerCuota($tipoPago, $saldoAnual,$fechaActu)
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
	$fechaA = $fechaActu->formatoMySQL();
    $consulta = "insert into cuota_tb (tipoPago, persona, saldoAnual, fechaAct) values ('$tipoPago', '$this->id', '$saldoAnual','$fechaA')";
    $result  = mysql_query($consulta);
	if($result)
	{
	 echo "Se ha establecido satisfactoriamente la cuota de la persona ";
	 echo "<br/>";
	 }
	else
	 echo "Ha ocurrido un error al establecer la cuota de la persona"; 
	$bd->desconectar();
      
   }
   
    function establecerPago($tipoPago, $saldoAnual,$fechaActu, $trans)
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
	$fechaA = $fechaActu->formatoMySQL();
    $consulta = "insert into pagotb (tipoPago, persona, saldo, fecha, trans) values ('$tipoPago', '$this->id', '$saldoAnual','$fechaA', '$trans')";
    $result  = mysql_query($consulta);
	if($result)
	{
	 echo "Se ha incluido satisfactoriamente el pago de la persona ";
	 echo "<br/>";
	 }
	else
	 echo "Ha ocurrido un error al incluir  el pago de la persona "; 
	$bd->desconectar();
      
   }
	  
   function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    
	$fechaA = $this->fechaAlta->formatoMySQL();
    $consulta = "insert into persona_tb (nombre, apellido, area, fechaAlta) values ('$this->nombre', '$this->apellido', '$this->area->id','$fechaA')";
    $result  = mysql_query($consulta);
	if($result)
	{
	 echo "Se ha incluido satisfactoriamente la persona";
	 
	 }
	else
	 echo "Ha ocurrido un error al insertar la persona"; 
	$bd->desconectar();
      
   }
   
   function obtenerTodos()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select persona_tb.idPersona, persona_tb.nombre, persona_tb.apellido, persona_tb.area, area_tb.nombre as nombreArea from persona_tb inner join area_tb on persona_tb.area = area_tb.idArea";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las personas"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CPersona();
	   $nuevoTipo->id = $listado['idPersona'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $nuevoTipo->apellido = $listado['apellido'];
	   $area = new CArea();
	   $area->id = $listado['area'];
	   $area->nombre = $listado['nombreArea'];
	   $nuevoTipo->area = $area;
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   } 
   
   
   function obtenerTodosConCuotas($area,$tipo)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 
	 $consultaFiltro = " where persona_tb.idPersona <> -1";
	 
	 if($area != 0)
	  $consultaFiltro = $consultaFiltro." and persona_tb.area = '$area'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and cuota_tb.tipoPago = '$tipo'";
	 
	 
	 
	 $consulta = "select persona_tb.idPersona, persona_tb.nombre, persona_tb.apellido, area_tb.nombre as nombreArea, `cuota_tb`.`saldoAnual` from `persona_tb` inner join `area_tb` on `persona_tb`.`area`=`area_tb`.`idArea` INNER join `cuota_tb` on `persona_tb`.`idPersona`=`cuota_tb`.`persona`".$consultaFiltro;
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las personas"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CPersona();
	   $nuevoTipo->id = $listado['idPersona'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $nuevoTipo->apellido = $listado['apellido'];
	   $area = new CArea();
	   $area->nombre = $listado['nombreArea'];
	   $nuevoTipo->area = $area;
	   $nuevoTipo->saldoFicticio = $listado['saldoAnual'];
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   } 
   
   
    function obtenerTodosConCuotasyPagosTrans($area,$tipo,$trans, $opcionMuestraAtrazados)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 
	 $consultaFiltro = " where persona_tb.idPersona <> -1";
	 
	 
	 if($area != 0)
	  $consultaFiltro = $consultaFiltro." and persona_tb.area = '$area'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and cuota_tb.tipoPago = '$tipo'";
	 
	 
	 
	 $consulta = "select persona_tb.idPersona, persona_tb.estado, persona_tb.nombre, persona_tb.apellido, area_tb.nombre as nombreArea, `cuota_tb`.`saldoAnual` from `persona_tb` inner join `area_tb` on `persona_tb`.`area`=`area_tb`.`idArea` INNER join `cuota_tb` on `persona_tb`.`idPersona`=`cuota_tb`.`persona`".$consultaFiltro;
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las personas"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CPersona();
	   $nuevoTipo->id = $listado['idPersona'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $nuevoTipo->apellido = $listado['apellido'];
	   $nuevoTipo->estado = $listado['estado'];
	   $area = new CArea();
	   $area->nombre = $listado['nombreArea'];
	   $nuevoTipo->area = $area;
	   $nuevoTipo->saldoFicticio = $listado['saldoAnual'];
	   
	   $consultaFiltro1 = "";
	   if($trans != 0)
	     $consultaFiltro1 = $consultaFiltro1." and pagotb.trans = '$trans'";
	   
	   $consultaTotalPagado = "SELECT `pagotb`.`persona`, SUM(`pagotb`.`saldo`) AS saldoPagado FROM `pagotb` where `pagotb`.`persona`= '$nuevoTipo->id' and `pagotb`.`tipoPago`= '$tipo'".$consultaFiltro1." GROUP BY `pagotb`.`persona`";
	   	    
	   mysql_query($consultaTotalPagado);
	  
	   
	   $result1  = mysql_query($consultaTotalPagado);
	   
	      
	   if(!$result1)
	  {
	   echo "Ha ocurrido un error al cargar los pagos realizados por las personas"; 
	   exit;
	  }
	  
	  
	  $list = mysql_fetch_array($result1);
	  
	  if($list['saldoPagado']) 	  
	    $nuevoTipo->saldoFicticioPagado = $list['saldoPagado'];
	  else
	    $nuevoTipo->saldoFicticioPagado = 0.00;
	   
	  
	  $saldo = $nuevoTipo -> saldoFicticio;
	  $cuotaMensual = $saldo / 12;
	  
	  $saldoPagado = $nuevoTipo -> saldoFicticioPagado;
	  $mesesPagados = $saldoPagado / $cuotaMensual;
	  
	  $mActual = date("m");
	  
	  $atrazado = 0;
	  if ($mesesPagados < $mActual)
	     	$atrazado = 1;
			
	  if($opcionMuestraAtrazados != 1) 
	     $tipos[] = $nuevoTipo;	
      if($opcionMuestraAtrazados == 1 && $atrazado == 1)
	     $tipos[] = $nuevoTipo;	
	        
	   
	   }
	   
	$bd->desconectar();
	return $tipos; 
   } 
   
   function obtenerTodosSinCuotaAsignadaSegunTipo($tipoPago, $area)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 
	 $consultaTipoPago = "";
	 $consultaTipoArea = "";
	 
	 if($tipoPago != 0)
	   $consultaTipoPago = " where `cuota_tb`.`tipoPago`='$tipoPago'";
	   
	 if($area !=0)
	 $consultaTipoArea = " and persona_tb.area = '$area'";
	   
	 
	 $consulta = "select persona_tb.idPersona, persona_tb.nombre, persona_tb.apellido, persona_tb.area, area_tb.nombre as nombreArea from persona_tb inner join area_tb on persona_tb.area = area_tb.idArea where `persona_tb`.`idPersona` NOT IN (SELECT `cuota_tb`.`persona` FROM `cuota_tb`".$consultaTipoPago.")".$consultaTipoArea;
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las personas"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CPersona();
	   $nuevoTipo->id = $listado['idPersona'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $nuevoTipo->apellido = $listado['apellido'];
	   $area = new CArea();
	   $area->id = $listado['area'];
	   $area->nombre = $listado['nombreArea'];
	   $nuevoTipo->area = $area;
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   } 
   
    function consultarPorArea($area)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 $consultaFiltro = " where persona_tb.idPersona <> -1";
	 
	 if($area != 0)
	  $consultaFiltro = $consultaFiltro." and persona_tb.area = '$area'";
	 
	 $consulta = "select persona_tb.idPersona, persona_tb.nombre, persona_tb.apellido, persona_tb.area, area_tb.nombre as nombreArea from persona_tb inner join area_tb on persona_tb.area = area_tb.idArea".$consultaFiltro;
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar las personas"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $tipos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoTipo = new CPersona();
	   $nuevoTipo->id = $listado['idPersona'];
	   $nuevoTipo->nombre = $listado['nombre'];
	   $nuevoTipo->apellido = $listado['apellido'];
	   $area = new CArea();
	   $area->id = $listado['area'];
	   $area->nombre = $listado['nombreArea'];
	   $nuevoTipo->area = $area;
	   $tipos[] = $nuevoTipo;	
	   }
	   
	$bd->desconectar();
	return $tipos; 
   }
   
 
 }
 //---------------------------------------------------------------------------
 class CCantidad
 {
   var $id;
   var $nombre;
   var $descripcion;
   var $saldo;
   var $dia;
   var $mes;
   var $ano;
   var $tipo;
   
 
    function CCantidad()
   {
     $this->id = 0;
	 $this->nombre = "";
	 $this->descripcion = "";
	 $this->saldo = 0.00;
	 $this->dia = 0;
	 $this->mes = 0;
	 $this->ano = 0;
	 $this->tipo = new CTipo();
	  
   }
   
    function salvar()
   {
    //este método es virtual puro. No tiene implementación.      
   }
 
  /* function CCantidad($pnombre, $pdescripcion, $saldo, $pdia, $pmes, $pano, $ptipo)
   {
         $this->nombre = $pnombre;
	 $this->descripcion = $descripcion;
	 $this->saldo = $psaldo;
	 $this->dia = $pdia;
         $this->mes = $pmes;
	 $this->ano = $pano;
	 $this->tipo = $ptipo;
	  
   }*/
 }
//-------------------------------------------------------------------------------
 class CGasto extends CCantidad
 {
  
  var $cantidad;
  
   function CGasto()
   {
     $this->id = 0;
	 $this->nombre = "";
	 $this->descripcion = "";
	 $this->saldo = 0.00;
	 $this->dia = 0;
	 $this->mes = 0;
	 $this->ano = 0;
	 $this->cantidad = 0;
	 $this->tipo = new CTipo();
	  
   }
  
  
  
  
  function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    $consulta = "insert into cantidad_tb (nombre,descripcion,saldo,dia,mes,ano,tipo) values ('$this->nombre','$this->descripcion','$this->saldo','$this->dia','$this->mes','$this->ano','$this->tipo->id')";
    $result  = mysql_query($consulta);
	if($result)
	{
	  echo "Se ha incluido satisfactoriamente la cantidad";
	  echo '</br>';
	  $consulta1 = "select max(cantidad_tb.idCantidad) from cantidad_tb";
	  $result1 = mysql_query($consulta1);
	 
	 if($result1)
	 {
	   $valor = mysql_fetch_array($result1); //este es el ultimo valor que se incluyo en la tabla cantidad, la tabla madre de ingreso
	   $consulta2 = "insert into gasto_tb (idGasto, cantidad) values ('$valor[0]','$this->cantidad')";
	   $result2 = mysql_query($consulta2);
        if($result2)
		{
	     echo "Se ha incluido satisfactoriamente el gasto";
	     echo '</br>';
		}
		else
		 echo "Ha ocurrido un error al insertar el gasto";
     }
	  else
	   echo "Ha ocurrido un error al tratar de obtener el ultimo id de la cantidad";
	 	
	}
	 else
	 echo "Ha ocurrido un error al insertar la cantidad"; 
	
	
	$bd->desconectar();
      
   }
 
   function obtenerTodos()
   {
    $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select cantidad_tb.idCantidad, cantidad_tb.nombre, cantidad_tb.descripcion, cantidad_tb.saldo, cantidad_tb.dia, cantidad_tb.mes, cantidad_tb.ano, cantidad_tb.tipo, tipo_tb.nombre as nombreTipo from cantidad_tb inner join gasto_tb on cantidad_tb.idCantidad = gasto_tb.idGasto inner join tipo_tb on cantidad_tb.tipo = tipo_tb.idTipo";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoGasto = new CGasto();
	   $nuevoGasto->id = $listado['idCantidad'];
	   $nuevoGasto->nombre = $listado['nombre'];
	   $nuevoGasto->descripcion = $listado['descripcion'];
	   $nuevoGasto->saldo = $listado['saldo'];
	   $nuevoGasto->dia = $listado['dia'];
	   $nuevoGasto->mes = $listado['mes'];
	   $nuevoGasto->ano = $listado['ano'];
	   $obtTipo = new CTipo();
	   $obtTipo->id = $listado['tipo'];
	   $obtTipo->nombre = $listado['nombreTipo'];
	   $nuevoGasto->tipo = $obtTipo;
	   $elementos[] = $nuevoGasto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
   } 
   
   function consultarPorTipoMesAno($mes, $ano, $tipo)
   {
    $bd = new ConexionBD();
     $bd->conectar();
	 
	 $consultaFiltro = " where cantidad_tb.idCantidad <> -1";
	 
	 if($mes != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.mes = '$mes'";
	 if($ano != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.ano = '$ano'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and tipo_tb.idTipo = '$tipo'"; 
	  
	 $consulta = "select cantidad_tb.idCantidad, cantidad_tb.nombre, cantidad_tb.descripcion, cantidad_tb.saldo, cantidad_tb.dia, cantidad_tb.mes, cantidad_tb.ano, cantidad_tb.tipo, tipo_tb.nombre as nombreTipo from cantidad_tb inner join gasto_tb on cantidad_tb.idCantidad = gasto_tb.idGasto inner join tipo_tb on cantidad_tb.tipo = tipo_tb.idTipo".$consultaFiltro;
     $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoGasto = new CGasto();
	   $nuevoGasto->id = $listado['idCantidad'];
	   $nuevoGasto->nombre = $listado['nombre'];
	   $nuevoGasto->descripcion = $listado['descripcion'];
	   $nuevoGasto->saldo = $listado['saldo'];
	   $nuevoGasto->dia = $listado['dia'];
	   $nuevoGasto->mes = $listado['mes'];
	   $nuevoGasto->ano = $listado['ano'];
	   $obtTipo = new CTipo();
	   $obtTipo->id = $listado['tipo'];
	   $obtTipo->nombre = $listado['nombreTipo'];
	   $nuevoGasto->tipo = $obtTipo;
	   $elementos[] = $nuevoGasto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
   }
   
   function saldoTotal()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	
 	$consulta = "select cantida";
	 
	 
   }
 
  function saldoTotalPorTipo()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	
 	$consulta = "SELECT `tipo_tb`.`nombre`, SUM(`cantidad_tb`.`saldo`) as monto FROM `cantidad_tb` INNER JOIN `tipo_tb` on `cantidad_tb`.`tipo` = `tipo_tb`.`idTipo` INNER JOIN `gasto_tb` on `cantidad_tb`.`idCantidad` = `gasto_tb`.`idGasto`  GROUP by `tipo_tb`.`idTipo` ";
	 
	 $result  = mysql_query($consulta);
	 
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   //Aqui voy a usar un objeto de gasto para almacenar algo que realmente no lo es: en nombre pongo el tipo y en saldo el valor total de ese tipo
	   $listado = mysql_fetch_array($result);
	   $objetoTipoMonto = new CGasto();
	   $objetoTipoMonto->nombre = $listado['nombre'];
	   $objetoTipoMonto->saldo = $listado['monto'];
	   $elementos[] = $objetoTipoMonto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
	  
	 
   }
   
   
   
   function saldoTotalPorTipo_PorTipoMesAno($mes, $ano, $tipo)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	 
	 
	 $consultaFiltro = " where cantidad_tb.idCantidad <> -1";
	 
	 if($mes != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.mes = '$mes'";
	 if($ano != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.ano = '$ano'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and tipo_tb.idTipo = '$tipo'";
	 
	 
	
 	$consulta = "SELECT `tipo_tb`.`nombre`, SUM(`cantidad_tb`.`saldo`) as monto FROM `cantidad_tb` INNER JOIN `tipo_tb` on `cantidad_tb`.`tipo` = `tipo_tb`.`idTipo` INNER JOIN `gasto_tb` on `cantidad_tb`.`idCantidad` = `gasto_tb`.`idGasto` ".$consultaFiltro. " GROUP by `tipo_tb`.`idTipo`";
	 
	 $result  = mysql_query($consulta);
	 
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   //Aqui voy a usar un objeto de gasto para almacenar algo que realmente no lo es: en nombre pongo el tipo y en saldo el valor total de ese tipo
	   $listado = mysql_fetch_array($result);
	   $objetoTipoMonto = new CGasto();
	   $objetoTipoMonto->nombre = $listado['nombre'];
	   $objetoTipoMonto->saldo = $listado['monto'];
	   $elementos[] = $objetoTipoMonto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
	  
	 
   }
 
 
 
 }
 //-----------------------------------------------------------------------------
 class CIngreso extends CCantidad
 {
 
  function salvar()
   {
    $bd = new ConexionBD();
    $bd->conectar();
    $consulta = "insert into cantidad_tb (nombre,descripcion,saldo,dia,mes,ano,tipo) values ('$this->nombre','$this->descripcion','$this->saldo','$this->dia','$this->mes','$this->ano','$this->tipo->id')";
    $result  = mysql_query($consulta);
	if($result)
	{
	  echo "Se ha incluido satisfactoriamente la cantidad";
	  echo '</br>';
	  $consulta1 = "select max(cantidad_tb.idCantidad) from cantidad_tb";
	  $result1 = mysql_query($consulta1);
	 
	 if($result1)
	 {
	   $valor = mysql_fetch_array($result1); //este es el ultimo valor que se incluyo en la tabla cantidad, la madre de ingreso
	   $consulta2 = "insert into ingreso_tb (idIngreso) values ('$valor[0]')";
	   $result2 = mysql_query($consulta2);
        if($result2)
		{
	     echo "Se ha incluido satisfactoriamente el ingreso";
	     echo '</br>';
		}
		else
		 echo "Ha ocurrido un error al insertar el ingreso";
     }
	  else
	   echo "Ha ocurrido un error al tratar de obtener el ultimo id de la cantidad";
	 	
	}
	 else
	 echo "Ha ocurrido un error al insertar la cantidad"; 
	
	
	$bd->desconectar();
      
   }
   
   function obtenerTodos()
   {
    $bd = new ConexionBD();
     $bd->conectar();
	 $consulta = "select cantidad_tb.idCantidad, cantidad_tb.nombre, cantidad_tb.descripcion, cantidad_tb.saldo, cantidad_tb.dia, cantidad_tb.mes, cantidad_tb.ano, cantidad_tb.tipo, tipo_tb.nombre as nombreTipo from cantidad_tb inner join ingreso_tb on cantidad_tb.idCantidad = ingreso_tb.idIngreso inner join tipo_tb on cantidad_tb.tipo = tipo_tb.idTipo";
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoIngreso = new CIngreso();
	   $nuevoIngreso->id = $listado['idCantidad'];
	   $nuevoIngreso->nombre = $listado['nombre'];
	   $nuevoIngreso->descripcion = $listado['descripcion'];
	   $nuevoIngreso->saldo = $listado['saldo'];
	   $nuevoIngreso->dia = $listado['dia'];
	   $nuevoIngreso->mes = $listado['mes'];
	   $nuevoIngreso->ano = $listado['ano'];
	   $obtTipo = new CTipo();
	   $obtTipo->id = $listado['tipo'];
	   $obtTipo->nombre = $listado['nombreTipo'];
	   $nuevoIngreso->tipo = $obtTipo;
	   $elementos[] = $nuevoIngreso;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
   }

function consultarPorTipoMesAno($mes, $ano, $tipo)
   {
    $bd = new ConexionBD();
     $bd->conectar();
	 
	  $consultaFiltro = " where cantidad_tb.idCantidad <> -1";
	 
	 if($mes != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.mes = '$mes'";
	 if($ano != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.ano = '$ano'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and tipo_tb.idTipo = '$tipo'"; 
	  	 
	 $consulta = "select cantidad_tb.idCantidad, cantidad_tb.nombre, cantidad_tb.descripcion, cantidad_tb.saldo, cantidad_tb.dia, cantidad_tb.mes, cantidad_tb.ano, cantidad_tb.tipo, tipo_tb.nombre as nombreTipo from cantidad_tb inner join ingreso_tb on cantidad_tb.idCantidad = ingreso_tb.idIngreso inner join tipo_tb on cantidad_tb.tipo = tipo_tb.idTipo".$consultaFiltro;
	 $result  = mysql_query($consulta);
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   $listado = mysql_fetch_array($result);
	   $nuevoIngreso = new CIngreso();
	   $nuevoIngreso->id = $listado['idCantidad'];
	   $nuevoIngreso->nombre = $listado['nombre'];
	   $nuevoIngreso->descripcion = $listado['descripcion'];
	   $nuevoIngreso->saldo = $listado['saldo'];
	   $nuevoIngreso->dia = $listado['dia'];
	   $nuevoIngreso->mes = $listado['mes'];
	   $nuevoIngreso->ano = $listado['ano'];
	   $obtTipo = new CTipo();
	   $obtTipo->id = $listado['tipo'];
	   $obtTipo->nombre = $listado['nombreTipo'];
	   $nuevoIngreso->tipo = $obtTipo;
	   $elementos[] = $nuevoIngreso;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
   }  
   
   
   
   function saldoTotalPorTipo()
   {
     $bd = new ConexionBD();
     $bd->conectar();
	
 	$consulta = "SELECT `tipo_tb`.`nombre`, SUM(`cantidad_tb`.`saldo`) as monto FROM `cantidad_tb` INNER JOIN `tipo_tb` on `cantidad_tb`.`tipo` = `tipo_tb`.`idTipo` INNER JOIN `ingreso_tb` on `cantidad_tb`.`idCantidad` = `ingreso_tb`.`idIngreso`  GROUP by `tipo_tb`.`idTipo` ";
	 
	 $result  = mysql_query($consulta);
	 
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   //Aqui voy a usar un objeto de ingreso para almacenar algo que realmente no lo es: en nombre pongo el tipo y en saldo el valor total de ese tipo
	   $listado = mysql_fetch_array($result);
	   $objetoTipoMonto = new CIngreso();
	   $objetoTipoMonto->nombre = $listado['nombre'];
	   $objetoTipoMonto->saldo = $listado['monto'];
	   $elementos[] = $objetoTipoMonto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
	  
	 
   } 
   
   
   function saldoTotalPorTipo_PorTipoMesAno($mes, $ano, $tipo)
   {
     $bd = new ConexionBD();
     $bd->conectar();
	
	 $consultaFiltro = " where cantidad_tb.idCantidad <> -1";
	 
	 if($mes != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.mes = '$mes'";
	 if($ano != 0)
	  $consultaFiltro = $consultaFiltro." and cantidad_tb.ano = '$ano'";
	 if($tipo != 0)
	  $consultaFiltro = $consultaFiltro." and tipo_tb.idTipo = '$tipo'"; 
	
	
	
 	$consulta = "SELECT `tipo_tb`.`nombre`, SUM(`cantidad_tb`.`saldo`) as monto FROM `cantidad_tb` INNER JOIN `tipo_tb` on `cantidad_tb`.`tipo` = `tipo_tb`.`idTipo` INNER JOIN `ingreso_tb` on `cantidad_tb`.`idCantidad` = `ingreso_tb`.`idIngreso` ".$consultaFiltro." GROUP by `tipo_tb`.`idTipo` ";
	 
	 $result  = mysql_query($consulta);
	 
	 if(!$result)
	  {
	   echo "Ha ocurrido un error al cargar los elementos"; 
	   exit;
	  }
	  
	  $numeroRes = mysql_num_rows($result);
	  $elementos = array();
	  
	  for ($i=0 ; $i<$numeroRes; $i++)
	  {
	   //Aqui voy a usar un objeto de ingreso para almacenar algo que realmente no lo es: en nombre pongo el tipo y en saldo el valor total de ese tipo
	   $listado = mysql_fetch_array($result);
	   $objetoTipoMonto = new CIngreso();
	   $objetoTipoMonto->nombre = $listado['nombre'];
	   $objetoTipoMonto->saldo = $listado['monto'];
	   $elementos[] = $objetoTipoMonto;	
	   }
	   
	$bd->desconectar();
	return $elementos; 
	  
	 
   }
   
 }
 //-----------------------------------------------------------------------------
 class ConexionBD
 {
     function conectar()
     {
        $db = mysql_pconnect('localhost','root','');
         if(!$db)
          {
           echo 'No entro a la base de datos';
           exit;
           
          }
          mysql_select_db('cotizacion_db');
                  
     }
     
     function desconectar()
     {
         mysql_close();                  
     }
     
 }
 
 
  ?>
</body>
</html>
