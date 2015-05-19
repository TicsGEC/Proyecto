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

$formulario = new formulario();
$formulario->display();



echo $OUTPUT->footer ();
?>