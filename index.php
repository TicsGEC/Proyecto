<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/forms.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
$url = new moodle_url ( '/local/proyecto/index.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ();
echo $OUTPUT->heading ( 'Prueba Proyecto' );


$formulario = new formu();
if ($formulario->is_cancelled()) {
	echo 'Usted no ingreso comentarios';
} else if ($fromforms = $formulario->get_data()) {
	$record = new stdClass();
	echo $record->asignatura = $fromforms->asignatura ;
	echo ("<br>");
	echo $record->pais = $fromforms->pais;
	echo ("<br>");
	echo $record->plataforma = $fromforms->plataforma;
	echo ("<br>");
	echo $record->grado = $fromforms->grado;
	echo ("<br>");
	echo $record->seccion = $fromforms->seccion;
	echo ("<br>");
	echo $record->eje = $fromforms->eje;
	echo ("<br>");
	echo $record->contenido = $fromforms->contenido;
	echo ("<br>");
	echo $record->recurso = $fromforms->recurso;
	echo ("<br>");
	echo $record->estilo = $fromforms->estilo;
	echo ("<br>");
	echo $record->localizacion = $fromforms->localizacion;
	echo ("<br>");
	echo $record->responsive = $fromforms->responsive;
	echo ("<br>");
	echo $record->skin = $fromforms->skin;
	echo ("<br>");
	
} 
else {
	$formulario->display();
}
echo $OUTPUT->footer ();
?>