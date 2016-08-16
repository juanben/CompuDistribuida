<html>
<head>
<title>Archivo PHP que muestra una imagen</title>
</head>
<body background="img\sfondo.gif">
<img style="margin:12px 0 12px 0;" src="img/fondo.jpg" width="100" height="50" alt="Imagen para el intro" title="Bienvenido al Blog">
<img style="margin:12px 0 12px 0;"align="right" src="img/icono1.gif" width="100" height="50" alt="Imagen para el intro2" title="TRABAJE">
<P ALIGN=center>
<DIV ALIGN=center><h1><font style="color:#0B6138">Plataforma de Blog Departamental</font></h1></div>
</P>
<h3><font style="color:#0B2161">Bienvenido al Blog</font></h3><hr><br>
<br />
<?php

$user = "admin";
$password = "123456";
$dbname = "Distri";
$port = "5432";
$host = "192.168.1.3";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());


$query = "select idtwit, mensaje, ubicacion from twit";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table border='1' align='center'>
<tr bgcolor='darkblue'>
<th><font color=\"white\">ID</font></th>
<th><font color=\"white\">Mensaje</font></th>
<th><font color=\"white\">Departamento</font></th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['idtwit']."</td>";
echo "<td>".$fila['ubicacion']."</td>";
echo "<td>".$fila['mensaje']."</td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}

pg_close($conexion);

?>
</body>
</html>