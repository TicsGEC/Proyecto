<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/addform.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
$url = new moodle_url ( '/local/proyecto/elecciones.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ('Mis Elecciones');
echo $OUTPUT->heading ('Mis Elecciones');

$myuser=$USER->id;

echo $myuser=$USER->id;

echo $OUTPUT->footer();


?>