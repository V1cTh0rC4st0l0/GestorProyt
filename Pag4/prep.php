<?php
require '../Pag2/conexion.php';
$columns=['id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo_general', 'objetivos_especificos', 'miembros', 'tareas'];
$table="proyectos";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$sql="SELECT ".implode(", ",$columns)."
FROM $table";
$resultado = $conn->query($sql);
$num_rows=$resultado->num_rows;

$html = ""; 
// Recorrer los resultados y construir el array de datos
if ($num_rows > 0) {
    while ($row=$resultado->fetch_assoc()) {
        $html .= '<h1>Proyecto'. $row['id']. '</h1>';
        $html .= '<h2>'. $row['nombre']. '</h2>';

        $html .= '<label>Resumen del proyecto</label>';
        $html .= '<p>' . $row['descripcion'] . '</p>';

        $html .= '<label>Miembros del equipo</label>';
        $html .= '<p>'. $row['miembros'].'</p>';
        $html .= '<td><a href="" class="btn">Agregar integrante</a></td>';

        $html .= '<label>Tareas</label>';
        $html .= '<p>'. $row['tareas'].'</p>';
        $html .= '<td><a href="" class="btn">Agregar tarea</a></td>';
        
        $html.='<tr>';
        $html .= '<td>' . $row['fecha_inicio'] . '</td>';
        $html .= '<td>' . $row['fecha_fin'] . '</td>';
        $html .= '<td>' . $row['objetivo_general'] . '</td>';
        $html .= '<td>' . $row['objetivos_especificos'] . '</td>';
        $html.='</tr>';
        
    }}else {
        $html.='<h1>Sin resultados</h1>';
        $html.='<tr>';
        $html.='<td colspan="4">Sin resuldos</td>';
        $html.='</tr>';
}

// Codificar el array en JSON y enviar la respuesta
echo json_encode($html,JSON_UNESCAPED_UNICODE);
