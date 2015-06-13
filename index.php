<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/forms.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
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
	$record->asignatura =$fromforms->asignatura ;
	 $record->pais = $fromforms->pais;
	$record->seccion = $fromforms->seccion;
	 $record->contenido = $fromforms->contenido;
	 $record->tipoderecursos = $fromforms->recurso;
$archivos= $DB->get_records('local_proyecto',array('asignatura'=>$fromforms->asignatura,'pais'=>$fromforms->pais,'seccion'=>$fromforms->seccion,'contenido'=>$fromforms->contenido,'tipoderecursos'=>$fromforms->recurso));

if ($archivos !=NULL){
	$tabla= tablas::armartabla($archivos);
	echo html_writer::table($tabla);
echo $OUTPUT->single_button('index.php','Volver a Buscar');}
else{
	echo "No se han encontrado Archivos";
}}
else {
	$formulario->display();
}
echo $OUTPUT->footer ();
?>