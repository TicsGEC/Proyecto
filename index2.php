<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/forms2.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
$url = new moodle_url ( '/local/proyecto/index2.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ('Ingreso de Datos');
echo $OUTPUT->heading ( 'Ingreso de Datos' );


$formulario = new formu();
if ($formulario->is_cancelled()) {
	echo 'Usted no ingreso comentarios';
} else if ($fromforms = $formulario->get_data()) {
	$record = new stdClass();
	$record->asignatura =$fromforms->asignatura ;
	 $record->pais = $fromforms->pais;
	$record->seccion = $fromforms->seccion;
	 $record->contenido = $fromforms->contenido;
	 $record->tipoderecursos = $fromforms->recurso;
$record->nombredearchivo = $fromforms->nombre;
 $lastinsertid= $DB->insert_record('local_proyecto',$record);
} 
else {
	$formulario->display();
}
echo $OUTPUT->footer ();
?>