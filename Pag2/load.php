<?php
require 'conexion.php';
$columns=['id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'objetivo_general', 'objetivos_especificos'];
$table="proyectos";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$sql="SELECT ".implode(", ",$columns)."
FROM $table";
$resultado = $conn->query($sql);
$num_rows=$resultado->num_rows;

$html='';

if ($num_rows>0) {
    while ($row=$resultado->fetch_assoc()) {
        $html .='<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['descripcion'] . '</td>';
        $html .= '<td>' . $row['fecha_inicio'] . '</td>';
        $html .= '<td>' . $row['fecha_fin'] . '</td>';
        $html .= '<td>' . $row['objetivo_general'] . '</td>';
        $html .= '<td>' . $row['objetivos_especificos'] . '</td>';
        $html .= '<td><a href="" class="btn">Entar</a></td>';
        $html .= '<td><a href="" class="btn">Editar</a></td>';
        $html .= '<td><a href="" class="btn">Eliminar</a></td>';
        $html.='</tr>';
    }
}else {
        $html.='<tr>';
        $html.='<td colspan="10">Sin resuldos</td>';
        $html.='</tr>';
}

echo json_encode($html,JSON_UNESCAPED_UNICODE);