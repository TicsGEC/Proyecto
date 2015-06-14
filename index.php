<?php
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/searchform.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');
global $PAGE, $CFG, $OUTPUT, $DB, $USER;
require_login ();
$url = new moodle_url ( '/local/proyecto/index.php' );
$context = context_system::instance ();
$PAGE->set_url ( $url );
$PAGE->set_context ( $context );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_heading ( 'GEC' );
$PAGE->navbar->add ( 'Busqueda de Cursos' );
$PAGE->navbar->add ( 'INDEX' );
echo $OUTPUT->header ();
echo $OUTPUT->heading ( 'Mis Opciones' );


$head=array(' ',' ',' ');
$data=array($OUTPUT->single_button('buscar.php','Buscar Datos'),$OUTPUT->single_button('elecciones.php','Mis Elecciones'),$OUTPUT->single_button('agregar.php','Añadir Datos'));
$tabla2= tablas::armarbusqueda($data);
echo html_writer::table($tabla2);






echo $OUTPUT->footer();
?>